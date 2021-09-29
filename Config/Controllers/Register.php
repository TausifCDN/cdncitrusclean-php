<?php namespace App\Controllers;

class Register extends BaseController
{
	public function index()
	{	
		$request = service('request');
		$db = \Config\Database::connect();

		$sql = "SELECT * FROM packages order by id asc";
		$packages = $db->query($sql)->getResult('array');  

		$data["packages"]=$packages; 

		return view('register',$data);
		
	}

	public function submit() {

		$request = service('request');
		$db = \Config\Database::connect();

		$packageId=$request->getPost("package");
		$sql = "SELECT * FROM packages where id=".$packageId."";
		$packages = $db->query($sql)->getFirstRow('array');  

		$sql_data = array(
			'first_name' => $request->getPost("first_name"), 
			'last_name' => $request->getPost("last_name"), 
			'email_id' => $request->getPost("email_id"), 
			'phone' => $request->getPost("phone"), 
		);

		$db->table("users")->insert($sql_data);					
		
		$user_id= $db->insertID();

		$data["user_id"]=$user_id;
		$data["package_id"]=$request->getPost("package");
		$data["staff_required"]=$request->getPost("staff_required");
		$data["requirement_nature"]=$request->getPost("requirement_nature");
		$data["sale_price"]=$packages['price'];
		$data["about_us"]=$request->getPost("about_us");

		if(!empty($_FILES['file']['name'])){  


		    // File path configuration 
		    $uploadDir = "assets/images/attachments/"; 
		    $fileName = basename($_FILES['file']['name']); 		    

		    $uploadFilePath = $uploadDir.$fileName; 
		  
		    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 

			    $data["attachment"]=$fileName;

		    }
	     	
	    }

		if($db->table("sales_master")->insert($data)) {		
		
			$sale_id= $db->insertID();


			foreach($request->getPost("service") as $key){
				if(!empty($key)) {
					$data2=array(
						'sale_id' => $sale_id,
						'assistance' => $key
					);
					$db->table("sales_assistance")->insert($data2);
				}
			}
			$data['sale_id'] = $sale_id;
			return view('payment',$data); 

		} else {
			return redirect()->to(base_url()); 
		}

	}

}