<?php namespace App\Controllers;

class About extends BaseController
{

	public function __construct(){

  		helper('fun');
  	}

	public function index()
	{	
		return view('about');
	}

}