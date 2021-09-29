<?php include(APPPATH."Views/__partial/__header.php"); ?> 

<section class="banner-inner main_resi">
        <div class="container">
            <div class="banner-descrptions2 mobiles-view">
                <?php if($categories['banner_title']!=""){?>
                        <h2><?php echo $categories['banner_title'];?></h2>
                    <?php } ?>
                    <?php if($categories['banner_desc']!=""){?>
                        <?php echo $categories['banner_desc'];?>
                    <?php } ?>
                <div class="btnsss_inner">
                    <a href="<?=base_url();?>/products/all_products">View All Products</a>
                </div>
            </div>
        </div>
            <div class="banner-pic2" style=" background: url(<?= base_url(); ?>/uploads/category/<?php echo $categories['banner_image'];?>);">
            <!--<div class="banner-pic2" style=" background: url(<?=base_url();?>/assets/images/industrials.png);">-->
            </div>
            <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-descrptions2 desktop-view">
                    <?php if($categories['banner_title']!=""){?>
                        <h2><?php echo $categories['banner_title'];?></h2>
                    <?php } ?>
                    <?php if($categories['banner_desc']!=""){?>
                        <?php echo $categories['banner_desc'];?>
                    <?php } ?>
                    <div class="btnsss_inner">
                        <a href="<?=base_url();?>/products/all_products">View All Products</a>
                    </div>
                </div>
            </div>
        </div>
            
        </div>
        
      
    </section>
    <!--residental-->
    <section class="residantel_range">
        <div class="container">
            <div class="row">
                <div classs="col-md-12">
                    <h2><a href="<?=base_url();?>">Home</a> / <?php if(!empty($main_category)) { ?><img src="<?= base_url() ?>/assets/images/tic.png" height="20px"> <?= $main_category['category_name'] ?> -> <?php } ?>Shop <?= $categories['category_name'] ?></h2>
                </div>
            </div>
        </div>
    </section>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_toptext">
                    <?php 
                        echo $categories['page_desc'];
                    ?>
                </div>
            </div>
            
         </div>
      </div> 
      
    <!--prodects-->
    <section class="Our_prodects">
        <div class="container">
            <form name="frm_cart" id="frm_cart" action="<?=base_url()?>/payments/add_cart" method="post">
                <div class="row">
                    <?php 
                        if($categories['category_name']=="Residential Range"){
                            ?>
                            <h3>Product Range</h3> 
                            <?php 
                        }else if($categories['category_name']=="Commercial Range"){  
                            ?>
                            <h3>Buying in bulk? Ask us about our bulk deals</h3> 
                            <?php 
                        }else if($categories['category_name']=="Industrial Range"){ 
                            ?>
                            <h3>Product Range</h3>
                            <?php 
                        } 
                    ?>
                    <?php 
                    $modal_product_id=0;
                    if($products){
                        $modal_product_id=$products[0]['id'];
                    }
                    if($product_id!=""){
                        $modal_product_id=$product_id;
                    }
                    $count=0;
                    foreach ($products as $p) { 
                        $count++;
                        ?>
                        <div class="inner-main-prrrrrt mb-5">
                            <div class="Inerr_prodect_items">
                                <a href="#" class="expandLink" data-toggle="modal" data-id="<?= $p['id'] ?>" data-target="#exampleModalCenter"><img src="<?= base_url() ?>/uploads/products/<?= $p['product_image'] ?>" class="img-fluid w-100"></a>
                                <a href="#" class="expandLink" data-toggle="modal" data-id="<?= $p['id'] ?>" data-target="#exampleModalCenter">Click to expand</a>
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
                                        <input type="text" id="quantity_<?=$p["id"]?>" data-id="<?=$p["id"]?>" data-qty="1" name="quantity_<?=$count?>" class="quantity input_qty  input-number" value="0" min="1" max="100" readonly="">
                                        <input type="hidden" id="product_id_<?=$p["id"]?>" name="product_id_<?=$count?>" value="<?=$p["id"]?>">
                                        <input type="hidden" id="category_id_<?=$p["id"]?>" name="category_id_<?=$count?>" value="<?=$p["category_id"]?>">							
                                        
                                        <span class="input-group-btn">
                                            <button type="button" data-id="<?=$p["id"]?>" class="quantity-right-plus btn btn-success btn-number">
                                            <i class="fa fa-plus"></i>
                                            </button>
                                        </span>
                                        <?php 
                                        if(!empty($main_category)) { 
                                            ?>
                                            <span class="my-3 mx-5 btn-pill-custom">25% off</span>
                                            <?php 
                                        } ?>
                                    </div>
                                    <?php if(!empty($main_category)) { ?>
                                    <?php } else { 
                                        ?>
                                        <p>Buy <span id="discount_<?= $p['id'] ?>" discount-qty="<?php echo $p['on_qty_discount'];?>" style="font-size:20px;color:white;"><?php if($p['on_qty_discount']==10){echo "X";}else{ echo $p['on_qty_discount'];}
                                        ?></span> more items and get an exclusive 20% discount on the purchase</p>
                                        <?php 
                                    } ?>
                                </div>
                                <div class="prodect_range_items">
                                    <h6><span>was : <span style="text-decoration: line-through;">$<?= $p['was_price'] ?></span></span>
                                    $<?= $p['sale_price'] ?></h6>
                                    <?php 
                                    $save=$p['was_price']-$p['sale_price'];
                                    if($save>0){
                                        $perc= $save/$p['was_price']; 
                                    }else{
                                        $perc=0;
                                        $profite_perce=round($perc*100,2);
                                    }
                                    ?>
                                    <p>You Save : $<?= $p['was_price']-$p['sale_price'] ?> (<?= $profite_perce ?>%)</p>
                                </div>
                                <div class="sprater"></div>
                            </div>
                        </div>
                        <input type="hidden" id="item_count" name="item_count" value="<?=$count?>" >							
                        <?php 
                    } ?>
                    <!--<div class="col-sm-12 summary_box">
                    <div class="row">
                    <div class="col-sm-7"></div>
                    <div class="col-sm-5">
                    <div class="row">
                    <div class="col-sm-12 ">
                    <h3 style="padding: 0px;">Summary</h3>
                    </div>
                    <div class="col-sm-12 summary_itemrows">
                    <div class="cart_items">
                    <div class="row item_row">
                    <div class="col-sm-8 product_name">Prodcut1 X 2</div>
                    <div class="col-sm-4 item_total">$100</div>
                    </div>
                    </div>
                    <div class="row total_row">
                    <div class="col-sm-8">Total</div>
                    <div class="col-sm-4 cart_total">$00</div>
                    </div>
                    </div>
                    
                    </div>
                    </div>
                    </div>
                    </div>-->
                    <?php 
                    if(!empty($main_category)) { 
                        ?>
                        <input type="hidden" name="discount_25" value="25">
                        <?php 
                    } ?>
                    <input type="hidden" id="discount_category" name="discount_category">
                    <!--<div class="btn-redcial"> 
                    <?php if(empty($main_category)) { ?>
                    <a href="javascript_void()" data-target="#discount_modal" data-toggle="modal">Proceed to Checkout</a>
                    <?php } else { ?>
                    <a><button type="submit" class="border-0 bg-transparent">Proceed to Checkout</button></a>
                    <?php } ?>
                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="btn-redcial" class="btn-inners" style="margin-left: 16px;font-size: 20px;padding: 26px 18px;">Add to Cart & Continue Shopping</a>
                    </div>-->
                    
                </div>
                <div class="row">
                    <div class="left_col">
                    </div>
                    <div class="right_col">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php 
                                if(empty($main_category)){ 
                                    ?>
                                    <a href="javascript_void()" data-target="#discount_modal" data-toggle="modal" class="btn btn-theme2" style="width:100%;">Proceed to Checkout</a>
                                    <?php 
                                } else { 
                                    ?>
                                    <a><button type="submit" class="btn btn-theme2" style="width:100%;">Proceed to Checkout</button></a>
                                    <?php 
                                } ?>
                            </div>
                            <div class="col-sm-6">
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-theme" style="width:100%;">Add to Cart & Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    <!--available-->
     <?php // include(APPPATH."Views/__partial/__available.php");?> 
    <!--testmonials-->
     <?php // include(APPPATH."Views/__partial/__testimonial.php");?> 

