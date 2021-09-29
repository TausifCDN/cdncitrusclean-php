<?php namespace App\Controllers;

use Square\SquareClient;
use Square\LocationsApi;
use Square\Exceptions\ApiException;
use Square\Http\ApiResponse;
use Square\Models\ListLocationsResponse;
use Square\Environment;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;
use Square\Models\CreateCustomerRequest;

class Payments extends BaseController{

	public function add_cart(){
		$request = service('request');
		$session = service('session');
		$db = \Config\Database::connect();
		
		$session_id=1;
			
		$max_count=$_REQUEST['item_count'];
		$product_ids=array();
		for ($i=1; $i <= $max_count; $i++) { 
		    $product_ids[]=$_REQUEST['product_id_'.$i];
		}
		if($product_ids){
    		$productIDStr=implode(",", $product_ids);
    		$sql="DELETE FROM sales_temp WHERE session_id='".$session->session_id."' AND product_id IN(".$productIDStr.")";
    		$query=$db->query($sql);
	    }
		
		for ($i=1; $i <= $max_count; $i++) { 

			$quantity_name='quantity_'.$i;
			if($_REQUEST[$quantity_name] > 0) {
			    
				$sql_data["session_id"]=$session->session_id;
				$sql_data["category_id"]=$_REQUEST['category_id_'.$i];
				$sql_data["product_id"]=$_REQUEST['product_id_'.$i];						
				$sql_data["qty"]=$_REQUEST['quantity_'.$i];

				$sql="select on_qty_discount, discount_percentage from products where id='".$_REQUEST['product_id_'.$i]."'";
				$query=$db->query($sql)->getFirstRow('array');
				if(isset($_REQUEST['discount_25'])) {
					$sql_data['is_discount'] = 1;
					$sql_data['discount_percentage'] = 25;
				}elseif($_REQUEST['quantity_'.$i] >= $query['on_qty_discount']) {

					$sql_data['is_discount'] = 1;
					$sql_data['discount_percentage'] = $query['discount_percentage'];

				} else {

					$sql_data['is_discount'] = 0;
					$sql_data['discount_percentage'] = "";

				}

				$db->table("sales_temp")->insert($sql_data);

			}
		}

		if(empty($_REQUEST['discount_category'])) {
			return redirect()->to(base_url().'/payments/checkout');
		} else {
			return redirect()->to(base_url().'/products?id='.$_REQUEST['discount_category']);
		}

	}
	public function checkout() {

		$request = service('request');
		$session = service('session');
		$db = \Config\Database::connect();
        $environment=$this->square_env;
	    $square_config=$this->squareup[$environment];
	    $data["square_config"]=$square_config;
		$session_id=$session->session_id;
		$data['shipping_cost']=$this->shipping_cost;
		$sql = "SELECT products.product_name,products.product_image,products.was_price,products.sale_price,sales_temp.* FROM sales_temp,products where sales_temp.product_id=products.id and session_id='".$session_id."'";
		$cart_items = $db->query($sql)->getResult('array'); 
		if($cart_items){
    		$data['products'] = $cart_items;
    
    		$sql = "SELECT * FROM products where category_id=5";
    		$mega = $db->query($sql)->getResult('array'); 
    		$data['mega'] = $mega;
    
    		$sql="select category_master.category_name,sales_temp.* from sales_temp,category_master where category_master.id=sales_temp.category_id and session_id='".$session_id."' order by sales_temp.id asc";
    		$main_category = $db->query($sql)->getFirstRow('array'); 
    		$data['main_category'] = $main_category;
    
    		$sql="select category_master.category_name,sales_temp.* from sales_temp,category_master where category_master.id=sales_temp.category_id and session_id='".$session_id."' order by sales_temp.id desc";
    		$next_category = $db->query($sql)->getFirstRow('array'); 
    		$data['next_category'] = $next_category;
    		return view('checkout',$data);
		}else{
		    return redirect()->to(base_url().'/home/cart');
		}
	}
	
