<?php namespace App\Controllers;

class Wholesale extends BaseController {
    
    public function __construct(){
  		helper('fun');
  	}
	
	public function index() {
  	        $request = service('request');
		    $db = \Config\Database::connect();
		    
		  //  $sql = "SELECT * FROM category_master order by id DESC";
    // 		$categories = $db->query($sql)->getResult(); 
    // 		$data["categories"]=$categories;
            return view('wholesale');
  	   
	}
	

}

