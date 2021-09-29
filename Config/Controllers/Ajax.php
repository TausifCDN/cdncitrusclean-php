<?php namespace App\Controllers;

class Ajax extends BaseController
{	

  public function qty_change()
  {
    $request = service('request');
    $db = \Config\Database::connect();
      
    $id = $_REQUEST['id'];
    $qty = $_REQUEST['qty'];

    $sql_data['qty'] = $qty;

    $sql= "SELECT products.on_qty_discount,products.discount_percentage,sales_temp.is_discount FROM sales_temp,products WHERE sales_temp.product_id=products.id and sales_temp.id=$id";
    $sale = $db->query($sql)->getFirstRow('array'); 

    if($sale['is_discount'] == 0) {
      if($qty>=$sale['on_qty_discount']) {
        $sql_data['discount_percentage'] = $sale['discount_percentage'];
        $sql_data['is_discount'] = 1;
      }
    }

    $db->table('sales_temp')->update($sql_data,"id='".$id."' limit 1");
    $sql = "SELECT products.sale_price,sales_temp.* FROM sales_temp,products WHERE sales_temp.product_id=products.id and sales_temp.id=$id";
    $products = $db->query($sql)->getFirstRow('array'); 
    echo json_encode($products);
  }
  public function checkout_qty_change(){
    $request = service('request');
    $session = service('session');
    $db = \Config\Database::connect();
    $session_id=$session->session_id;
    $id = $_REQUEST['id'];
    $qty = $_REQUEST['qty'];

    if($qty>0){
        $sql_data['qty'] = $qty;
    
        $sql= "SELECT products.on_qty_discount,products.discount_percentage,sales_temp.is_discount FROM sales_temp,products WHERE sales_temp.product_id=products.id and sales_temp.id=$id";
        $sale = $db->query($sql)->getFirstRow('array'); 
    
        if($sale['is_discount'] == 0) {
          if($qty>=$sale['on_qty_discount']) {
            $sql_data['discount_percentage'] = $sale['discount_percentage'];
            $sql_data['is_discount'] = 1;
          }
        }
    
        $db->table('sales_temp')->update($sql_data,"id='".$id."' limit 1");
    }else{
        $sql="DELETE FROM sales_temp WHERE session_id='".$session_id."' AND id='".$id."'";
    	$query=$db->query($sql);
    }
    $sql = "SELECT products.sale_price,sales_temp.* 
                    FROM sales_temp,products 
                    WHERE sales_temp.product_id=products.id and sales_temp.session_id='".$session_id."'";
    $cart_items = $db->query($sql)->getResult('array');
    $curr_item_total=0;
    $curr_item_discount=0;
    
    $allItemsTotal=0;
    $allItemDisount=0;
    $subtotal=0;
    $total=0;
    if($cart_items){
        foreach($cart_items as $cart_item){
            $discount_percentage=$cart_item['discount_percentage'];
            $sale_price=$cart_item['sale_price'];
            $item_qty=$cart_item['qty'];
            $item_total=($sale_price*$item_qty);
            $allItemsTotal+=$item_total;
            $item_discount=($item_total*$discount_percentage)/100;
            $allItemDisount+=$item_discount;
            if($id==$cart_item['id']){
                $curr_item_total=$item_total;
                $curr_item_discount=$item_discount;
                $qty=$item_qty;
            }
        }
    }
    $subtotal=$allItemsTotal-$allItemDisount;
    $total=$subtotal+$this->shipping_cost;
    $data=[
        "qty"=>$qty,
        "item_total"=>$curr_item_total,
        "item_discount"=>$curr_item_discount,
        "subtotal"=>$subtotal,
        "total"=>$total
    ];
    echo json_encode($data);
  }

  public function product_detail() {

    $request = service('request');
    $session = service('session');
    $db = \Config\Database::connect();
    
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $detail = $db->query($sql)->getFirstRow('array'); 
    echo json_encode($detail);
  }
		
}
?>