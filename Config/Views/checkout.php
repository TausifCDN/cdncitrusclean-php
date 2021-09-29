<script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/sq-payment-form.css">
<?php 

include(APPPATH."Views/__partial/__header.php"); ?>
<script>
    window.applicationId ='<?php echo $square_config['applicationId'];?>';
    window.locationId ='<?php echo $square_config['locationId'];?>';
    window.base_url ="<?php echo base_url();?>";
</script>
<!-- <div class="container"> -->
    <!--residental-->
    <section class="residantel_range">
        <div class="container">
            <div class="row">
                <div classs="col-md-12">
                    <h2><?php if($main_category['category_id']!=$next_category['category_id']) { ?><img src="<?= base_url() ?>/assets/images/tic.png" height="20px"> <?= $main_category['category_name'] ?> -> <?php } ?><img src="<?= base_url() ?>/assets/images/tic.png" height="20px"> <?= $next_category['category_name'] ?> -> Checkout</h2>
                </div>
            </div>
        </div>
    </section>
    <!--prodects-->
    <section class="Our_prodects">
        <div class="container">
		<form name="frm_cart" id="frm_cart" action="<?=base_url()?>/payments/add_cart" method="post">
		
            <div class="row">
                <h3>Checkout</h3>
                <?php 
                
                $count=0;
                $totalprice=0;
                $totaldiscount=0;
				foreach ($products as $p) { 
				$count++;
                $totalprice+=($p['sale_price']*$p['qty']);
                $discount=(($p['sale_price']*$p['qty'])*$p['discount_percentage'])/100;
                $totaldiscount+=$discount;
				?>
                <div class="inner-main-prrrrrt mb-5">
                    <div class="Inerr_prodect_items">
                        <img src="<?= base_url() ?>/../uploads/<?= $p['product_image'] ?>" class="img-fluid w-100" style="height: 150px;object-fit: cover;">
                        <!--<a href="#">Click to expand</a>-->
                    </div>
                    <div class="main_items_prodeeects">
                    <div class="Prodect_item_info">
                        <h4><?= $p['product_name'] ?></h4>
                        <div class="input-group mw115 ">
                            <span class="input-group-btn">
                                <button type="button" data-id="<?=$p["id"]?>" class="quantity-left-minus btn btn-danger btn-number">
                                 <i class="fa fa-minus"></i>
                                </button>
                            </span>
                            
                            <input type="text" id="quantity_<?=$p["id"]?>" data-id="<?=$p["id"]?>" data-qty="1" name="quantity_<?=$p["product_id"]?>" class="quantity input_qty  input-number" value="<?= $p['qty'] ?>" min="1" max="100" readonly="">
							<input type="hidden" id="product_id_<?=$p["id"]?>" name="product_id_<?=$p["product_id"]?>" value="<?=$p["product_id"]?>">
							<input type="hidden" id="category_id_<?=$p["id"]?>" name="category_id_<?=$p["product_id"]?>" value="<?=$p["category_id"]?>">							

                            
                            
                            <span class="input-group-btn">
                                <button type="button" data-id="<?=$p["id"]?>" class="quantity-right-plus btn btn-success btn-number">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                            <span class="mx-5 my-3" id="percentage_<?=$p["id"]?>" style="color: #F26122;font-size: 18px;">
                            <?php if($p['is_discount']==1) { ?>
                                <?= $p['discount_percentage'] ?>% discount
                            <?php } ?>
                            </span>
                        </div>

                    </div>
                    <div class="prodect_range_items">
                        <h6><span id="total_<?=$p["id"]?>"style="color:#B12704;font-weight: 700;">$<?= $p['sale_price']*$p['qty'] ?></span></h6>
                        <p><span id="total_discount_<?=$p["id"]?>" style="font-size: 20px;color:#A9A9A9">Discount : $<?= $discount ?></span></p>
                    </div>
                    <!-- <div class="sprater"></div> -->
                    
                </div>
                </div>
                <input type="hidden" id="price_<?= $p['id'] ?>">
				<input type="hidden" id="item_count" name="item_count" value="<?=$count?>" >							
            <?php } ?>
					
            </div>
     <hr>
            <div class="row">
                <div class="col-md-6">
                    <p>Subtotal</p>
                </div>
                <div class="col-md-6 text-right">
                    <p>$<span id="sub_total"><?= $totalprice-$totaldiscount ?></span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Shipping Cost</p>
                </div>
                <div class="col-md-6 text-right">
                    <p>$<?php echo $shipping_cost;?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h4>Total</h4>
                </div>
                <div class="col-md-6 text-right">
                    <h4>$<span id="shipping_total"><?= ($totalprice-$totaldiscount)+$shipping_cost ?></span></h4>
                </div>
            </div>
            </form>
            
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="" style="float: left;width: 100%;padding: 0px;margin: 0px;">Make Payment</h3>
                    <!-- Begin Payment Form -->
                    <?php if($session->user_id!=""){ ?>
                    <input type="hidden" id="is_login" value="true">
                    <?php }else{?>
                    <input type="hidden" id="is_login" value="false">
                    <?php } ?>
                    <div class="sq-payment-form">
                        <!--<div id="sq-walletbox">
                            <button id="sq-google-pay" class="button-google-pay"></button>
                            <button id="sq-apple-pay" class="sq-apple-pay"></button>
                            <button id="sq-masterpass" class="sq-masterpass"></button>
                            <div class="sq-wallet-divider">
                                <span class="sq-wallet-divider__text">Or</span>
                            </div>
                        </div>-->
                        <div id="sq-ccbox">
                            <form id="nonce-form" novalidate action="<?=base_url()?>/payments/createPayment" method="post">
                                <?php 
                                if($session->getFlashdata("pay_error")=='1'){
                                    echo '         <div class="sq-field red alert alert-danger">';
                                    echo  $session->getFlashdata("pay_error_code")."<BR>";
                                    echo  $session->getFlashdata("pay_error_msg");
                                    echo '        </div>';
                                }
                                ?>
                                <div class="sq-field">
                                    <label class="sq-label">Email</label>
                                    <div><input type="email" name="email"  id="checkout_email" class="form-control" required></div>
                                </div>
                                <div class="sq-field">
                                    <label class="sq-label">Phone</label>
                                    <div id="phone"><input type="number" name="phone" class="form-control" required></div>
                                </div>
                                <div class="sq-field">
                                    <label class="sq-label">Card Number</label>
                                    <div id="sq-card-number"></div>
                                </div>
                                <div class="sq-field-wrapper">
                                    <div class="sq-field sq-field--in-wrapper">
                                        <label class="sq-label">CVV</label>
                                        <div id="sq-cvv"></div>
                                    </div>
                                    <div class="sq-field sq-field--in-wrapper">
                                        <label class="sq-label">Expiration</label>
                                        <div id="sq-expiration-date"></div>
                                    </div>
                                    <div class="sq-field sq-field--in-wrapper">
                                        <label class="sq-label">zip/Postal</label>
                                        <div id="sq-postal-code"></div>
                                    </div>
                                </div>
                                <?php 
                                if($session->getFlashdata("pay_error")=='1'){
                                    echo '         <div class="sq-field red">';
                                    echo  $session->getFlashdata("pay_error_code")."<BR>";
                                    echo  $session->getFlashdata("pay_error_msg");
                                    echo '        </div>';
                                }
                                ?>
                                
                                
                                <div class="sq-field">
                                    <button id="sq-creditcard" class="sq-button btn btn-theme" onclick="onGetCardNonce(event)">
                                        Confirm & Pay
                                    </button>
                                </div>
                                <!--
                                After a nonce is generated it will be assigned to this hidden input field.
                                -->
                                <div id="error"></div>
                                <!--<input type="hidden" id="card-nonce" name="nonce">-->
                                <input type="hidden" id="card-nonce" name="nonce">
                            </form>
                        </div>
                    </div>
                    <!-- End Payment Form -->
                </div>
            </div>  
        </div>
    </section>
