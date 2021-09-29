<?php include(APPPATH."Views/__partial/__header.php"); ?> 

         
                    
<section class="page_header banner-inner main_resi">
    <div class="container">
        <div class="banner-descrptions2" style="text-align: center;color: #fff;padding: 8% 0px;margin: 0px;">
             <h1>Fulfill your dreams.
             <br> Become part of our family.</h1>
             <p>Grow every day and be better than yesterday with us!</p>
        </div>
    </div>
</section>
<section class="About-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-info">
                    <p>Our #1 focus at CDN Citrus Clean is people. With the right people, the sky is the limit with ANY endeavor. Our goal is to develop people into the best versions themselves. So, no matter the department you’re in, you will receive the guidance you need in order to blossom into the person you want to be. Read our About page to learn more about who we are.</p>
                    <p>To apply for a position, fill out the form below. If you have any further questions, feel free get in touch with us, and we’ll gladly help you out! </p>


        <?php 
            if(isset($session->errormsg)){ ?>
              <div class="alert alert-danger">
                <strong><?php echo $session->errormsg;?></strong>
              </div>
            <?php 
        } ?>
        <?php 
            if(isset($session->successmsg)){ ?>
              <div class="alert alert-success">
                <strong><?php echo $session->successmsg;?></strong>
                <?php echo validation_errors(); ?>  
              </div>
            <?php 
        } ?>
        
                    <h2 class="heading-inner-main" style="text-align: left;">Job App Form</h2>
                    
                <!--<form action="<?php echo base_url();?>/contacts/sendContact" method="post" role="form" class="php-email-form was-validated">-->
                <form method="post" action="<?php echo base_url("/careers/createjobs")?>" enctype="multipart/form-data" class="php-email-form was-validated">
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="fname">FIRST NAME</label>
                        <input type="text" class="form-control" id="fname" name="first_name" required>
                      </div>
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="lname">LAST NAME</label>
                        <input type="text" class="form-control" id="lname" name="last_name">
                      </div>
                      <div class="form-group col-md-6 col-sm-6 col-xs-12" required>
                              <label>DEPARTMENT </label><br>
                              
                              <input type="checkbox" name="department[]" id="department" value="Sales">
                              <label for="Sales"> Sales</label><br>
                              
                              <input type="checkbox" name="department[]" id="list1" value="Tech">
                              <label for="Tech"> Tech</label><br>
                              
                              <input type="checkbox" name="department[]" id="list2" value="Marketing">
                              <label for="Marketing"> Marketing</label><br>
                              
                              <input type="checkbox" name="department[]" id="list3" value="Media">
                              <label for="Media">Media</label><br><br>
                      </div>
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="emaill">EMAIL</label>
                        <input type="email" class="form-control" id="emaill" name="email" required>
                      </div>
                      
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="pnumber">PHONE NUMBER</label>
                        <input type="text" class="form-control" id="pnumber" name="phones" required>
                      </div>
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="cv">RESUME/CV </label>
                        <!--<input type="file" class="form-control" id="cv" name="resume">-->
                        <input class="form-control" id="icon1" onchange="preview(this,'#resume');" name="resume" type="file">
                      </div>
                       <div id="resume">
                        </div>
                       <!--<div style="margin-top:10px;" class="form-group g-recaptcha" data-sitekey="6LctGkobAAAAAJ4owH_7pcQ5s-6FIqAtuVCIjnYN"></div>-->
                       <div style="margin-top:10px;" class="form-group g-recaptcha" data-sitekey="6LctGkobAAAAAJ4owH_7pcQ5s-6FIqAtuVCIjnYN"></div>
                      <input type="submit" value="submit" name="submit" class="btn btn-theme" />
                      
                    </form>
                 </div>
            </div>
        </div>
    </div>
</section>
<style>
    ol li {
        padding-left: 5px;
    }
    ol{
        padding-left: 19px;
    }
</style>
<script>
    
    $('form').on('submit', function(e) {
  if(grecaptcha.getResponse() == "") {
    e.preventDefault();
    alert("You can't proceed!");
  } else {
    //alert("Thank you");
  }
});
    

</script>