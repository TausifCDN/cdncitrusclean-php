<?php namespace App\Controllers;

class Category extends BaseController {
    
    public function __construct(){
  		helper('fun');
  	}
	
	public function index() {	
        if(is_admin_login()){
  	        $request = service('request');
		    $db = \Config\Database::connect();
		    
		    $sql = "SELECT * FROM category_master order by id DESC";
    		$categories = $db->query($sql)->getResult(); 
    		$data["categories"]=$categories;
            return view('admin/categories',$data);
  	    }else{
  	        return redirect()->to(admin_base_url());
  	    }
	}
	
	public function addCategory() {	
       return view('admin/addcategory');
	}
	public function editCategory() {
	    $request = service('request');
		$db = \Config\Database::connect();
	    $id=$request->getGet("id");
	    $sql = "SELECT * FROM category_master Where id='".$id."'";
        $categoryData = $db->query($sql)->getFirstrow(); 
        $data['categoryData']=$categoryData;
        return view('admin/editCategory',$data);
	}
	
	public function createCategory() {	
		$request = service('request');
		$db = \Config\Database::connect();

        $data["category_name"]=$request->getPost("category_name");
        $slug = url_title($request->getPost("category_name"), '-', true);
        $data["slug"]=$slug;
        $data["banner_title"]=$request->getPost("banner_title");
        $data["banner_desc"]=$request->getPost("banner_desc");
        $data["page_desc"]=$request->getPost("page_desc");
        
        $banner_image=$this->uploadFile("banner_image","uploads/category/");
        $category_image=$this->uploadFile("category_image","uploads/category/");
	    if($banner_image!=""){
	        $data["banner_image"]=$banner_image;
	    }
	    if($category_image!=""){
	        $data["category_image"]=$category_image;
	    }
		$db->table("category_master")->insert($data);
		return redirect()->to(admin_base_url().'/categories');
	}
	
	public function updateCategory() {	
		$request = service('request');
		$db = \Config\Database::connect();
        $id=$request->getGet("id");
        $data["category_name"]=$request->getPost("category_name");
        $slug = url_title($request->getPost("category_name"), '-', true);
        $data["slug"]=$slug;
        $data["banner_title"]=$request->getPost("banner_title");
        $data["banner_desc"]=$request->getPost("banner_desc");
        $data["page_desc"]=$request->getPost("page_desc");
        
        $banner_image=$this->uploadFile("banner_image","uploads/category/");
        $category_image=$this->uploadFile("category_image","uploads/category/");
	    if($banner_image!=""){
	        $data["banner_image"]=$banner_image;
	    }
	    if($category_image!=""){
	        $data["category_image"]=$category_image;
	    }
		$db->table("category_master")->update($data,["id"=>$id]);
		return redirect()->to(admin_base_url().'/categories');
	}
	
	public function category_delete(){
		$request = service('request');
		$db = \Config\Database::connect();		
		$id=$request->getGet("id");
		$db->table("category_master")->where('id',$id)->delete();
		return redirect()->to(admin_base_url()."/categories"); 
	}

}

