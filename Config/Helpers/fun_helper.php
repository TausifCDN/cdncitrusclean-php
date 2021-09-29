<?php

function get_cart()
{
	$request = service('request');
		$session = service('session');
		$db = \Config\Database::connect();

		$session_id=$session->session_id;
		
		$sql = "SELECT products.product_name,products.product_image,products.product_image,products.was_price,products.sale_price,sales_temp.* FROM sales_temp,products where sales_temp.product_id=products.id and session_id='".$session_id."'";
		$categories = $db->query($sql)->getResult('array'); 
		$data = $categories;

		return $data;
}

function get_country()
{
	$session = service('session');
	
	$ip=$_SERVER['REMOTE_ADDR'];


	$session->set("country","United States of America");
	
	
	if($session->country=="")
	{
		die("A");
		$ch = curl_init("http://ip-api.com/json/".$ip);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		$output = curl_exec($ch);
		
		$data=json_decode($output,false);
		$session->set("country",$data["country"]);
	}


	get_currency();
}

function get_package_price($id)
{
	 return 0;
}

function get_currency()
{
	
	$session = service('session');
	$session->set("currency",'$');

	return '$';
	
		$sql = "SELECT * from currency where country ='".$_SESSION["country"]."';";
		$rss = $db->query($sql)->getResult('array');  
		
		$d=$rss["currency_code"];
		$session->set("currency",$d);

		return $d;
}


function get_package_was_price($id){

	  
		$session = service('session');
		$db = \Config\Database::connect();
		$sql = "SELECT price from package_price where package_id ='".$id."' and currency_code='".$session->currency."'";
		$package = $db->query($sql)->getFirstRow('array');  
		$price=intval($package["price"]);
		return $price;
		
}


function get_package_sale_price($id)
{

	   
		$db = \Config\Database::connect();
			$session = service('session');
		$sql = "SELECT sale_price from package_price where package_id ='".$id."' and currency_code='".$session->currency."'";
		$package = $db->query($sql)->getFirstRow('array');  
		
		$price=intval($package["sale_price"]);
		return $price;
		
}




function get_addon_price($id)
{

	   
		$db = \Config\Database::connect();
			$session = service('session');

		 $sql = "SELECT addon_price from package_addon_price where package_addon_id ='".$id."' and currency_code='".$session->currency."'";
		$package = $db->query($sql)->getFirstRow('array');  
		
		$price=intval($package["addon_price"]);
		return $price;
		
}

function get_cart_qty()
{
   
 		$session = service('session');
		$db = \Config\Database::connect();

		$session_id=$session->session_id;
		$sql = "SELECT count(DISTINCT package_id) as cnt FROM sales_temp WHERE session_id ='".$session_id."' ";
		$rss= $db->query($sql)->getFirstRow('array');  
		
		$cnt=intval($rss["cnt"]);
		return $cnt;

		
}

?>