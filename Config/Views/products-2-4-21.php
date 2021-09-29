<?php include(APPPATH."Views/__partial/__header.php"); ?> 

<section class="banner-inner main_resi">
        <div class="container">
            <div class="banner-descrptions2 mobiles-view">
                 <h1><?= $categories['category_name'] ?></h1>
                    <p>Description goes here, this is the section where the product description along with the importanat details would always appear</p>
                    <div class="btnsss_inner">
                        <a href="#">View All Prooducts</a>
                      </div>
            </div>
            </div>
            <div class="banner-pic2" style=" background: url(<?= base_url(); ?>/../uploads/<?= $categories['banner_image'] ?>);">
            </div>
            <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-descrptions2 desktop-view">
                    <h1><?= $categories['category_name'] ?></h1>
                    <p>Description goes here, this is the section where the product description along with the importanat details would always appear</p>
                    <div class="btnsss_inner">
                        <a href="#">View All Prooducts</a>
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
                    <h2><?php if(!empty($main_category)) { ?><img src="<?= base_url() ?>/assets/images/tic.png" height="20px"> <?= $main_category['category_name'] ?> -> <?php } ?><?= $categories['category_name'] ?></h2>
                </div>
            </div>
        </div>
    </section>
    <!--prodects-->
    <section class="Our_prodects">
        <div class="container">
		<form name="frm_cart" id="frm_cart" action="<?=base_url()?>/payments/add_cart" method="post">
		
            <div class="row">
                <h3>Product Range</h3>
                <?php $count=0;
				foreach ($products as $p) { 
				$count++;
				?>
                <div class="inner-main-prrrrrt mb-5">
                    <div class="Inerr_prodect_items">
                        <img src="<?= base_url() ?>/../uploads/<?= $p['product_image'] ?>" class="img-fluid w-100">
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
                            <?php 
                            // if(!empty($p['qty'])) {$cart_qty=$p['qty'];} else {$cart_qty="0";} ?>
                            <input type="text" id="quantity_<?=$p["id"]?>" data-id="<?=$p["id"]?>" data-qty="1" name="quantity_<?=$count?>" class="quantity input_qty  input-number" value="0" min="1" max="100" readonly="">
							<input type="hidden" id="product_id_<?=$p["id"]?>" name="product_id_<?=$count?>" value="<?=$p["id"]?>">
							<input type="hidden" id="category_id_<?=$p["id"]?>" name="category_id_<?=$count?>" value="<?=$p["category_id"]?>">							

                            
                            
                            <span class="input-group-btn">
                                <button type="button" data-id="<?=$p["id"]?>" class="quantity-right-plus btn btn-success btn-number">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                            <?php if(!empty($main_category)) { ?>
                                <span class="my-3 mx-5 btn-pill-custom">25% off</span>
                            <?php } ?>
                        </div>
                        <?php if(!empty($main_category)) { ?>
                        <?php } else { ?>
                        <p>Buy <span id="discount_<?= $p['id'] ?>" style="font-size:20px;color:white;"><?= $p['on_qty_discount'] ?></span> more items and get an exclusive 20% discount on the purchase</p>
                    <?php } ?>
                    </div>
                    <div class="prodect_range_items">
                        <h6><span>was : <span style="text-decoration: line-through;">$<?= $p['was_price'] ?></span></span>
                        $<?= $p['sale_price'] ?></h6>
                        <?php $save=$p['was_price']-$p['sale_price'];
                    
                        if($save>0)
                            $perc= $save/$p['was_price']; 
                        else
                            $perc=0;
                        $profite_perce=round($perc*100,2);
                     ?>
                        <p>You Save : $<?= $p['was_price']-$p['sale_price'] ?> (<?= $profite_perce ?>%)</p>
                    </div>
                    <div class="sprater"></div>
                    
                </div>
                </div>
				<input type="hidden" id="item_count" name="item_count" value="<?=$count?>" >							
            <?php } ?>
            <?php if(!empty($main_category)) { ?>
                <input type="hidden" name="discount_25" value="25">
            <?php } ?>
            	<input type="hidden" id="discount_category" name="discount_category">
                <div class="btn-redcial"> 
                    <?php if(empty($main_category)) { ?>
                       <a href="javascript_void()" data-target="#discount_modal" data-toggle="modal">Proceed to Checkout</a>
                    <?php } else { ?>
                       <a><button type="submit" class="border-0 bg-transparent">Proceed to Checkout</button></a>
                    <?php } ?>
                   <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="btn-inners">Add to Cart & Continue Shopping</a>
                    </div>
					
				</form>
					
            </div>
     
        </div>
    </section>
    <!--available-->
     <?php include(APPPATH."Views/__partial/__available.php");?> 
    <!--testmonials-->
    <section class="Our-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="heading-inner-main">Trusted by People &amp; Companies</h2>
                </div>
            </div>
        </div>
    </section>

