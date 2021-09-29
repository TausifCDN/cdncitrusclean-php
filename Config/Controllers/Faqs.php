<?php namespace App\Controllers;

class Faqs extends BaseController {
    
    public function __construct(){
  		helper('fun');
  	}
	
	public function index() {	
        if(is_admin_login()){
  	        $request = service('request');
		    $db = \Config\Database::connect();
		    
		    $sql = "SELECT * FROM faq order by id DESC";
    		$faqs = $db->query($sql)->getResult(); 
    		$data["faqs"]=$faqs;
            return view('admin/faqs',$data);
  	    }else{
  	        return redirect()->to(admin_base_url());
  	    }
	}
	
	public function addFaq() {	
       return view('admin/addFaq');
	}
	public function editFaq() {
	    $request = service('request');
		$db = \Config\Database::connect();
	    $id=$request->getGet("id");
	    $sql = "SELECT * FROM faq Where id='".$id."'";
        $faqData = $db->query($sql)->getFirstrow(); 
        $data['faqData']=$faqData;
        return view('admin/editFaq',$data);
	}
	
	public function createFaq() {	
		$request = service('request');
		$db = \Config\Database::connect();

        $data["title"]=$request->getPost("title");
        $data["description"]=$request->getPost("description");
		$db->table("faq")->insert($data);
		return redirect()->to(admin_base_url().'/faqs');
	}
	
	public function updateFaq() {	
		$request = service('request');
		$db = \Config\Database::connect();
        $id=$request->getGet("id");
        $data["title"]=$request->getPost("title");
        $data["description"]=$request->getPost("description");
		$db->table("faq")->update($data,["id"=>$id]);
		return redirect()->to(admin_base_url().'/faqs');
	}
	
	public function faq_delete(){
		$request = service('request');
		$db = \Config\Database::connect();		
		$id=$request->getGet("id");
		$db->table("faq")->where('id',$id)->delete();
		return redirect()->to(admin_base_url()."/faqs"); 
	}
}