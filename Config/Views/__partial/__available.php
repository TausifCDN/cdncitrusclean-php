<!--Available Att-->
    <section class="available_inners" style="padding-top:25px;padding-bottom:25px;" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="heading-inner-main">Find Us In: </h2>
                </div>
            </div>
            
             <div class="col-12 col-lg-12 col-md-12">
                   <div class="owl-carousel owl-theme" id="carousal-clients">
                
                <?php
                foreach($findusData as $findus){
                    ?>
                    <div class="text-center item my_box" >
                        <div class="inner-available-image width-100">
                            <img src="<?php echo base_url().'/uploads/logo/'.$findus['logo'];?>" class="img-fluid clients-logo">
                        </div> 
                    </div>
                    <?php 
                }?>
                
                <!--<div class="text-center item my_box" >
                    <div class="inner-available-image width-100">
                        <img src="<?php echo base_url();?>/assets/images/Alberta Grocery.png" class="img-fluid clients-logo">
                    </div> 
                </div>
                 <div class="text-center item my_box" >
                    <div class="inner-available-image width-100">
                        <img src="<?php echo base_url();?>/assets/images/Associated Grocers Logo.png" class="img-fluid clients-logo">
                    </div> 
                </div>
                 <div class="text-center item my_box" >
                    <div class="inner-available-image width-100">
                        <img src="<?php echo base_url();?>/assets/images/CalMedi.png" class="img-fluid clients-logo">
                    </div> 
                </div>
                 <div class="text-center item my_box" >
                    <div class="inner-available-image width-100">
                        <img src="<?php echo base_url();?>/assets/images/CO-OP.jpg" class="img-fluid clients-logo">
                    </div> 
                </div>
                 <div class="text-center item my_box" >
                    <div class="inner-available-image width-100">
                        <img src="<?php echo base_url();?>/assets/images/Nutters.png" class="img-fluid clients-logo">
                    </div> 
                </div>
                 <div class="text-center item my_box" >
                    <div class="inner-available-image width-100">
                        <img src="<?php echo base_url();?>/assets/images/Pharmasave.png" class="img-fluid clients-logo">
                    </div> 
                </div>
                <div class="text-center item my_box" >
                    <div class="inner-available-image width-100">
                        <img src="<?php echo base_url();?>/assets/images/Sunterra Market.png" class="img-fluid clients-logo">
                    </div> 
                </div>
                <div class="text-center item my_box" >
                    <div class="inner-available-image width-100">
                        <img src="<?php echo base_url();?>/assets/images/Westview CO-OP.jpg" class="img-fluid clients-logo">
                    </div> 
                </div>
                <div class="text-center item my_box" >
                    <div class="inner-available-image width-100">
                        <img src="<?php echo base_url();?>/assets/images/MrCheckoutLogo.jpg" class="img-fluid clients-logo">
                    </div> 
                </div>-->

               
               
            </div>
        </div>
        </div>
    </section>