<div class="modal fade" id="discount_modal">
  <div class="modal-dialog claim-popup" role="document">
    <div class="modal-content">
	    <div class="modal-body">
            <div class="row">
                
                    <div class="col-md-1">
                        <img src="<?=base_url();?>/assets/images/claim_img.png" style="width: 40px;">
                    </div>
                    <div class="col-md-11" style="padding-left:20px;">
                        <p>Claim a 20% off discount in a bundled offer with this package, the deal expires in 15 minutes</p>
                        <div class="row">
                            <div class="col-md-7">
                                <button type="button" class="btn theme-btn-1" style="pointer-events: none;"><span class="timer"><img src="<?=base_url();?>/assets/images/clock.png" class="clock">&nbsp;&nbsp;<span id="timer_countdown"></span></span><span class="claim_test" >Claim Now</span></button></button>
                            </div>
                             <div class="col-md-5">
                                 <button type="button" class="btn theme-btn-2 not_this_time">Not this time</button></button>
                            </div>
                        </div>
                    </div>
                </div>       
            
	       <br>
	            <h4 class="px-2">Eligible Packages</h4>
	            <div class="row">
	                <?php foreach($eligible_categories as $c) { ?>
	                <div class="col-md-6 col-lg-4 pt-0 mt-0 text-center">
	                    <!-- <div class="select_link"> -->
	                      <div class="hover-overlay">                                       
	                        <img class="img-fluid w-100" src="<?php echo base_url();?>/uploads/category/<?= $c['category_image'] ?>">
                            <div class="featured-text">
                            <span>25% off</span>
                        </div> 
	                        <div class="theme-listing-info pt-2 pb-4">
	                            <h6 class="theme-listing-name mb-3" style="font-size: 0.98rem;"><?= $c['category_name'] ?></h6>
	                            <a href="javascript:void(0)" onclick="submitForm('<?= $c['id'] ?>')" class="py-1 px-4" style="font-size:15px;">Select</a>
	                      </div>                                
	                    </div>
	                  <!-- </div> -->
	                </div>
	                <?php } ?>
	        </div>
	    
	    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter">
  <div class="modal-dialog modal-dialog-centered cart-continue"   role="document">
    <div class="modal-content">
      <div class="modal-body">
    <div class="row">
      <div class="col-md-5">
        <div class="modal-image-Iprodects" style="width: 100%;">
              <img src="assets/images/prodect1.png" id="expand_img" style="width: 100%;    border-radius: 10px;">
              <!--<ul  class="thumb-img">
                  <li><a href="#"><img src="assets/images/prodect1.png"></a></li>
                  <li><a href="#"><img src="assets/images/prodect1.png"></a></li>
                  <li><a href="#"><img src="assets/images/prodect1.png"></a>
                    <img src="assets/images/icon.png" class="icon-images">
                </li>
              </ul>-->
          </div>
      </div>
      <div class="col-md-7">
         <div class="Inner-Model_info" style="width: 100%;">
              <h4 id="expand_name">Lemon Dream Hand Sanitizer</h4>
              <h6 id="expand_price"><span>was : <span style="text-decoration: line-through;">$55.99</span></span>
                $49.99</h6>
                <p id="expand_discount">You Save : $7.00 (14%)</p>
                <div class="input-group mw115 ">
                    <span class="input-group-btn ">
                        <button type="button" class="quantity-expand-minus expand_data btn btn-danger btn-number">
                         <i class="fa fa-minus"></i>
                        </button>
                    </span>
                    
                    <input type="text"  data-qty="1" class="quantity input_qty expand_qty  input-number" value="0" min="1" max="100" readonly="" style="height:45px!important;">
                    
                    <span class="input-group-btn">
                        <button type="button" class="quantity-expand-plus expand_data btn btn-success btn-number">
                            <i class="fa fa-plus"></i>
                        </button>
                    </span>
                </div>
                <h5>Description</h5>
                <p class="model-info-decrptions">ssdfsdf sdfs df sd f sf s d</p>
                   
                        <div class="faq-block card-body">
                                        <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                        
                                            <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
                                              <h5 class="product_panel_heading">Ingredient list goes here</h5>
                                            </div>
                                        
                                            <div id="collapse1" class="panel-collapse collapse">
                                                <div class="card-body">
                                                  <p>65% Ethanol Alcohol, Aqua (Water), Aloe barbadensis Leaf Juice, Methyl Gluceth-10, Parfum (Fragrance), Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Limonene, Linalool, Tromethamine, Potassium Sorbate, Sodium Benzoate.</p>
                                                </div>
                                            </div>
                                            <HR>
                                            <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
                                              <h5 class="product_panel_heading">How to Use</h5>
                                            </div>
                                        
                                            <div id="collapse2" class="panel-collapse collapse">
                                                <div class="card-body">
                                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida ut volutpat pellentesque ipsum libero. Vel neque egestas lorem mattis congue. Mi tempor posuere consequat, lacus sagittis est. Morbi integer praesent volutpat tortor, quam ipsum pellentesque massa.
