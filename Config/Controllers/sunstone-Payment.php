<?php namespace App\Controllers;

use Square\SquareClient;
use Square\LocationsApi;
use Square\Exceptions\ApiException;
use Square\Http\ApiResponse;
use Square\Models\ListLocationsResponse;
use Square\Environment;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;

class Payment extends BaseController
{
	public function index()
	{	

		$session = service('session');
		$request = service('request');
		$db = \Config\Database::connect();
		
		helper("fun");
		$session_id=$session->session_id;
		 $sql="select * from sales_temp where session_id='".$session_id."';";


		if(!$db->query($sql)->getResult('array'))
		return redirect()->to(base_url()."/");

		$service_id=$request->getGET("id");
		$session_id=$session->session_id;
		
		$sql = "SELECT distinct packages.*,sales_temp.service_id FROM packages,sales_temp where sales_temp.package_id = packages.id and sales_temp.session_id='".$session_id."'";
		$packages = $db->query($sql)->getResult('array');  

		$sql = "SELECT distinct  package_addons.*,sales_temp.addon_qty as addon_qty FROM package_addons,sales_temp where sales_temp.addon_id = package_addons.id and sales_temp.session_id='".$session_id."' ";
		$addons = $db->query($sql)->getResult('array');  



	//----------------------------

		$sql = "SELECT * FROM services where id='".$service_id."' limit 1";
		$service = $db->query($sql)->getFirstRow('array');  

			
		$sql = "SELECT * FROM services  limit 3";
		$services = $db->query($sql)->getResult('array');  

		
		 $sql="select count(*) as cnt from sales_temp where session_id='".$session_id."' and is_discount=1;";

		$is_claim_popup=1; 
		$is_discount_apply=0;
		$rss=$db->query($sql)->getFirstRow('array');
		
		
		if($rss["cnt"]>0)	
			{
				$is_claim_popup=0; 
				$is_discount_apply=1;
			}




	
		$total_was_price=0;
		
		$sql="select distinct package_id from sales_temp where session_id='".$session_id."';";
		$rss=$db->query($sql)->getResult('array');
		foreach($rss as $r)	
		{
				$total_was_price = $total_was_price +get_package_was_price($r["package_id"]);
		}
			
		$sql="select distinct addon_id,addon_qty from sales_temp where session_id='".$session_id."';";
		$rss=$db->query($sql)->getResult('array');
		foreach($rss as $r)	
		{
				$total_was_price = $total_was_price + (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
		}




	
		
		$sql="select * from sales_temp where session_id='".$session_id."' and is_discount=1;";
		$rss=$db->query($sql)->getResult('array');
		
		$i=0;
		$p=0;
		foreach($rss as $r)	
			{
				if($i==0)
					$p=get_package_sale_price($r["package_id"]);
					
					$p = $p + (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				$i++;
			}

		$discount_amount=0;

		if($p)
			$discount_amount=intval(($p*20)/100);

		$data["is_claim_popup"]=$is_claim_popup;
		$data["is_discount_apply"]=$is_discount_apply;
		$data["discount_amount"]=$discount_amount;	
		$data["total_was_price"]=$total_was_price;				
		$data["packages"]=$packages;
		$data["addons"]=$addons;
	
		$data["services"]=$services;
		$data["service"]=$service;
		$data["service_id"]=$service_id;
			
		return view('payment',$data);
	}


	public function add_cart()
	{
		$request = service('request');
		$session = service('session');
		$db = \Config\Database::connect();
		

		$session_id=1;
		
		$package_id=$request->getPost("package_id");
		$service_id=$request->getPost("service_id");
		$is_discount=$request->getPost("is_discount");	
		
		
		
		if($is_discount==1)	
			$checkbox=$request->getPost("pop_checkbox");				
		else
			$checkbox=$request->getPost("checkbox");
		
		$db->table("sales_temp")->where("package_id",$package_id)->delete();

		if(!isset($checkbox))
		{
			

				$qty=1;
			
			$sql_data["session_id"]=$session->session_id;
			$sql_data["service_id"]=$service_id;
			$sql_data["package_id"]=$package_id;						
			$sql_data["addon_id"]=0;						
			$sql_data["addon_qty"]=1;	
			$sql_data["is_discount"]=$is_discount;												
						
			$db->table("sales_temp")->insert($sql_data);
		}
		
		
		if(isset($checkbox))
		foreach($checkbox as $ch)
		{
			$addon_id=$ch;
			$sql_data["is_discount"]=$is_discount;												
			if($is_discount==1)	
				$qty=$request->getPost("pop_quantity_".$addon_id);				
			else
				$qty=$request->getPost("quantity_".$addon_id);

			$sql_data["session_id"]=$session->session_id;
			$sql_data["service_id"]=$service_id;
			$sql_data["package_id"]=$package_id;						
			$sql_data["addon_id"]=$addon_id;						
			$sql_data["addon_qty"]=$qty;												
			
			
			$db->table("sales_temp")->insert($sql_data);
		}

		return redirect()->to(base_url()."/payment?id=".$service_id);
			
	}
	
	public function createPayment()
	{
	    $request = service('request');
		$session = service('session');
		$db = \Config\Database::connect();
		
		helper("fun");
		

		$session_id =$session->session_id;

		$total_was_price=0;
		$total_sale_price=0;
		$total_discount=0;
		
		$sql="select distinct package_id from sales_temp where session_id='".$session_id."';";
		$rss=$db->query($sql)->getResult('array');
		foreach($rss as $r)	
		{
				$total_was_price = $total_was_price +get_package_was_price($r["package_id"]);
				$total_sale_price = $total_sale_price +get_package_sale_price($r["package_id"]);				
		}
			
		$sql="select distinct addon_id,addon_qty from sales_temp where session_id='".$session_id."';";
		$rss=$db->query($sql)->getResult('array');
		foreach($rss as $r)	
		{
				$total_was_price = $total_was_price + (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				$total_sale_price = $total_sale_price + (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				
		}

		$sql="select * from sales_temp where session_id='".$session_id."' and is_discount=1;";
		$rss=$db->query($sql)->getResult('array');
		
		$i=0;
		$p=0;
		foreach($rss as $r)	
			{
				if($i==0)
					$p=get_package_sale_price($r["package_id"]);
					
					$p = $p + (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				$i++;
			}

		$discount_amount=0;

		if($p)
			$discount_amount=intval(($p*20)/100);
			
		$currency=get_currency();
	    
	    $length=30;
	    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 

  		$sql = "SELECT * FROM settings";
		$cad = $db->query($sql)->getFirstRow('array'); 
		$grandTotal=($total_sale_price-$discount_amount)*$cad['usd_cad'];
        // Shufle the $str_result and returns substring 
        // of specified length 
        $randomString = substr(str_shuffle($str_result),  
                           0, $length); 
	    require_once(FCPATH."/app/ThirdParty/square_autoload.php");
		spl_autoload_register();
	
		$client = new SquareClient([
			'accessToken' => 'EAAAEAVAMgr3EpJYGf4mNL9zFcai0Tc8fOBCGwCyXRJRJ4v-tIARBM8amqygKCSU',
			'environment' => Environment::SANDBOX,
		]);

        $customersApi = $client->getCustomersApi();
        
	    $amount_money = new Money();
        $amount_money->setAmount($grandTotal);
        $amount_money->setCurrency('USD');
        
        $body = new CreatePaymentRequest(
            $_REQUEST['nonce'],
            $randomString,
            $amount_money
        );
        $body->setAutocomplete(false);
        $body->setCustomerId('TF0B8BWX5CVHB0JJR7SQ30Q73W');
        $body->setAcceptPartialAuthorization(true);
        $body->setBuyerEmailAddress('test@gmail.com');
        
        $api_response = $client->getPaymentsApi()->createPayment($body);
        
        if ($api_response->isSuccess()) {
            $result = $api_response->getResult();
            $paymentId=$result->getPayment()->getId();


		$sql_data["user_id"]=$session->user_id;
		$sql_data["sale_date"]=date("Y/m/d");
		$sql_data["total_was_price"]=$total_was_price;
		$sql_data["total_sale_price"]=$total_sale_price;
		$sql_data["total_discount_amount"]=$discount_amount;
		$sql_data["grand_total"]=$total_sale_price-$discount_amount;
		$sql_data["total_cad"]=$grandTotal;
		$sql_data["payment_id"]=$paymentId;
		$sql_data["currency"]=$currency;
		$sql_data["card_4"]='1345';
		
		$db->table("sales_master")->insert($sql_data);					
		
		$sale_id= $db->insertID();
		
		
		$sql="select distinct package_id,is_discount from sales_temp where session_id='".$session_id."';";
		$rss=$db->query($sql)->getResult('array');
		foreach($rss as $r)	
		{
				$was_price=get_package_was_price($r["package_id"]);
				$sale_price= +get_package_sale_price($r["package_id"]);	
				
				$arr["sale_id"]=$sale_id;
				$arr["was_price"]=$was_price;
				$arr["sale_price"]=$sale_price;		
				$arr["package_id"]=$r["package_id"];		
				$arr["is_discount"]=$r["is_discount"];
									
				$db->table("sales_trans")->insert($arr);				
		}
				

		$sql="select distinct package_id,addon_id,addon_id,is_discount,addon_qty from sales_temp where session_id='".$session_id."';";
		$rss=$db->query($sql)->getResult('array');
		foreach($rss as $r)	
		{
				$was_price  = (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				$sale_price = (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				
				$arr["sale_id"]=$sale_id;
				$arr["was_price"]=$was_price;
				$arr["sale_price"]=$sale_price;	
				$arr["package_id"]=$r["package_id"];		
				$arr["addon_id"]=$r["addon_id"];	
				$arr["addon_qty"]=$r["addon_qty"];		
				$arr["is_discount"]=$r["is_discount"];
									
				$db->table("sales_trans_addon")->insert($arr);				
		}
							
		$db->table("sales_temp")->where("session_id",$session_id)->delete();
		$email = $_SESSION['email'];
		$formcontent="Your purchase with Sunstone is completed. Your total purchase amount is $: ".$sql_data['grand_total']."\n"."Thank you.";
            $recipient = $email;
            $subject = "Purchase completed";
            $mailed = mail($recipient, $subject, $formcontent);
            if($mailed) {
				return redirect()->to(base_url()."/schedule_meeting");
			} else {
                echo ('Email not sent');
            }
            
        } else {
            $errors = $api_response->getErrors();
            print_r($errors);
        }
	}
	
	
	
	public function checkout_final($paymentId)
	{
	   // die($paymentId);
		$request = service('request');
		$session = service('session');
		$db = \Config\Database::connect();
		
		helper("fun");
		

		$session_id =$session->session_id;

		$total_was_price=0;
		$total_sale_price=0;
		$total_discount=0;
		
		$sql="select distinct package_id from sales_temp where session_id='".$session_id."';";
		$rss=$db->query($sql)->getResult('array');
		foreach($rss as $r)	
		{
				$total_was_price = $total_was_price +get_package_was_price($r["package_id"]);
				$total_sale_price = $total_sale_price +get_package_sale_price($r["package_id"]);				
		}
			
		$sql="select distinct addon_id,addon_qty from sales_temp where session_id='".$session_id."';";
		$rss=$db->query($sql)->getResult('array');
		foreach($rss as $r)	
		{
				$total_was_price = $total_was_price + (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				$total_sale_price = $total_sale_price + (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				
		}

		$sql="select * from sales_temp where session_id='".$session_id."' and is_discount=1;";
		$rss=$db->query($sql)->getResult('array');
		
		$i=0;
		$p=0;
		foreach($rss as $r)	
			{
				if($i==0)
					$p=get_package_sale_price($r["package_id"]);
					
					$p = $p + (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				$i++;
			}

		$discount_amount=0;

		if($p)
			$discount_amount=intval(($p*20)/100);


		$sql_data["user_id"]=$session->user_id;
		$sql_data["sale_date"]=date("Y/m/d");
		$sql_data["total_was_price"]=$total_was_price;
		$sql_data["total_sale_price"]=$total_sale_price;
		$sql_data["total_discount_amount"]=$discount_amount;
		$sql_data["grand_total"]=$total_sale_price-$discount_amount;
		$sql_data["payment_id"]=$paymentId;
		
		$db->table("sales_master")->insert($sql_data);					
		
		$sale_id= $db->insertID();
		
		
		$sql="select distinct package_id,is_discount from sales_temp where session_id='".$session_id."';";
		$rss=$db->query($sql)->getResult('array');
		foreach($rss as $r)	
		{
				$was_price=get_package_was_price($r["package_id"]);
				$sale_price= +get_package_sale_price($r["package_id"]);	
				
				$arr["sale_id"]=$sale_id;
				$arr["was_price"]=$was_price;
				$arr["sale_price"]=$sale_price;		
				$arr["package_id"]=$r["package_id"];		
				$arr["is_discount"]=$r["is_discount"];
									
				$db->table("sales_trans")->insert($arr);				
		}
				

		$sql="select distinct package_id,addon_id,addon_id,is_discount,addon_qty from sales_temp where session_id='".$session_id."';";
		$rss=$db->query($sql)->getResult('array');
		foreach($rss as $r)	
		{
				$was_price  = (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				$sale_price = (intval(get_addon_price($r["addon_id"])) * intval($r["addon_qty"]));
				
				$arr["sale_id"]=$sale_id;
				$arr["was_price"]=$was_price;
				$arr["sale_price"]=$sale_price;	
				$arr["package_id"]=$r["package_id"];		
				$arr["addon_id"]=$r["addon_id"];	
				$arr["addon_qty"]=$r["addon_qty"];		
				$arr["is_discount"]=$r["is_discount"];
									
				$db->table("sales_trans_addon")->insert($arr);				
		}
							
		$db->table("sales_temp")->where("session_id",$session_id)->delete();
		return redirect()->to(base_url()."/profile");
			
			
	}
	
	
	
	//--------------------------------------------------------------------

}