	public function createPayment(){
	    $environment=$this->square_env;
	    $square_config=$this->squareup[$environment];
	   
	    $request = service('request');
		$session = service('session');
		$db = \Config\Database::connect();
		
		helper("fun");
		
		$email="";
        $phone="";
        if(isset($_POST['email'])){
            echo $email=$request->getPost("email");
        }
        if(isset($_POST['phone'])){
            $phone=$request->getPost("phone");
        }
		$session_id =$session->session_id;

		
		/*Generate buying user details for Square */
		$buying_user_name ="Guest";    
		$buying_email =$email;
		if(isset($_SESSION['user_name'])){
		    $buying_user_name = $_SESSION['user_name'];    
		    $buying_email = $_SESSION['email'];
		}
		
        $buying_user_details = 'Username :'.$buying_user_name.' | Email Address: ' .$buying_email.' ';
        
        $length=30;
	    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
        $randomString = substr(str_shuffle($str_result), 0, $length); 
	    
	    require_once(FCPATH."/app/ThirdParty/square_autoload.php");
		spl_autoload_register();
		$client = new SquareClient([
			'accessToken' =>$square_config["accessToken"],
			'environment' => Environment::PRODUCTION,
		]);
        
        $customersApi = $client->getCustomersApi();
        /***** HWS **********/
        if(!isset($_SESSION['user_name'])){
            // Create customer
            $request = new CreateCustomerRequest;
            $request->setEmailAddress($email);
     	    $result='';
            $customer_id="";
            try {
                $result = $customersApi->createCustomer($request);
            
                if ($result->isSuccess()) {
                    $response=$result->getResult()->getCustomer();
                    $customer_id=$response->getId();
                } else {
                   $error=$result->getErrors();
                   
                }
            } catch (ApiException $e) {
               echo  $error="Recieved error while calling Square: " . $e->getMessage();
            } 
            if($customer_id) {
                $password = $phone;
    		    $ciphertext =hash('sha256',md5($password.hash('sha256',$password)));
    		    
        		$sql = "SELECT * FROM users where email_id = '".$email."'";
        		$user_arr = $db->query($sql)->getFirstrow('array');
        		if($user_arr != null) {
        			$newdata = [
    			        'user_id'  => $user_arr['id'],
    			        'email'     => $user_arr['email_id'],
    			        'user_name' => $user_arr['first_name'],
    			        'logged_in' => date("Y/m/d H:i:s")
    				];
    				$session->set($newdata);
        		} else {
        			$user_sql_data = array(
        				//'first_name' => $name,
        				'email_id' => $email,
        				'password' => $ciphertext,
        				'customer_id' => $customer_id,
        				'phone' => $phone,
        				'is_active' => 1
        			);
        			$db->table("users")->insert($user_sql_data);
        			$user_id= $db->insertID();
        			if($user_id){
            			$newdata = [
        			        'user_id'  => $user_id,
        			        'email'     => $email,
        			        'user_name' => "Guest",
        			        'logged_in' => date("Y/m/d H:i:s")
        				];
        				$session->set($newdata);
        			}
        		}
            }
        }
        
        /***** HWS *********/
        
        
	    $amount_money = new Money();
        $amount_money->setAmount($grandTotal*100);
        $amount_money->setCurrency('USD');
        
        $body = new CreatePaymentRequest(
            $_REQUEST['nonce'],
            $randomString,
            $amount_money
        );
        $body->setAutocomplete(false);
        $body->setCustomerId('TF0B8BWX5CVHB0JJR7SQ30Q73W');
        $body->setAcceptPartialAuthorization(true);
        $body->setBuyerEmailAddress($buying_email);
        $body->setNote($buying_user_details.' | '.$packages_purchaed);
        
        $api_response = $client->getPaymentsApi()->createPayment($body);
        
  
	
        if ($api_response->isSuccess()) {
            $result = $api_response->getResult();
            $paymentId=$result->getPayment()->getId();

            $com_payment_res_response = $client->getPaymentsApi()->completePayment($paymentId);
            if($com_payment_res_response->isSuccess()){
                $com_payment_result = $com_payment_res_response->getResult();
            } else{
                $com_payment_errors = $com_payment_res_response->getErrors();
            }
            /***** cart data ******/
            $sql = "SELECT products.sale_price,products.product_name,sales_temp.* 
                    FROM sales_temp,products 
                    WHERE sales_temp.product_id=products.id and sales_temp.session_id='".$session_id."'";
            $cart_items = $db->query($sql)->getResult('array');
            
            $allItemsTotal=0;
            $discount=0;
            $subtotal=0;
            $total=0;
            if($cart_items){
                foreach($cart_items as $cart_item){
                    $discount_percentage=$cart_item['discount_percentage'];
                    $sale_price=$cart_item['sale_price'];
                    $item_qty=$cart_item['qty'];
                    $item_total=($sale_price*$item_qty);
                    $allItemsTotal+=$item_total;
                    $item_discount=($item_total*$discount_percentage)/100;
                    $discount+=$item_discount;
                }
            }
            $sub_total=$allItemsTotal-$discount;
            $total=$sub_total+$this->shipping_cost;
            
            
		    $oder_data=[
		        "user_id"=>$session->user_id,
		        "cart_data"=>json_encode($cart_items),
		        "sub_total"=>$sub_total,
		        "discount"=>$discount,
		        "total"=>$total,
		        "shipping_cost"=>$this->shipping_cost,
		        "email"=>$email,
		        "phone"=>$phone,
		        "paymnet_id"=>$paymentId,
		    ];
    		$db->table("orders")->insert($oder_data);					
	    	$order_id= $db->insertID();
    	
      		$db->table("sales_temp")->where("session_id",$session_id)->delete();
      		return redirect()->to(base_url());
           /* $mail_res = $this->send_order_confirmation_email($sale_id,$email);	
		    if($mail_res) {
				return redirect()->to(base_url()."/schedule_meeting/?order_id=".$paymentId);
			} else {
                echo ('Email not sent');
            }*/
        }else{
            $session->setFlashdata("pay_error_msg","Something went wrong please try again later !!!!");
			$session->setFlashdata("pay_error",1);
			if ($api_response->isError()) {
	 			echo 'Api response has Errors';
				$errors = $api_response->getErrors();
			    $session->setFlashdata("pay_error_msg","Something went wrong please try again later !!!!");
				$session->setFlashdata("pay_error",1);
				foreach ($errors as $error) {
						$session->setFlashdata("pay_error_code",$error->getcode());
						$session->setFlashdata("pay_error_msg",$error->getDetail());
						$session->setFlashdata("pay_error",1);
				}
				return redirect()->to(base_url()."/payments/checkout");
			}
       	}
	}
}
