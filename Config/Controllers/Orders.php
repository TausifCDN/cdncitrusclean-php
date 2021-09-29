<?php namespace App\Controllers;

class Orders extends BaseController {
    public function __construct(){
  		helper('fun');
  	}
	public function index() {	
        if(is_admin_login()){
  	        $request = service('request');
		    $db = \Config\Database::connect();
		    
		    $sql = "SELECT * FROM orders order by id DESC";
    		$orders = $db->query($sql)->getResult(); 
    		$data["orders"]=$orders;
            return view('admin/orders',$data);
  	    }else{
  	        return redirect()->to(admin_base_url());
  	    }
	}
	
	public function order_delete(){
		/*$request = service('request');
		$db = \Config\Database::connect();		
		$id=$request->getGet("id");
		$db->table("orders")->where('id',$id)->delete();
		return redirect()->to(admin_base_url()."/orders");*/ 
	}

}