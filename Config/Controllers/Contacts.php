<?php namespace App\Controllers;

class Contacts extends BaseController
{
	public function index(){
	    $request = service('request');
		$db = \Config\Database::connect();
		$sql = "SELECT * FROM faq";
		$faq = $db->query($sql)->getResult('array');   
        $data["faq"]=$faq;
		return view('contact',$data);
	}
	
	public function sendContact(){
	    $request = service('request');
	    $session = \Config\Services::session();
	    $data=array();
	   // $to = "info@cdncitrusclean.com";
	   // $to = "info@cdncitrusclean.com";
	    $to = "info@cdncitrusclean.com";
        $subject = "CDN Contact From";
        $name=$_REQUEST['name'];
        $email=$_REQUEST['email'];
        $company=$_REQUEST['company'];
        $subject1=$_REQUEST['subject'];
        $message=$_REQUEST['message'];
        $data=[
            "name"=>$name,
            "email"=>$email,
            "company"=>$company,
            "subject"=>$subject1,
            "message"=>$message,
        ];
        // print_r($to); 
        // print_r($subject); 
        // print_r($data);
        // die();
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: CDN Citrus Clean<noreply@sunstonedigitaltech.com>' . "\r\n";
        $mail_res =  mail($to,$subject,view('email/contactForm',$data),$headers);
        $session->setFlashdata('contact_submit','Thank you! We will get back to you soon.');
		return redirect()->to(base_url()."/contacts");
		//return view('email/contactForm',$data);
	}
}