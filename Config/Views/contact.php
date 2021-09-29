<?php include(APPPATH."Views/__partial/__header.php"); ?> 
    <!--banner start-->
        <section class="banner-inner">
        <div class="container">
            <div class="banner-descrptions2 mobiles-view">
                <h6>Contact Us</h6>
                <p>Have any concerns? Not sure what to use our products on? Just want to say hi? Get in touch with us below and we’ll get back to you as soon as possible!</p>                
            </div>
        </div>
        <div class="banner-pic2" style=" background: url(<?=base_url();?>/assets/images/Contectus.jpg);">
            </div>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-descrptions2 desktop-view">
                     <h1>Contact Us</h1>
                     <p>Have any concerns? Not sure what to use our products on? Just want to say hi? Get in touch with us below and we’ll get back to you as soon as possible!</p>
                   
                </div>
            </div>
            
        </div>
        </div>
    </section>
    <!--faq-->
    <section class="faq">
        <div class="container">
            <div class="row">
                <?php 
                    if(isset($session->contact_submit)){ ?>
                      <div class="alert alert-success">
                        <strong><?php echo $session->contact_submit;?></strong>
                      </div>
                    <?php 
                } ?>
                <div class="col-md-12">
                    <h2 class="heading-inner-main" style="text-align: left;">Frequently Asked Questions</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="panel-group" id="accordion">
                    <?php 
                    foreach ($faq as $key){ 
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapse<?= $key['id'] ?>">
                                <h4 class="panel-title main-color py-2" style="padding-right: 35px;"><?= $key['title'] ?></h4>
                        
                            </div>
                            <div id="collapse<?= $key['id'] ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class="faq_text"><?= $key['description'] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }?>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!--About us-->
    <section>
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php 
                    if(isset($session->contact_submit)){ ?>
                      <div class="alert alert-success">
                        <strong><?php echo $session->contact_submit;?></strong>
                      </div>
                    <?php 
                } ?>
                <form action="<?php echo base_url();?>/contacts/sendContact" method="post" role="form" class="php-email-form was-validated">
                     <h3>Get in Touch</h3>
                 <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                <div class="validate"></div>
              </div>
               <div class="form-group">
                <input type="text" class="form-control" name="email" id="" placeholder="Email" required>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="company" id="company" placeholder="Company" >
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5"  placeholder="Message" required></textarea>
                <div class="validate"></div>
              </div>
              <div style="margin-top:10px;" class="form-group g-recaptcha" data-sitekey="6LctGkobAAAAAJ4owH_7pcQ5s-6FIqAtuVCIjnYN"></div>
              <div class=" my-4"><button type="submit" class="btn theme-btn-3">Send Message</button></div>
            </form>
            </div>
            <div class="col-md-6" style=" margin-top: 38px;">
                 <h3>Our Location</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a23e28c1191%3A0x49f75d3281df052a!2s150%20Park%20Row%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2sbg!4v1579767901424!5m2!1sen!2sbg" style="border:0;width: 100%;height: 300;   " allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
    </section>
    <style>
        .panel-body p a{
            color:blue;
            font-size:18px;
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


<?php include(APPPATH."Views/__partial/__footer.php"); ?> 