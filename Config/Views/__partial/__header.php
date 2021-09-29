<?php                          
helper('fun');
$cart=get_cart();
$session = service('session');
?>
<!DOCTYPE html5>
<html>
    <head>
        <title>Citrus</title>
        <link rel="icon" href="<?php echo base_url();?>/assets/images/favicon.png" type="image/gif" sizes="16x16">
         
        <?php include(APPPATH."Views/__partial/__css.php"); ?>
        
   
         <!--media queries-->
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
        <script type="text/javascript">
        var _iub = _iub || [];
        _iub.csConfiguration = {"countryDetection":true,"floatingPreferencesButtonIcon":true,"floatingPreferencesButtonHover":true,"consentOnHorizontalScroll":true,"consentOnDocument":true,"lang":"en","siteId":2280606,"rebuildIframe":false,"cookiePolicyId":21254312,"cookiePolicyUrl":"https://cdncitrusclean.com/privacypolicy", "banner":{
         "acceptButtonDisplay":true,"customizeButtonDisplay":true,"acceptButtonColor":"#ffffff","acceptButtonCaptionColor":"#055839","customizeButtonColor":"rgba(4.83, 88.59, 57.3, 0)","customizeButtonCaptionColor":"#ffffff","position":"bottom","backgroundOverlay":true,"textColor":"white","backgroundColor":"#055839","fontSizeCloseButton":"28px" }};
        </script>
        
    </head>
    <body>
       <!--header start-->
    <div class="header-top">
        <div class="container">
            <p>GET 5% EXCLUSIVE DISCOUNT</p>
        </div>
    </div>

         <!-- ======= Header ======= -->
        <header id="header" class="header">
            <div class="container">
               
                  <?php if($homeData->logo){ ?>
                  <a class="" href="<?= base_url() ?>"><img src="<?php echo base_url();?>/uploads/logo/<?php echo $homeData->logo;?>" class="img-fluid" style="width: 107px;"></a>
                  <?php  }else{ ?>
                  <a class="" href="<?= base_url() ?>"><img src="<?php echo base_url();?>/assets/images/svg_logo.svg" class="img-fluid" style="width: 107px;"></a>
                  <?php } ?>

               <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                 $color = $actual_link;
                //  print_r($color);
               ?>
                <nav class="nav-menu float-right d-none d-lg-block">                  
                    <ul id="myMenu">  
                    
                    <li>
                                <div class="btn-group" style="margin-top: -10px;">
                                  <button style="width: 90px;" type="button" class="btn"><a style="<?php if($color=="https://sunstonedigitaltech.com/cdncc/frontend/"){ echo "color:#f4931b";} ?>" href="<?= base_url()?>/#section1">Products</a></button>
                                  <button style="width: 45px;" type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= base_url() ?>/Products?id=2" product-id="2">Shop Residential</a>
                                    <a class="dropdown-item" href="<?= base_url() ?>/Products?id=1" product-id="1">Shop Commercial</a>
                                    <a class="dropdown-item" href="<?= base_url() ?>/Products?id=3" product-id="3">Shop Industrial</a>
                                  </div>
                                </div>
                                
                           </li>
                          <li> <a style="<?php if($color=="https://sunstonedigitaltech.com/cdncc/frontend/home/cleaning"){ echo "color:#f4931b";} ?>" class="nav-link" href="<?= base_url() ?>/home/cleaning"> Cleaning Services</a></li>
                        
                        <li> <a style="<?php if($color=="https://sunstonedigitaltech.com/cdncc/frontend/careers"){ echo "color:#f4931b";} ?>" class="nav-link" href="<?= base_url() ?>/careers"> Careers</a></li>
                        <li><a style="<?php if($color=="https://sunstonedigitaltech.com/cdncc/frontend/Contacts"){ echo "color:#f4931b";} ?>" class="nav-link " href="<?= base_url() ?>/Contacts">Contact Us</a></li>
                        <li> <a style="<?php if($color=="https://sunstonedigitaltech.com/cdncc/frontend/about"){ echo "color:#f4931b";} ?>" class="nav-link" href="<?= base_url() ?>/about">About Us</a></li>
                        <!--<li> <a class="nav-link" href="<?= base_url() ?>/invest">Invest</a></li>-->
                        <!--</ul>-->
                        
                        <script type="text/javascript">
                // 			$(document).ready(function () {
                // 				$("#myMenu > li > a").click(
                // 				function (e) {
                // 					$("#myMenu > li").removeClass(
                // 					"active");
                // 					$("#myMenu > li > a").css(
                // 					"color", "");
                
                // 					$(this).addClass("active");
                // 					$(this).css("color", "#ff8d00");
                // 				});
                // 			});
                		</script>

                        <!--<ul>-->
                        <li class="nav-icons">
                            <a class="nav-link" href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target="#searchModal"><i class="fa fa-search head_fonticon" aria-hidden="true"></i></a>
                        </li>
                        <?php if(!empty($cart)) { ?>
                            <li class="nav-icons cart_menu">
                                <div class="dropdown" style="padding: 20px;position: relative;top: 2px;">
                                    
                                    <button type="button" data-toggle="dropdown" style="background: transparent;">
                                        <i class="fa fa-shopping-cart head_fonticon" aria-hidden="true"></i> 
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="row total-header-section">
                                              <h3>You have <?= count($cart); ?> items in the cart</h3>
                                        </div>
                                        <?php
                                             
                                                foreach($cart as $c) { 
                                                    ?>
                                                    <div class="row cart-detail">
                                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                            <img src="<?= base_url() ?>/../uploads/<?= $c['product_image'] ?>">
                                                        </div>
                                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                            <h4><?= $c['product_name'] ?> $<?= $c['sale_price'] ?></h4>
                                                            <div class="input-group mw115 ">
                                                                <span class="input-group-btn ">
                                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                </span>
                                                                <input type="text" id="quantity" data-qty="1" name="quantity_16" class="quantity_16 form-control input-number" value="<?= $c['qty'] ?>" min="1" max="100" readonly="">
                                                                <span class="input-group-btn">
                                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number">
                                                                            <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <!-- <a href="#" style="padding: 9px 22px!important;
                                                            color: white !important;">5% off</a> -->
                                                        </div>
                                                    </div>
                                                    <?php 
                                                } 
                                             ?>
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                <button href="<?= base_url() ?>/payment" class="btn-cartt  btn-block">Proceed to Checkout</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </li>
                        <?php }else{ ?>
                            <li class="nav-icons">
                                <a class="nav-link" href="<?php echo base_url();?>/home/cart"><i class="fa fa-shopping-cart head_fonticon" aria-hidden="true"></i></a>
                            </li>
                        <?php } ?>
                        <li class="nav-icons">
                            <?php if(isset($_SESSION['user_id'])) { ?>
                                <!--<a class="nav-link" href="<?= base_url() ?>/user/profile"><img src="<?php echo base_url();?>/assets/images/login.png"></a>-->
                            <?php } else { ?>
                                <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#login"><i class="fa fa-user head_fonticon" aria-hidden="true"></i></a>
                            <?php } ?>
                        </li>
                        <?php if(isset($_SESSION['user_id'])) { ?>
                            <li class="dropdown">
                                <a class="btn-link dropdown-toggle account_menu" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hello <?= $_SESSION['user_name'] ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin-top: 10px;">
                                    <a class="dropdown-item text-dark" href="<?= base_url() ?>/user/profile">Profile</a>
                                    <a class="dropdown-item text-dark" href="<?= base_url() ?>/home/logout">Logout</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- .nav-menu -->
            </div>
        </header>
        <!-- End Header -->

    <!--header end-->
<script>
  $('.product_link').click(function(){   
    var id=$(this).attr("product-id");    
    window.location.href = "<?php echo base_url();?>/Products?id="+id;
 });
 $(document).ready(function(){
     var base_url="<?php echo base_url();?>";
     $('.btn-cartt').click(function(){ 
        window.location.href = "<?php echo base_url();?>/payments/checkout";
     });
 });
</script>

<script>
$(function() {
    $('a[href*=\\#]:not([href=\\#])').on('click', function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>