<!-- </div> -->

<div class="modal fade px-0" id="megaDiscount">
  <div class="modal-dialog px-0" role="document">
    <div class="modal-content">
        <div class="modal-body p-4">
            <h3 class="py-3 mega_head">Last chance to avail the mega discount offer</h3>
                    <?php foreach($mega as $p) { ?>
                        <div class="row mega_content">
                            <div class="col-md-2 col-6">
                                 <div class="featured-text" style="left: 15px;">
                                    <span>Best Seller</span>
                                </div>   
                                <img src="<?= base_url() ?>/../uploads/<?= $p['product_image'] ?>" class="img-fluid w-100">
                            </div>
                            <div class="col-md-3 col-6 pt-3">
                                <h4 class="mega_product"><?= $p['product_name'] ?></h4>
                                <div class="input-group mw115 ">
                                    <span class="input-group-btn">
                                        <button type="button" data-id="<?=$p["id"]?>" class="quantity-left-minus btn btn-danger btn-number">
                                         <i class="fa fa-minus"></i>
                                        </button>
                                    </span>

                                    <input type="text" id="quantity_<?=$p["id"]?>" data-id="<?=$p["id"]?>" data-qty="1" name="quantity_<?=$count?>" class="quantity input_qty  input-number" value="0" min="1" max="100" readonly="">
                                    <input type="hidden" id="product_id_<?=$p["id"]?>" name="product_id_<?=$count?>" value="<?=$p["id"]?>">
                                    <input type="hidden" id="category_id_<?=$p["id"]?>" name="category_id_<?=$count?>" value="<?=$p["category_id"]?>">                          

                                    <span class="input-group-btn">
                                        <button type="button" data-id="<?=$p["id"]?>" class="quantity-right-plus btn btn-success btn-number">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 prodect_range_items pt-3">
                                <h6 style="font-size: 20px;">
                                    <span style="font-size: 18px;" class="mr-2">Was : 
                                        <span style="font-size: 18px; text-decoration: line-through;">$<?= $p['was_price'] ?>
                                        </span>
                                    </span>
                                    $<?= $p['sale_price'] ?>
                                </h6>
                            </div>
                            <div class="col-md-4 col-6 text-right">
                                <button class="btn removeOffer_btn" style="color: #7d7d7d;border-radius: 20px;border: 1px solid #7d7d7d;"><i class="fa fa-trash"></i> Remove Offer</button>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="py-5">
                    <a href="javascript:void()" data-dismiss="modal" class="btn custom-btn-orange">Add to Cart</a>&nbsp;&nbsp;&nbsp;
                    
                   <a href="javascript:void()" data-dismiss="modal" class="btn custom-btn-white">Not Interested</a>
               </div>
        </div>
    </div>
  </div>
</div>

<?php include(APPPATH."Views/__partial/__footer.php");?>  
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/sq-payment-form.js"></script>
<script>
$(document).ready(function() {    
    $('#megaDiscount').modal('show');
});

function calcTotal(response,id){
    console.log(response);
    var curr_qty=response.qty;
    var item_total=response.item_total;
    var item_discount=response.item_discount;
    var subtotal=response.subtotal;
    var total=response.total;
    $("#quantity_"+id).val(curr_qty);
    $("#total_"+id).text("$"+item_total);
    $("#total_discount_"+id).text("Discount: $"+item_discount);
    $("#sub_total").text(subtotal);
    $("#shipping_total").text(total);
}

$(".quantity-left-minus").click(function(e){

	var id= $(this).attr("data-id");
	var qty=0;
	qty=parseInt($("#quantity_"+id).val());

	if(qty>=1) qty--;
		$("#quantity_"+id).val(qty);

    $.ajax({
            type: "post",
            url: "<?= base_url('/ajax/checkout_qty_change') ?>",
            data: "id="+id+"&qty="+qty,
            dataType: "json",
            success: function (response) {
                calcTotal(response,id);
                /*var current_total=parseInt($("#total_"+id).text());
                var current_discount=parseInt($("#total_discount_"+id).text());
                var current_sub_total=parseInt($("#sub_total").text());
                var total = response.sale_price*response.qty;
                var discount = total*response.discount_percentage/100;
                var old_sub_total = current_sub_total-current_total+current_discount;
                var sub_total = old_sub_total+total-discount;
                $("#quantity_"+id).val(response.qty);
                $("#total_"+id).text(total);
                $("#total_discount_"+id).text(discount);
                $("#sub_total").text(sub_total);
                $("#shipping_total").text(sub_total+23.99);
                if(current_discount==0) {
                    if(response.is_discount == 1) {
                        alert("z");
                        $("#percentage_"+id).text(response.discount_percentage+"% discount");
                    }
                }*/
            }
        })

	
});

$(".quantity-right-plus").click(function(e){
	// alert("ok");
	var id= $(this).attr("data-id");
	var qty=0;
	qty=parseInt($("#quantity_"+id).val());
	if(qty<=98) qty++;


   $.ajax({
        type: "post",
        url: "<?= base_url('/ajax/checkout_qty_change') ?>",
        data: "id="+id+"&qty="+qty,
        dataType: "json",
        success: function (response) {
            calcTotal(response,id);
            /*var current_total=parseInt($("#total_"+id).text());
            var current_discount=parseInt($("#total_discount_"+id).text());
            var current_sub_total=parseInt($("#sub_total").text());
            
            var total = response.sale_price*response.qty;
            var discount = total*response.discount_percentage/100;
            
            var old_sub_total = current_sub_total-current_total+current_discount;
            var sub_total = old_sub_total+total-discount;
            $("#quantity_"+id).val(response.qty);
            $("#total_"+id).text("$"+total);
            $("#total_discount_"+id).text("Discount: $"+discount);
            $("#sub_total").text(sub_total);
            $("#shipping_total").text(sub_total+23.99);
            if(current_discount==0) {
            alert("p");
                if(response.is_discount == 1) {
                    alert("z");
                    $("#percentage_"+id).text(response.discount_percentage+"% discount");
                }
            }*/
        }
    })
	
});
</script>
