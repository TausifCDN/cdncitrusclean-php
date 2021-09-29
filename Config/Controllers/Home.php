<?php namespace App\Controllers;

class Home extends BaseController
{

	public function __construct(){

  		helper('fun');
  	}

	public function index() {	
		$request = service('request');
		$db = \Config\Database::connect();

		$sql = "SELECT * FROM category_master order by id asc  ";
		$categories = $db->query($sql)->getResult('array');   

		// $sql = "SELECT * FROM category_master order by id asc ";
		// $prods = $db->query($sql)->getResult('array'); 

		$sql = "SELECT * FROM products where category_id=4";
		$products = $db->query($sql)->getResult('array');
		
		$sql = "SELECT * FROM home";
        $homeData = $db->query($sql)->getFirstrow(); 
        $data['homeData']=$homeData;
        
        $sql = "SELECT * FROM partners";
        $findusData = $db->query($sql)->getResult('array');
        $data['findusData']=$findusData;

		$data["products"]=$products;
		$data["categories"]=$categories;
		// $data["categories"]=$prods;
		$temp=$data["categories"][1];
		$data["categories"][1]=$data["categories"][0];
		$data["categories"][0]=$temp;

		return view('home',$data);
		
	}
	public function cart(){	
	    $request = service('request');
		$db = \Config\Database::connect();
		$sql = "SELECT * FROM products where category_id=4";
		$products = $db->query($sql)->getResult('array');  

		$data["products"]=$products;
		return view('cart',$data);
	}
    public function checkEmail(){
		$validation =  \Config\Services::validation();
		$request = service('request');
		$session = \Config\Services::session();
		$db = \Config\Database::connect();

		$email = $_POST['email'];

		$sql = "SELECT * FROM users where email_id = '".$email."';";
		$user_arr = $db->query($sql)->getFirstrow('array');

		if($user_arr != null){
		    echo json_encode(1);
		}else {
			echo json_encode(0);
		}
	}
	public function pdf() {

		$request = service('request');
		$session = \Config\Services::session();
		$db = \Config\Database::connect();

		$sql_data=$request->getPost();
		if($db->table('pdf')->insert($sql_data)) {
			$session->setFlashdata('msg','FREE PDF Claimed');
			return redirect()->to(base_url());

		}

	}

	public function forgot() {

		$request = service('request');
		$session = \Config\Services::session();
		$db = \Config\Database::connect();

		$email = $_REQUEST['email'];

		$sql = "SELECT * FROM users where email_id = '".$email."'";
		$user_arr = $db->query($sql)->getFirstrow('array');

		if($user_arr != null)
		{

			if($user_arr["is_active"]==0){
				$arr["msg"]="Your Account is Inactive.";
				$arr["status"]=0;
				die(json_encode($arr));
			}
			
			// send forgot mail here 
			$length=10;
		    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	  
	        $randomString = substr(str_shuffle($str_result),  0, $length);
            $ciphertext =hash('sha256',md5($randomString.hash('sha256',$randomString)));
	        $sql_data = array(
				'password' => $ciphertext,
			);
			$db->table("users")->where('email_id',$email)->update($sql_data);

			$formcontent="You have applied for password recovery for your Sunstone account. Your new password is: ".$randomString."\n"."Please use the above details to login to your account";
            $recipient = $email;
            $subject = "Password recovery";
            $mailed = mail($recipient, $subject, $formcontent);
            if($mailed) {
                echo json_encode(1);
            } else {
                echo json_encode('Email not sent');
            }
				
		}else{
			echo json_encode('Email does not exist');
		}
	}

	public function logout() {

		$session = \Config\Services::session();
		$array_items = ['user_id','user_name', 'email','logged_in'];
		$session->remove($array_items);
		return redirect()->to(base_url());

	}
	
	public function termsConditions(){
	    return view('termsConditions');
	}
	public function returnPolicy(){
	    return view('returnPolicy');
	}
	public function deliveryPolicy(){
	    return view('deliveryPolicy');
	}
	public function privacyPolicy(){
	    return view('privacyPolicy');
	}
	public function cleaning(){
	    return view('cleaning');
	}
	
	
// 	public function adminhome() {	
// 	if(is_admin_login()){
//   	        $request = service('request');
// 		    $db = \Config\Database::connect();
		    
// 		    $sql = "SELECT * FROM home";
//     		$categories = $db->query($sql)->getResult(); 
//     		$data["categories"]=$categories;
//             return view('admin/home',$data);
//   	    }else{
//   	        return redirect()->to(admin_base_url());
//   	    }
		
// 	}
	
	
		public function adminhome() {
	    $request = service('request');
		$db = \Config\Database::connect();
	    $id=$request->getGet("id");
	    $sql = "SELECT * FROM home";
        $categoryData = $db->query($sql)->getFirstrow(); 
        $data['categoryData']=$categoryData;
        return view('admin/home',$data);
	}
	
	
	
	
	
	public function updatehome() {	
		$request = service('request');
		$db = \Config\Database::connect();
        $id=$request->getGet("id");
        
        $data["banner_title"]=$request->getPost("banner_title");
        $data["banner_desc"]=$request->getPost("banner_desc");
        $data["page_desc"]=$request->getPost("page_desc");
        
        $category_image=$this->uploadFile("banner_image","assets/images/");
        $sitelogo=$this->uploadFile("logo","uploads/logo/");
	    
	    if($category_image!=""){
	        $data["banner_image"]=$category_image;
	    }
	    
	    if($sitelogo!=""){
	        $data["logo"]=$sitelogo;
	    }
	    
	   // echo "<pre>";
	   // print_r($data); die();
	    
		$db->table("home")->update($data);
		return redirect()->to(base_url().'/home/adminhome');
	}
	
	
	
}
