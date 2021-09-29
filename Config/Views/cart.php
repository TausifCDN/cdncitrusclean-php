<?php include(APPPATH."Views/__partial/__header.php"); ?> 

<section class="banner-inner main_resi">
    <div class="container">
        <div class="banner-descrptions2">
             <h1 style="text-align: center;color: #fff;padding: 8% 0px;font-size: 6vw;margin: 0px;">Your Cart</h1>
        </div>
    </div>
    <!--<div class="container">
        <div class="banner-descrptions2 mobiles-view">
             <h1>Cart></h1>
            <p>Description goes here, this is the section where the product description along with the importanat details would always appear</p>
                
        </div>
    </div>
    <div class="banner-pic2" style=" background: url(<?=base_url();?>/assets/images/re.png);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-descrptions2 desktop-view">
                     <h1>Cart</h1>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pharetra, diam mi eget arcu ut in malesuada lectus. Sem eget pharetra nec cras urna sagittis amet. Nisl nibh donec duis cras fusce faucibus massa non. Id fermentum fermentum volutpat in elementum, quis aliquet mattis. In nibh massa orci lectus aliquam.</p>
                   
                </div>
            </div>
            
        </div>
    </div>-->
</section>
<section class="cart">
    <div class="container">
        
        <div class="row">
            <br><br><br>
            <div class="col-md-12 " style="text-align: center;">
                <h2 style="margin-top: 6vw;">Oops! Your cart is empty. </h2>
                <div class=""><a href="<?php echo base_url();?>/products/all_products" class="btn btn-theme">Explore Products</a></div><br><br>
            </div>
        </div>
    </div>
</section>
<!--Best Sellers-->
<section class="Our-Sellers">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="heading-inner-main">Our Best Sellers</h2>
                <div class="icons-seller">
                   <a href="javascript:void(0)" class="next" data-id="owl3" id="carousel_previous"> <img src="<?php echo base_url();?>/assets/images/Vector.png"></a>
                    <a href="javascript:void(0)" class="next" data-id="owl3" id="carousel_next"> <img src="<?php echo base_url();?>/assets/images/Vector1.png"></a>
                </div>

            </div>
             <div class="owl-carousel owl-theme" id="carousel_category">
            <?php foreach($products as $p) { ?>
           <div class="text-center item my_box" >
            <div class="sell-prodects mx-2">
                <div class="seller-select_link">
                    <div class="seller-hover-overlay">
                    <div class="featured-text">
                        <span>Featured</span>
                    </div>                                     
                      <img class="img-fluid w-100"  src="<?php echo base_url();?>/../uploads/<?= $p['product_image'] ?>">
                      <div class="seller-theme-listing-info">
                          <h4><?= $p['product_name'] ?></h4>
                          <a href="<?=base_url()."/products?id=".$p['category_id']."&product_id=".$p['id'];?>" class="more-btns">Buy Now | $<?= $p['sale_price'] ?></a>
                          <br>
                          <a href="<?=base_url()."/products?id=".$p['category_id']."&product_id=".$p['id'];?>" class="learn-btn">Learn More </a>
                    </div>                              
                  </div>
                </div>
            </div>
        </div>
            <?php } ?>
        </div>
        </div>
    </div>
</section>

<?php include(APPPATH."Views/__partial/__footer.php");?>  
