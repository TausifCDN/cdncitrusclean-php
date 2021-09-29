<?php namespace App\Controllers;

class User extends BaseController
{
	public function signin() {

		$validation =  \Config\Services::validation();
		$request = service('request');
		$session = \Config\Services::session();
		$db = \Config\Database::connect();

		$email = $_REQUEST['email'];
		$pass = $_REQUEST['password'];
        $ciphertext =hash('sha256',md5($pass.hash('sha256',$pass)));
		$sql = "SELECT * FROM users where email_id = '".$email."' and password='".$ciphertext."';";
		$user_arr = $db->query($sql)->getFirstrow('array');

		if($user_arr != null)
		{


			if($user_arr["is_active"]==0)
				{
					$arr["msg"]="Your Account is Inactive.";
					$arr["status"]=0;
					die(json_encode($arr));
				}
				
				$newdata = [
			        'user_id'  => $user_arr["id"],
			        'email'     => $user_arr["email_id"],
			        'user_name' => $user_arr["first_name"],
			        'logged_in' => date("Y/m/d H:i:s")
				];

				$session->set($newdata);
				echo json_encode(1);
			} 
		else {
			echo json_encode('Incorrect username/password combination');
		}
	}

	public function profile() {

		$request = service('request');
		$session = \Config\Services::session();
		$db = \Config\Database::connect();

		$sql = "SELECT * FROM users where id='".$_SESSION['user_id']."'";
		$user_arr = $db->query($sql)->getFirstrow('array');

		$data['user'] = $user_arr;

		return view('profile',$data);
	}

	public function signup() {

		$request = service('request');
		$session = \Config\Services::session();
		$db = \Config\Database::connect();

		$name = $_REQUEST['first_name'];
		$lastname = $_REQUEST['last_name'];
		$email = $_REQUEST['email_id'];
		$password = $_REQUEST['password'];
        $ciphertext =hash('sha256',md5($password.hash('sha256',$password)));
    	$sql = "SELECT * FROM users where email_id = '".$email."'";
    	$user_arr = $db->query($sql)->getFirstrow('array');
    
    	if($user_arr != null) {
    		echo json_encode('Email already exists');
    	} else {
    		$sql_data = array(
    			'first_name' => $name,
    			'last_name' => $lastname,
    			'email_id' => $email,
    			'password' => $ciphertext,
   				'is_active' => 1
    		);
    		$db->table("users")->insert($sql_data);
    		$user_id= $db->insertID();
    		$newdata = [
			    'user_id'  => $user_id,
			    'email'     => $email,
			    'user_name' => $name,
			    'logged_in' => date("Y/m/d H:i:s")
			];

			$session->set($newdata);
    		echo json_encode(1);
    	}
	}

	public function update() {

		$request = service('request');
		$session = \Config\Services::session();
		$db = \Config\Database::connect();

		$user_id = $session->user_id;

		$sql_data = array(
			'first_name' => $_REQUEST['first_name'],
			'last_name' => $_REQUEST['last_name'],
			//'email_id' => $_REQUEST['email'],
			'address' => $_REQUEST['address'],
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state']
		);
		if($db->table("users")->where('id',$user_id)->update($sql_data)) {
			$session->setFlashdata('msg','Successfully updated profile');
			return redirect()->to(base_url().'/user/profile');
		}
	}
	public function changepassword() {
		$request = service('request');
		$session = \Config\Services::session();
		$db = \Config\Database::connect();

		$user_id = $session->user_id;
        $oldpassword = $_REQUEST['oldpassword'];
        $newpassword = $_REQUEST['newpassword'];
        if($newpassword!=""){
            $ciphertext =hash('sha256',md5($newpassword.hash('sha256',$newpassword)));
    		$sql_data = array(
    			'password' => $ciphertext,
    		);
    		if($db->table("users")->where('id',$user_id)->update($sql_data)) {
    			$session->setFlashdata('msg','Password updated Successfully!');
    			return redirect()->to(base_url().'/user/profile');
    		}
	    }else{
	        $session->setFlashdata('msg','Something Went wrong please try again!');
    		return redirect()->to(base_url().'/user/profile');
	    }
	}
	
	public function allUsers(){	
		$request = service('request');
		$db = \Config\Database::connect();

		$sql = "SELECT * FROM users order by id DESC";
		$users = $db->query($sql)->getResult();   
		$data["users"]=$users;
       return view('admin/users',$data);
       
	}
}