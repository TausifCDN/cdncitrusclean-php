<?php


function get_category_name($id){

	   
		$db = \Config\Database::connect();
		
		$sql = "SELECT name FROM categories where id='".$id."'";
		$category = $db->query($sql)->getfirstrow('array');     
		return $category;
		
}


function get_section($id){

	   
		$db = \Config\Database::connect();
		
		$sql = "SELECT * FROM sections where id='".$id."'";
		$section = $db->query($sql)->getFirstrow('array');     
		return $section;
		
}

?>