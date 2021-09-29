<?php namespace App\Controllers;

class Success extends BaseController
{
	public function index()
	{	
		$request = service('request');
		$db = \Config\Database::connect();

		$sale_id = $_REQUEST['sale_id'];
		die($sale_id);

		$sql_data['payment_id']=1;
		
		$db->table('sales_master')->update($sql_data,"id='".$sale_id."'");

		return view('success');
		
	}

}