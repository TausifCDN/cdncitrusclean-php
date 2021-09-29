<?php include(APPPATH."Views/__partial/__header.php"); ?> 
<!--banner start-->

    <!--<section class="banner-inner">
		<div class="container">
			<div class="banner-descrptions mobiles-view">
				<h6>Hand Sanitizer</h6>
				<h1>The Force of Nature<br>
				inside a bottle</h1>
				<p>Description goes here, this is the section where the product description along with the importanat details would always appear</p>
				<div class="btnsss_inner">
				<a href="<?php echo base_url();?>/products/all_products">Buy Now</a>
				<a href="<?php echo base_url();?>/All_products" class="btn-prmry">Learn More</a>
				</div>
			</div>
		</div>
    	<div class="banner-pic" style=" background: url(<?=base_url();?>/assets/images/bg.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-descrptions desktop-view">
                        <h6>Hand Sanitizer</h6>
                        <h1>The Force of Nature<br>
                            inside a bottle</h1>
                        <p>Description goes here, this is the section where the product description along with the importanat details would always appear</p>
                        <div class="btnsss_inner">
                            <a href="<?php echo base_url();?>/products/all_products">Buy Now</a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#pdf_modal"  class="btn-prmry">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <section class="banner-inner">
        <div class="container" id="medi">
            <div class="banner-descrptions2 mobiles-view">
                <h6>Be a Hero<br> in your home!</h6>
                <p>Keep your family safe, happy, and healthy with our biodegradable citrus-based cleaners!</p>  
                <div class="btnsss_inner">
                    <a href="<?php echo base_url();?>/products/all_products">Buy Now</a>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#pdf_modal"  class="btn-prmry">Learn More</a>
                </div>
                
            </div>
        </div>
        <!--<div class="banner-pic2" style=" background: url(<?=base_url();?>/assets/images/citrus-clean.jpg);"></div>-->
        <div class="banner-pic2" style=" background: url(<?=base_url();?>/assets/images/<?php echo $homeData->banner_image;?>);"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-descrptions2 desktop-view">
                         <h1><?php echo $homeData->banner_title;?></h1>
                         <p> <?php echo $homeData->banner_desc;?></p>
                         <div class="btnsss_inner">
                            <a href="<?php echo base_url();?>/products/all_products">Buy Now</a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#pdf_modal"  class="btn-prmry">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    


