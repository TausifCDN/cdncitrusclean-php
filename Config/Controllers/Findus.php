<?php namespace App\Controllers;

class Findus extends BaseController {
    
    public function __construct(){
  		helper('fun');
  	}
	
	public function index() {	
        if(is_admin_login()){
  	        $request = service('request');
		    $db = \Config\Database::connect();
		    
		    $sql = "SELECT * FROM partners order by id DESC";
    		$categories = $db->query($sql)->getResult(); 
    		$data["categories"]=$categories;
            return view('admin/findus',$data);
  	    }else{
  	        return redirect()->to(admin_base_url());
  	    }
	}
	
	public function addfindus() {	
       return view('admin/addfindus');
	}
	public function editfindus() {
	    $request = service('request');
		$db = \Config\Database::connect();
	    $id=$request->getGet("id");
	    $sql = "SELECT * FROM partners Where id='".$id."'";
        $findusData = $db->query($sql)->getFirstrow(); 
        $data['findusData']=$findusData;
        return view('admin/editfindus',$data);
	}
	
	public function createfindus() {	
		$request = service('request');
		$db = \Config\Database::connect();

        $data["name"]=$request->getPost("name");
        
        
        $category_image=$this->uploadFile("logo","uploads/logo/");
	    if($category_image!=""){
	        $data["logo"]=$category_image;
	    }
		$db->table("partners")->insert($data);
		return redirect()->to(base_url().'/Findus');
	}
	
	public function updatefindus() {	
		$request = service('request');
		$db = \Config\Database::connect();
        $id=$request->getGet("id");
        $data["name"]=$request->getPost("name");
        
        
        $category_image=$this->uploadFile("logo","uploads/logo/");
	    if($category_image!=""){
	        $data["logo"]=$category_image;
	    }
		$db->table("partners")->update($data,["id"=>$id]);
		return redirect()->to(base_url().'/Findus');
	}
	
	public function findus_delete(){
		$request = service('request');
		$db = \Config\Database::connect();		
		$id=$request->getGet("id");
		$db->table("partners")->where('id',$id)->delete();
		return redirect()->to(base_url()."/Findus"); 
	}

}

