<?php namespace App\Controllers;

class Products extends BaseController
{

	public function index(){	

		$session = service('session');
		$request = service('request');
		$db = \Config\Database::connect();
		
		$category=$_REQUEST['id'];
		$product_id=$_REQUEST['product_id'];

		$session_id=$session->session_id;
		$sql="select category_master.category_name,sales_temp.* from sales_temp,category_master where category_master.id=sales_temp.category_id and session_id='".$session_id."'";
		$main_category = $db->query($sql)->getFirstRow('array'); 
		if(!empty($main_category)) {
			if($main_category['category_id'] == $category) {
				$data['main_category'] = "";
			} else {
				$data['main_category'] = $main_category;
			} 
		} else {
			$data['main_category'] = "";
		}

		$sql = "SELECT * FROM products where category_id=$category";
		$products = $db->query($sql)->getResult('array');  
        $data["products"]=$products;
		$data["product_id"]=$product_id;

		$sql = "SELECT * FROM category_master where id=$category";
		$categories = $db->query($sql)->getFirstRow('array');  
        $data["categories"]=$categories;

		$sql = "SELECT * FROM category_master where id!=$category order by id asc limit 3";
		$eligible_categories = $db->query($sql)->getResult('array'); 
		$data["eligible_categories"]=$eligible_categories;

		return view('products',$data);
		
	}
	
	public function all_products(){	
		$session = service('session');
		$request = service('request');
		$db = \Config\Database::connect();
	
		$session_id=$session->session_id;
		$sql = "SELECT * FROM products";
		$products = $db->query($sql)->getResult('array');  

		$data["products"]=$products;

		return view('all_products',$data);
		
	}
	
	public function search(){	
		$session = service('session');
		$request = service('request');
		$db = \Config\Database::connect();
	    $search_key=$_REQUEST['search'];
		$session_id=$session->session_id;
		$sql = "SELECT * FROM products WHERE product_name LIKE '%".$search_key."%' OR description LIKE '%".$search_key."%' ";
		$products = $db->query($sql)->getResult('array');  
        $data['search_key']=$search_key;
		$data["products"]=$products;

		return view('search_result',$data);
		
	}
	
	public function adminAllProducts()	{	
		$request = service('request');
		$db = \Config\Database::connect();

		$sql = "SELECT * FROM products order by id DESC";
		$products = $db->query($sql)->getResult();   

		$data["products"]=$products;
       return view('admin/products',$data);
	}
	
	public function addProduct() {
	    $request = service('request');
		$db = \Config\Database::connect();
		$sql = "SELECT * FROM category_master order by id DESC";
		$categories = $db->query($sql)->getResult();   

		$data["categories"]=$categories;
       return view('admin/addProduct',$data);
	}
	public function editProduct() {
	    $request = service('request');
		$db = \Config\Database::connect();
		
		$sql = "SELECT * FROM category_master order by id DESC";
		$categories = $db->query($sql)->getResult();   
		$data["categories"]=$categories;
		
	    $id=$request->getGet("id");
	    $sql = "SELECT * FROM products Where id='".$id."'";
        $productData = $db->query($sql)->getFirstrow(); 
        $data['productData']=$productData;
        return view('admin/editProduct',$data);
	}
	
	public function createProduct() {	
		$request = service('request');
		$db = \Config\Database::connect();

        $data["product_name"]=$request->getPost("product_name");
        $data["was_price"]=$request->getPost("was_price");
        $data["sale_price"]=$request->getPost("sale_price");
        $data["on_qty_discount"]=$request->getPost("on_qty_discount");
        $data["discount_percentage"]=$request->getPost("discount_percentage");
        $data["description"]=$request->getPost("description");
        $data["category_id"]=$request->getPost("category_id");
        
        $product_image=$this->uploadFile("product_image","uploads/products/");
	    if($product_image!=""){
	        $data["product_image"]=$product_image;
	    }
		$db->table("products")->insert($data);
		return redirect()->to(admin_base_url().'/products');
	}
	
	public function updateProduct() {	
		$request = service('request');
		$db = \Config\Database::connect();
        $id=$request->getGet("id");
        
        $data["product_name"]=$request->getPost("product_name");
        $data["was_price"]=$request->getPost("was_price");
        $data["sale_price"]=$request->getPost("sale_price");
        $data["on_qty_discount"]=$request->getPost("on_qty_discount");
        $data["discount_percentage"]=$request->getPost("discount_percentage");
        $data["description"]=$request->getPost("description");
        $data["category_id"]=$request->getPost("category_id");
        
        $product_image=$this->uploadFile("product_image","uploads/products/");
	    if($product_image!=""){
	        $data["product_image"]=$product_image;
	    }
		$db->table("products")->update($data,["id"=>$id]);
		return redirect()->to(admin_base_url().'/products');
	}
	
	public function product_delete(){
		$request = service('request');
		$db = \Config\Database::connect();		
		$id=$request->getGet("id");
		$db->table("products")->where('id',$id)->delete();
		return redirect()->to(admin_base_url()."/products"); 
	}
	
}