<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_toptext">
                    <!--<h2 class="heading-inner-main" style="text-align: left;">Our Story</h2>-->
                    <?php echo $homeData->page_desc;?>
                 </div>
            </div>
            
            <!-- <div class="col-md-12">-->
            <!--        <h2 class="heading-inner-main" style="text-align: left;">PRODUCT RANGES</h2>-->
                
            <!--</div>-->
            
         </div>
      </div>        
    
    <?php include(APPPATH."Views/__partial/__available.php");?> 

    <!--Best Sellers-->
    <section class="Our-Sellers">
        <div class="container">
            <div class="row" style="position:relative;">
                <div class="col-md-12 text-center">
                    <h2 class="heading-inner-main">Our Best Sellers</h2>
                    <div class="icons-seller">
                        <!--<a href="javascript:void(0)" class="next" data-id="owl3" id="carousel_previous"> <img src="<?php echo base_url();?>/assets/images/Vector.png"></a>
                        <a href="javascript:void(0)" class="next" data-id="owl3" id="carousel_next"> <img src="<?php echo base_url();?>/assets/images/Vector1.png"></a>-->
                        
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
                <a style="" href="javascript:void(0)" class="next cust_nav" data-id="owl3" id="carousel_previous" role="button"><i class="fa fa-angle-left circle_nav"></i></a>
                <a style="" href="javascript:void(0)" class="next cust_nav" data-id="owl3" id="carousel_next" role="button"><i class="fa fa-angle-right circle_nav"></i></a>
            </div>
        </div>
    </section>

    <?php include(APPPATH."Views/__partial/__testimonial.php");?> 
    <!--Our-Package-->
    <section class="Our-package" id="section1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="heading-inner-main">Select a category to get started</h2>
                </div>

                   <div class="col-12 col-lg-12 col-md-12">
                   <div class="owl-carousel owl-theme" id="carousel_packages">
                <?php foreach($categories as $c) { ?>

                <div class="text-center item my_box" >
                    <div class="select_link">
                      <div class="hover-overlay">                                       
                        <img class="img-fluid" src="<?php echo base_url();?>/uploads/category/<?= $c['category_image'] ?>" style="height: 250px;">
                        <div class="theme-listing-info">
                            <h3 class="theme-listing-name"><?=$c['category_name']?></h3>
                            <a href="<?php echo base_url()."/products?id=".$c['id'];?>">Select</a>
                      </div>                                
                    </div>
                  </div>
                </div>

                <!-- <div class="col-md-6 col-lg-4 text-center">
                    <div class="select_link">
                      <div class="hover-overlay">                                       
                        <img class="img-fluid w-100" style="height: 15rem" src="<?php echo base_url();?>/../uploads/<?= $c['category_image'] ?>">
                        <div class="theme-listing-info">
                            <h3 class="theme-listing-name"><?= $c['category_name'] ?></h3>
                            <a href="<?= base_url() ?>/products?id=<?= $c['id'] ?>">Select</a>
                      </div>                                
                    </div>
                  </div>
                </div> -->
                <?php } ?>
            </div>
        </div>
            </div>
        </div>
    </section>
    <!--<section style="width: 100%;float: left;background: #F6F6F6;padding: 40px 0px;">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-sm-7 mx-auto"> -->
    <!--            <div class="row">-->
    <!--            <div class="col-sm-6">-->
    <!--                <a href="<?php echo base_url();?>/delivery-policy" class="btn btn-green" style="width:100%;">Delivery Policy</a>-->
    <!--            </div>-->
    <!--            <div class="col-sm-6">-->
    <!--                <a href="<?php echo base_url();?>/return-policy" class="btn btn-green" style="width:100%;">Return Policy</a>-->
    <!--            </div>-->
    <!--            </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- Our Newsletter-->
    <section class="news_letter">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="text-white"><b>Take the Oath</b></h1>
                    <h2 class="heading-inner-main text-white" style="">Join our newsletter to receive your free PDF guide and a chance to win $1000 worth of free products!</h2>
                    <form method="GET" class="newsletter-form">
                        <input type="email" name="EMAIL" id="email" placeholder="Enter your email">
                        <button type="submit" class="button">Subscribe</button>
                      </form>
                </div>
            </div>
        </div>
    </section>
    <!--cdn-->
    <!--<section class="invest_cdn">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-12 text-center">-->
    <!--                <h2 class="heading-inner-main text-white">Invest in CDN Citrus Clean</h2>-->
    <!--                <p>At CDN Citrus Clean, we’re all about growth, harmony, and loyalty. We’re loyal to our staff, customers, and investors alike. Let’s start our relationship today! </p>-->
    <!--                <a href="#">Learn More about CDN Citrus Clean</a>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

              <!-- Modal -->
<!--<div class="modal fade" id="pdf_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center pt-2">
                        <h2 class="text-center font-weight-bold">Claim your FREE PDF</h2>
                    </div>
                        <form action="<?= base_url() ?>/home/pdf" method="post" role="form" class="mt-0 php-email-form" id="signinForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">First Name</label>
                                    <input type="text" name="first_name" class="form-control py-4" placeholder="First Name" required />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Last Name</label>
                                    <input type="text" name="last_name" class="form-control py-4" placeholder="Last Name" required />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" name="email" class="form-control py-4" placeholder="Enter your email" required />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div id="error_msg"></div>
                            <div class="text-center py-3"><button type="submit" class="btn btn-block custom-btn-color py-4">Claim Now</button></div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->











<?php include(APPPATH."Views/__partial/__footer.php");?>  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($session->msg)) { ?>
<script>
    swal("Success", "<?= $session->msg ?>", "success");
</script>
<?php } ?>
