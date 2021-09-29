<?php namespace App\Controllers;

class Admin extends BaseController {
    public function __construct(){
  		helper('fun');
  	}
  	public function index() {
  	    $session = \Config\Services::session();
  	    if(is_admin_login()){
  	        return redirect()->to(admin_base_url()."/dashboard");  
  	    }else{
            return view('admin/login');
  	    }
	}
	public function signin() {	
     	$validation =  \Config\Services::validation();
		$request = service('request');
		$session = \Config\Services::session();
		$db = \Config\Database::connect();

		$email = $_REQUEST['email'];
		$pass = $_REQUEST['password'];
		$sql = "SELECT * FROM admins where email = '".$email."' and password='".$pass."';";
		$user_arr = $db->query($sql)->getFirstrow('array');

		if($user_arr != null) {
			$newdata = [
		        'admin_id'  => $user_arr["id"],
		        'admin_email'     => $user_arr["email"],
		        'admin_name' => $user_arr["name"],
			];

			$session->set($newdata);
	        return redirect()->to(admin_base_url().'/dashboard');
		}else {
		    $session->setFlashdata('login_error','Incorrect username/password combination');
		    return redirect()->to(admin_base_url());
		}
	}
	public function logout() {
		$session = \Config\Services::session();
		$array_items = ['admin_id','admin_name', 'admin_email'];
		$session->remove($array_items);
		return redirect()->to(admin_base_url());

	}
	public function dashboard() {
  	   if(is_admin_login()){
  	        $request = service('request');
		    $db = \Config\Database::connect();
		    
		    $sql = "SELECT * FROM users";
    		$categories = $db->query($sql)->getResult(); 
    		$data["categories"]=$categories;
    		
    		$sql = "SELECT * FROM products";
    		$product = $db->query($sql)->getResult(); 
    		$data["product"]=$product;
    		
    		$sql = "SELECT * FROM orders";
    		$order = $db->query($sql)->getResult(); 
    		$data["order"]=$order;
    		
        return view('admin/dashboard',$data);
  	    }else{
  	        return redirect()->to(admin_base_url());
  	    }
	}
	
	
	
}

