<?php include(APPPATH."Views/__partial/__header.php"); ?> 
    <!--banner start-->
        <section class="banner-inner">
        <div class="container">
            <div class="banner-descrptions2 mobiles-view">
                <h6>Complete Product Range</h6>
                <p>Description goes here, this is the section where the product description along with the importanat details would always appear</p>                
            </div>
        </div>
        <div class="banner-pic2" style=" background: url(<?=base_url();?>/assets/images/re.png);">
            </div>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-descrptions2 desktop-view">
                     <h1>Complete Product Range</h1>
                     <p>Description goes here, this is the section where the product description along with the importanat details would always appear</p>
                   
                </div>
            </div>
            
        </div>
        </div>
    </section>
    <!--About us-->
<section class="About-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-info">
                    <h2 class="heading-inner-main" style="text-align: left;">All Products</h2>
                </div>
            </div>        
        </div>
        <div class="row form-group">
            <?php
            if($products){
                foreach($products as $product){
                    ?>
                    <div class="col-md-3 form-group">
                    <div class="">
                        <div class="seller-select_link">
                            <div class="seller-hover-overlay">
                              <img class="img-fluid w-100" src="<?=base_url()."/uploads/".$product['product_image'];?>">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h4 class="mb-2 mt-4"><?= $product['product_name'];?></h4>
                                          <a href="<?=base_url()."/products?id=".$product['category_id']."&product_id=".$product['id'];?>" class=""><button type="button" class="btn theme-btn-3 mb-2">Buy Now | $<?= $product['sale_price'];?></button></a>
                                          <br>
                                          <a href="<?=base_url()."/products?id=".$product['category_id']."&product_id=".$product['id'];?>" style="color:#A9A9A9">Learn More</a>
                                          <br> <br>
                                    </div>
                                </div>
                          </div>
                        </div>
                    </div>
                </div>
                    <?php
                }
            }
            ?>
              <!--<div class="col-md-3 form-group">
                <div class="">
                    <div class="seller-select_link">
                        <div class="seller-hover-overlay">
                          <img class="img-fluid w-100" src="<?=base_url();?>/assets/images/product1.png">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 class="mb-2 mt-4">Product 1</h4>
                                      <a href="#" class=""><button type="button" class="btn theme-btn-3 mb-2">Buy Now | $100</button></a>
                                      <br>
                                      <a href="#" style="color:#A9A9A9">Learn More</a>
                                      <br> <br>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
              <div class="col-md-3 form-group">
                <div class="">
                    <div class="seller-select_link">
                        <div class="seller-hover-overlay">
                          <img class="img-fluid w-100" src="<?=base_url();?>/assets/images/product1.png">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 class="mb-2 mt-4">Product 1</h4>
                                      <a href="#" class=""><button type="button" class="btn theme-btn-3 mb-2">Buy Now | $100</button></a>
                                      <br>
                                      <a href="#" style="color:#A9A9A9">Learn More</a>
                                      <br> <br>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
              <div class="col-md-3 form-group">
                <div class="">
                    <div class="seller-select_link">
                        <div class="seller-hover-overlay">
                          <img class="img-fluid w-100" src="<?=base_url();?>/assets/images/product1.png">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 class="mb-2 mt-4">Product 1</h4>
                                      <a href="#" class=""><button type="button" class="btn theme-btn-3 mb-2">Buy Now | $100</button></a>
                                      <br>
                                      <a href="#" style="color:#A9A9A9">Learn More</a>
                                      <br> <br>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
              <div class="col-md-3 form-group">
                <div class="">
                    <div class="seller-select_link">
                        <div class="seller-hover-overlay">
                          <img class="img-fluid w-100" src="<?=base_url();?>/assets/images/product1.png">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 class="mb-2 mt-4">Product 1</h4>
                                      <a href="#" class=""><button type="button" class="btn theme-btn-3 mb-2">Buy Now | $100</button></a>
                                      <br>
                                      <a href="#" style="color:#A9A9A9">Learn More</a>
                                      <br> <br>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
              <div class="col-md-3 form-group">
                <div class="">
                    <div class="seller-select_link">
                        <div class="seller-hover-overlay">
                          <img class="img-fluid w-100" src="<?=base_url();?>/assets/images/product1.png">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 class="mb-2 mt-4">Product 1</h4>
                                      <a href="#" class=""><button type="button" class="btn theme-btn-3 mb-2">Buy Now | $100</button></a>
                                      <br>
                                      <a href="#" style="color:#A9A9A9">Learn More</a>
                                      <br> <br>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
              <div class="col-md-3 form-group">
                <div class="">
                    <div class="seller-select_link">
                        <div class="seller-hover-overlay">
                          <img class="img-fluid w-100" src="<?=base_url();?>/assets/images/product1.png">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 class="mb-2 mt-4">Product 1</h4>
                                      <a href="#" class=""><button type="button" class="btn theme-btn-3 mb-2">Buy Now | $100</button></a>
                                      <br>
                                      <a href="#" style="color:#A9A9A9">Learn More</a>
                                      <br> <br>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
              <div class="col-md-3 form-group">
                <div class="">
                    <div class="seller-select_link">
                        <div class="seller-hover-overlay">
                          <img class="img-fluid w-100" src="<?=base_url();?>/assets/images/product1.png">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 class="mb-2 mt-4">Product 1</h4>
                                      <a href="#" class=""><button type="button" class="btn theme-btn-3 mb-2">Buy Now | $100</button></a>
                                      <br>
                                      <a href="#" style="color:#A9A9A9">Learn More</a>
                                      <br> <br>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</section>
<?php include(APPPATH."Views/__partial/__available.php"); ?> 
<?php include(APPPATH."Views/__partial/__testimonial.php"); ?> 
<?php include(APPPATH."Views/__partial/__footer.php"); ?> 