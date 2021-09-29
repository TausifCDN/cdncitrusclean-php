<?php namespace App\Controllers;

class Careers extends BaseController {
    
    public function __construct(){
  		helper('fun');
  		helper('download');
  	}
	
		public function index() {	
	   
		return view('careers');
  	}
	
	
	public function Careerss() {	
        if(is_admin_login()){
  	        $request = service('request');
		    $db = \Config\Database::connect();
		    
		    $sql = "SELECT * FROM jobs order by id DESC";
    		$categories = $db->query($sql)->getResult(); 
    		$data["categories"]=$categories;
            return view('admin/career_s',$data);
  	    }else{
  	        return redirect()->to(admin_base_url());
  	    }
	}

	
	public function createjobs() {	
		$request = service('request');
		$db = \Config\Database::connect();
		$validation =  \Config\Services::validation();
		$session = \Config\Services::session();

        $data["first_name"]=$request->getPost("first_name");
        $data["last_name"]=$request->getPost("last_name");
        $data["department"] = implode(",", $request->getPost("department"));
        $data["email"]=$request->getPost("email");
        $data["recaptcha"]=$request->getPost("recaptcha");
        $data["phone"]=$request->getPost("phones");
        
        $banner_image=$this->uploadFile("resume","uploads/careers/");
	    if($banner_image!=""){
	        $data["resume"]=$banner_image;
	    }
	   
	   //print_r($data); die();
		$db->table("jobs")->insert($data);

	   	if($db) {
	   	    $session->setFlashdata('successmsg','Job Application has Been Submitted Successfully');
	   	    return redirect()->to(base_url().'/Careers/careers');
        }else {
		    $session->setFlashdata('errormsg',' Unbale To Submit Job Application, Please Try Again Later!!' );
		    return redirect()->to(base_url().'/Careers/careers');
		}
		
	}
	
	public function editjobs() {
	    $request = service('request');
		$db = \Config\Database::connect();
	    $id=$request->getGet("id");
	    $sql = "SELECT * FROM jobs Where id='".$id."'";
        $categoryData = $db->query($sql)->getFirstrow(); 
        $data['categoryData']=$categoryData;
        return view('admin/editcareers',$data);
	}
	
	public function updatejobs() {	
		$request = service('request');
		$db = \Config\Database::connect();
        $id=$request->getGet("id");
        
        $data["first_name"]=$request->getPost("first_name");
        $data["last_name"]=$request->getPost("last_name");
        $data["department"] = implode(",", $request->getPost("department"));
        // $data["department"]=$request->getPost("department");
        $data["email"]=$request->getPost("email");
        $data["recaptcha"]=$request->getPost("recaptcha");
        $data["phone"]=$request->getPost("phones");
        
        $banner_image=$this->uploadFile("resume","uploads/careers/");
	    if($banner_image!=""){
	        $data["resume"]=$banner_image;
	    }
        //  print_r($data); die();
		$db->table("jobs")->update($data,["id"=>$id]);
		return redirect()->to(base_url().'/admin/careers');
	}
	
	public function jobs_delete(){
		$request = service('request');
		$db = \Config\Database::connect();		
		$id=$request->getGet("id");
		$db->table("jobs")->where('id',$id)->delete();
		return redirect()->to(base_url()."/Careers/Careerss"); 
	}
	

}