Dui lobortis mi dolor sit magna tincidunt non. Hendrerit ac adipiscing tristique platea mattis nunc, sollicitudin non sit. Facilisis nibh neque diam vel. Enim et donec fringilla sit enim fermentum. Nulla lorem orci turpis cras. Tortor aliquam et at odio interdum ipsum vestibulum ut a. Viverra libero iaculis sed consectetur. Tincidunt metus consectetur egestas arcu nec amet sed non. Faucibus egestas leo ut nibh nulla pretium habitant elementum. Ultrices non faucibus aenean sem pretium. In nullam ipsum sit aliquet augue sit. Amet nulla interdum ultrices nisi habitasse condimentum urna. Vestibulum tempor egestas placerat non in congue.</p>
                                                </div>
                                            </div>
                                            <HR>


                                        </div>
                                        </div>
                            </div>
                   
                    <a href="#" class="models-btnsss modal_add_to_cart" style="position: inherit;line-height: 100px;">Add to Cart</a>
                    
          </div>
      </div>
    </div>
          
         
         
  
      </div>
    </div>
  </div>
</div>

<?php include(APPPATH."Views/__partial/__footer.php");?>  

<script>
$('.expandLink').click(function() {
    var id = $(this).attr('data-id');
    getprodcutByid(id);
});
function getprodcutByid(id){
    $.ajax({
        type: "post",
        url: "<?= base_url('/ajax/product_detail') ?>",
        data: "id="+id,
        dataType: "json",
        success: function (response) {
            var save=response.was_price-response.sale_price;
            
            if(save>0)
            var perc= save/response.was_price; 
            else
            var perc=0;
            
            var percentage = perc*100;
            var profite_perce=percentage.toFixed(2);
            
            var discount=response.was_price-response.sale_price;
            
            $('#expand_name').text(response.product_name);
            $('#expand_img').attr('src','<?= base_url() ?>/../uploads/'+response.product_image);
            $('#expand_price').html('<span>was :<span style="text-decoration: line-through;">$'+response.was_price+'</span></span>$'+response.sale_price);
            $('#expand_discount').text('You Save : $'+discount+' ('+profite_perce+'%)');
            $('.model-info-decrptions').text(response.description);
            $('.expand_data').attr('data-id',response.id);
            $('.expand_qty').attr('data-id',response.id);
            $('.expand_qty').attr('id','exp_quantity_'+response.id);
            $('#exp_quantity_'+response.id).val($("#quantity_"+response.id).val());
        }
    });
}
function submitForm(id) {
	$('#discount_category').val(id);
	$('#frm_cart').submit();
}
$(document).ready(function(){
    getprodcutByid(<?php echo $modal_product_id;?>);
    <?php if($product_id!=""){?>
    $("#exampleModalCenter").modal("show");
    <?php } ?>
    $(".not_this_time, .modal_add_to_cart").click(function(e){
        e.preventDefault();
        directSubmit();
    });
});
function directSubmit() {
    $('#frm_cart').submit();
}

