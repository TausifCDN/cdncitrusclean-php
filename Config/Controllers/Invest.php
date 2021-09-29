<?php namespace App\Controllers;

class Invest extends BaseController
{

	public function __construct(){

  		helper('fun');
  	}

	public function index()
	{	
	
	
			$request = service('request');
		$db = \Config\Database::connect();

		$sql = "SELECT * FROM faq";
		$faq = $db->query($sql)->getResult('array');   

$data["faq"]=$faq;
		return view('invest',$data);
	}

}