<div class="modal fade" id="discount_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	    <div class="modal-body">
            <div class="row">
          <div class="col-md-1">
          <!-- <img src="<?php echo base_url();?>/assets/images/claim-icon.png" style="width:45px;"> -->
          </div>
          <div class="col-md-11">
            <p>Claim a 20% off discount in a bundled offer with this package, the deal expires in 15 minutes</p><br>
            <p class="text-center" style="display: block">
            <a href=""><span class="claim-countdown"><i class="icofont-wall-clock"></i><span class="claim-text">Claim Now</span></span></a>&nbsp;&nbsp;&nbsp;
            <a href="javascript:void(0)" onclick="directSubmit()"><span class="btn bg-transparent border">Not this time</span></a>
          </p>
         
          </div>
          </div>
	      
	            <h4 class="px-2">Eligible Packages</h4>
	            <div class="row">
	                <?php foreach($eligible_categories as $c) { ?>
	                <div class="col-md-6 col-lg-4 pt-0 mt-0 text-center">
	                    <!-- <div class="select_link"> -->
	                      <div class="hover-overlay">                                       
	                        <img class="img-fluid w-100" src="<?php echo base_url();?>/../uploads/<?= $c['category_image'] ?>">
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
  <div class="modal-dialog modal-dialog-centered" style="max-width: 90%;" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <div class="main-model-inner">
          <div class="modal-image-Iprodects">
              <img src="images/prodect1.png" id="expand_img">
              <ul>
                  <li><a href="#"><img src="images/prodect1.png"></a></li>
                  <li><a href="#"><img src="images/prodect1.png"></a></li>
                  <li><a href="#"><img src="images/prodect1.png"></a>
                <img src="images/icon.png" class="icon-images">
                </li>
              </ul>
          </div>
          <div class="Inner-Model_info">
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
                <p class="model-info-decrptions"></p>
                    <div class="card">
                        <div class="faq-block card-body">
                            <div id="accordion-1" class="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                         <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                            Ingredient list goes here</a>
                                         </h5>
                                        </div>
                                          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion-1" style="">
                                             <div class="card-body">
                                              <p>65% Ethanol Alcohol, Aqua (Water), Aloe barbadensis Leaf Juice, Methyl Gluceth-10, Parfum (Fragrance), Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Limonene, Linalool, Tromethamine, Potassium Sorbate, Sodium Benzoate.</p>
                                                 <h6>How to Use</h6>
                                                 </div>
                                             </div>
                                            </div>
                                     </div>
                            </div>
                    </div>
                    <a href="#" class="models-btnsss">Add to Cart</a>
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
            }
        });
});

function submitForm(id) {
	$('#discount_category').val(id);
	$('#frm_cart').submit();
}

function directSubmit() {
    $('#frm_cart').submit();
}

$(".quantity-left-minus").click(function(e){

	var id= $(this).attr("data-id");
	var qty=0;
	qty=parseInt($("#quantity_"+id).val());

	var discount=0;
	discount=parseInt($("#discount_"+id).text());

	if(qty>=1) discount++;
		$("#discount_"+id).text(discount);
	
	if(qty>=1) qty--;
		$("#quantity_"+id).val(qty);

	
});

$(".quantity-right-plus").click(function(e){
	
	var id= $(this).attr("data-id");
	var qty=0;
	qty=parseInt($("#quantity_"+id).val());
	
	if(qty<=98) qty++;
		$("#quantity_"+id).val(qty);

	var discount=0;
	discount=parseInt($("#discount_"+id).text());

	if(discount>=1) discount--;
		$("#discount_"+id).text(discount);
	
});

$(".quantity-expand-minus").click(function(e){

    var id= $(this).attr("data-id");
    var qty=0;
    qty=parseInt($("#exp_quantity_"+id).val());
    
    if(qty>=1) qty--;
        $("#exp_quantity_"+id).val(qty);

    
});

$(".quantity-expand-plus").click(function(e){
    
    var id= $(this).attr("data-id");
    var qty=0;
    qty=parseInt($("#exp_quantity_"+id).val());
    
    if(qty<=98) qty++;
        $("#exp_quantity_"+id).val(qty);
    
});
</script>