$(".quantity-left-minus").click(function(e){

	var id= $(this).attr("data-id");
	var qty=0;
	qty=parseInt($("#quantity_"+id).val());

	var discount=0;
	discount=parseInt($("#discount_"+id).attr("discount-qty"));
    
	
	if(qty>=1) qty--;
		$("#quantity_"+id).val(qty);
	
	var dis_qty=0;
	if(qty>=0){ 
	    dis_qty=discount-qty
	    if(dis_qty<=0){
	        dis_qty=0;
	    }
	    if(dis_qty==10){
	        dis_qty="X";
	    }
		$("#discount_"+id).text(dis_qty);
	}

	
});

$(".quantity-right-plus").click(function(e){
	
	var id= $(this).attr("data-id");
	var qty=0;
	qty=parseInt($("#quantity_"+id).val());
	
	if(qty<=98) qty++;
		$("#quantity_"+id).val(qty);

	var discount=0;
	discount=parseInt($("#discount_"+id).attr("discount-qty"));
    var dis_qty=0;
	if(discount>=1)
	    dis_qty=discount-qty
	    if(dis_qty<=0){
	        dis_qty=0;
	    }
	    if(dis_qty==10){
	        dis_qty="X";
	    }
		$("#discount_"+id).text(dis_qty);
	
});

$(".quantity-expand-minus").click(function(e){

    var id= $(this).attr("data-id");
    var qty=0;
    qty=parseInt($("#exp_quantity_"+id).val());
    
    if(qty>=1) qty--;
        $("#exp_quantity_"+id).val(qty);
        $("#quantity_"+id).val(qty);
    
});

$(".quantity-expand-plus").click(function(e){
    
    var id= $(this).attr("data-id");
    var qty=0;
    qty=parseInt($("#exp_quantity_"+id).val());
    
    if(qty<=98) qty++;
        $("#exp_quantity_"+id).val(qty);
        $("#quantity_"+id).val(qty);
});


// Set the date we're counting down to
var now = new Date();
now.setMinutes(now.getMinutes() + 15); // timestamp
countDownDate = new Date(now); // Date object
 

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("timer_countdown").innerHTML =   minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
