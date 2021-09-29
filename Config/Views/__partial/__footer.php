
<style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #055839;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
<!--<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button" style="display: none !important;"><i class="fas fa-chevron-up"></i></a>-->
<script>
var mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
 </script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!--footer-->
    <footer class="footer">
        <div class="container">
            <!--<div class="row">
                <div class="col-md-5">
                  <div class="ft-content fttbss">
                    <img src="<?php echo base_url();?>/assets/images/logo.png">
                      <h5>Navigate</h5>
                      <ul>
                          <li><a href="#">Shop</a></li>
                          <li><a href="#">Claim Warranty</a></li>
                          <li><a href="#">Contact Us</a></li>
                          <li><a href="#">Retail Wholesale</a></li>
                      </ul>
                  </div> 
                </div> 
                <div class="col-md-5">
                    <div class="ft-content fttb">
                        <h5>Policies</h5>
                        <ul>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Delivery Policy</a></li>
                            <li><a href="#">Return Policy</a></li>                           
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div> 
                  </div> 
                
            </div>-->
            <div class="row footer_menus">
                <div class="col-lg-12">
                    <!--<img src="<?php echo base_url();?>/assets/images/logo.png">  svg_logo.svg-->
                    <?php if($homeData->logo){ ?>
                    <a class="" href="<?= base_url() ?>"><img src="<?php echo base_url();?>/uploads/logo/<?php echo $homeData->logo;?>" class="img-fluid" style="width: 107px;"></a>
                  <?php  }else{ ?>
                  <a class="" href="<?= base_url() ?>"><img src="<?php echo base_url();?>/assets/images/svg_logo.svg" class="img-fluid" style="width: 107px;"></a>
                  <?php } ?>
                </div>
                <div class="col-6 col-lg-4">
                    <h5>Navigate</h5>
                    <ul>
                      <li><a href="#">Shop</a></li>
                      <li><a href="#">Claim Warranty</a></li>
                      <li><a href="#">Contact Us</a></li>
                      <li><a href="<?php echo base_url();?>/Wholesale">Retail Wholesale</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-4">
                    <h5>Policies</h5>
                    <ul>
                        <li><a href="<?php echo base_url();?>/terms-conditions">Terms & Conditions</a></li>
                        <li><a href="<?php echo base_url();?>/delivery-policy">Delivery Policy</a></li>
                        <li><a href="<?php echo base_url();?>/return-policy">Return Policy</a></li>                           
                        <li><a href="https://www.iubenda.com/privacy-policy/21254312" target="_blank">Privacy Policy</a></li>
                        <li><a href="https://www.iubenda.com/privacy-policy/21254312/cookie-policy" target="_blank">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="ft-content fttbss social_icons">
                        <a href="" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://www.facebook.com/CDNCC" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                        <a href="https://www.youtube.com/channel/UCJps5xUeLHszz6jKPUg6pUg/featured" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></i></a>
                        <a href="https://www.instagram.com/cdncitrusclean/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <!--<img src="<?php echo base_url();?>/assets/images/tweet.png">
                        <img src="<?php echo base_url();?>/assets/images/fb.png">
                        <img src="<?php echo base_url();?>/assets/images/wifi.png">
                        <img src="<?php echo base_url();?>/assets/images/ista.png">-->
                    </div>
                </div>
                <div class="col-md-5">
                  <div class="ft-content">
                    <p style="font-size: 18px;    font-weight: normal;"><span style="font-size: 27px;position: relative;top: 7px;">&copy;</span> 2021 CDN Citrus Clean. All rights reserved.</p>
                  </div> 
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">Forgot Password</h3>
                        <form action="" method="post" role="form" class="php-email-form" id="forgotForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" name="email" class="form-control py-4" placeholder="Enter your email here" required="">
                                    <div class="validate" id="forgot_error"></div>
                                </div>
                            </div>
                            <div id="error_signup"></div>
                            <div class="text-center"><button type="button" onclick="forgotFunc()" class="btn btn-theme">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Modal -->
<div class="modal fade" id="pwdChangeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center pt-2">
                        <h2 class="text-center font-weight-bold">Change Password</h2>
                    </div>
                    <form action="<?php echo base_url();?>/user/changepassword" method="post" role="form" class="php-email-form" id="pwdchangeform">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="font-weight-bold">Current Password</label>
                                <input type="password" name="oldpassword" class="form-control py-4" placeholder="Enter old password" required="">
                            </div>
                            <div class="col-md-12">
                                <label class="font-weight-bold">New Password</label>
                                <input type="password" name="newpassword" class="form-control py-4" placeholder="Enter New password" required="">
                                <div class="validate" id="pwd_error"></div>
                            </div>
                            
                        </div>
                        <div id="pwd_change_error"></div>
                        <div class="text-center"><button type="submit"  class="btn btn-theme">Submit</button></div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:scroll;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center pt-2">
                        <h2 class="text-center font-weight-bold">Login to get started</h2>
                    </div>
                        <form action="" method="post" role="form" class="mt-0 php-email-form" id="signinForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" name="email" class="form-control py-4" placeholder="Add your email here" required />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-12">
                                    
                                    <label class="font-weight-bold">Password</label>
                                    <div class="" style="position: relative;">
                                    <input type="password" class="form-control py-4" name="password" id="password" placeholder="Enter your password" data-rule="email" required />
                                    <a href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target="#forgot" class="forgot-link">Forgot Password?</a>
                                     </div>
                                    <div class="validate"></div>
                               
                                </div>
                                <div style="margin-top:10px;" class="col-md-12 g-recaptcha" data-sitekey="6LctGkobAAAAAJ4owH_7pcQ5s-6FIqAtuVCIjnYN"></div>
                            </div>
                            <div id="error_msg"></div>
                            <div class="text-center py-3"><button type="button" onclick="signinFunc()" class="btn btn-block custom-btn-color py-4">Login</button></div>
                        </form>
                        <p class="text-center"><b>Don't have an account?</b>&nbsp;&nbsp;&nbsp;<a  data-dismiss="modal" href="javascript:void(0)" data-toggle="modal" data-target="#signup">Register Now</a></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?=base_url();?>/products/search" method="GET" role="form" class="php-email-form mt-0" id="">
                    <div class="row">
                        <div class="col-md-12">
                            <label style=" margin: 0px;">Search Products</label>
                            <input type="text" name="search" class="form-control py-4" id="name" placeholder="Search..." required />
                            <button type="submit"  class="btn btn-search" style="width: 100%;">Search</button>
                            <div class="validate"></div>
                        </div>
                        
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div><!-- Modal -->









<!--Modal-->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow: scroll;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center pt-2">
                        <h2 class="text-center font-weight-bold">Sign up to get started</h2>
                    </div>
                        <form action="" method="post" role="form" class="php-email-form mt-0" id="signupForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control py-4" id="name" placeholder="Enter your first name" required />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control py-4" placeholder="Enter your last name" required />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="email" name="email_id" required class="form-control py-4" placeholder="Enter your email" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control py-4" name="password" id="password" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required data-rule="email" />
                                    <div class="validate"></div>
                                </div>
                                <!--<div class="col-md-12">-->
                                <!--    <input type="checkbox" class="" name="terms" id="terms" required style="margin-right: 10px;"><label for="terms">I agree to the <a href="<?php echo base_url();?>/terms-conditions" target="_blank">Terms of Service</a> and <a href="<?php echo base_url();?>/privacy-policy" target="_blank">Privacy Policy</a></label>						-->
                                <!--</div>-->
                                
                                 <div class="col-md-12">
                                    <input type="checkbox" class="" name="terms" id="terms" required style="margin-right: 10px;"><label for="terms">I agree to the <a  data-toggle="modal" data-target="#exampleModalLong" style="color:#007bff;cursor: grab;">Terms of Service</a> and <a href="https://www.iubenda.com/privacy-policy/21254312" target="_blank">Privacy Policy</a></label>                        
                                </div>
                                <div class="col-md-12">
                                    <label for="offer"><input type="checkbox" class="" name="offer" id="offer" required style="margin-right: 10px;" checked> I want 10% off my first order, and occasional offers, promotions, and news.</label>						
                                </div>
                                <div style="margin-top:10px;" class="col-md-12 g-recaptcha" data-sitekey="6LctGkobAAAAAJ4owH_7pcQ5s-6FIqAtuVCIjnYN"></div>
                            </div>
                            <div id="error_signup"></div>
                            <div class="text-center"><button type="button" onclick="signupFunc()" class="btn btn-block custom-btn-color py-4">Sign Up</button></div>
                        </form>
                        <p class="text-center my-2 font-weight-bold">Already have an account?&nbsp;&nbsp;&nbsp;<a href="javascrpt:void(0)" data-dismiss="modal" data-toggle="modal" data-target="#login">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow: scroll;">
    <style>
        #alert_modal .modal-footer{
            display: block;
            text-align: center; 
        }
    </style>
   
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center pt-2">
                        <h4 class="text-center font-weight-bold">Thank you for Sigining Up !!!</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme" id="ok_btn"  style="margin: auto;">OK</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Terms of service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
            <b>Terms & Conditions</b></p>
               </p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Next</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="privacyModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Privacy Policy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
           <p><b>Privacy Policy</b></p> 
              <p>
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
             </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Next</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
    <?php include(APPPATH."Views/__partial/__js.php"); ?>
    </body>
</html>
<script>
    $(document).ready(function(){
        $("#ok_btn").click(function(){
             $("#alert_modal").modal('hide');
            location.reload();
        });
        /*$("#reg_now_link").click(function(){
            $("#login").modal('hide');
            $("#signup").modal('show');
            
        });*/
        
    });
    
    // $("#product").click(function(){
    //     alert("clicked on product");
        
    // });
    function signinFunc()
    {
        if(!$("#signinForm")[0].checkValidity()) {
            $("#signinForm")[0].reportValidity(); return false;
        }
        $.ajax({
            type: "post",
            url: "<?= base_url('/user/signin') ?>",
            data: $('#signinForm').serialize() + "&submit=true",
            dataType: "json",
            success: function (response) {
                if(response !== 1) {
                    $('#error_msg').html('<p class="text-danger">'+response+'</p>')
                } else {
                    location.reload();
                }
            }
        })
    }
    function forgotFunc(){
        if(!$("#forgotForm")[0].checkValidity()) {
            $("#forgotForm")[0].reportValidity(); return false;
        }
        $.ajax({
            type: "post",
            url: "<?= base_url('/home/forgot') ?>",
            data: $('#forgotForm').serialize() + "&submit=true",
            dataType: "json",
            success: function (response) {
                if(response !== 1) {
                    $('#forgot_error').html('<p class="text-danger">'+response+'</p>')
                } else {
                    swal("Success", "Your request has been submitted", "success");
                    $('#forgot').modal('hide');
                }
            }
        })
    }
    function pwdchange(){
        if(!$("#pwdchangeform")[0].checkValidity()) {
            $("#pwdchangeform")[0].reportValidity(); return false;
        }
        $.ajax({
            type: "post",
            url: "<?= base_url('/user/changepassword') ?>",
            data: $('#pwdchangeform').serialize() + "&submit=true",
            dataType: "json",
            success: function (response) {
                if(response !== 1) {
                    $('#pwd_error').html('<p class="text-danger">'+response+'</p>')
                } else {
                    swal("Success", "Password changed successfully!", "success");
                    $('#pwdChangeModal').modal('hide');
                }
            }
        })
    }
    function signupFunc()
    {
        if(!$("#signupForm")[0].checkValidity()) {
            $("#signupForm")[0].reportValidity(); return false;
        }
        $.ajax({
            type: "post",
            url: "<?= base_url('/user/signup') ?>",
            data: $('#signupForm').serialize() + "&submit=true",
            dataType: "json",
            success: function (response) {
                if(response !== 1) {
                    $('#error_signup').html('<p class="text-danger">'+response+'</p>')
                } else {
                    $("#signup").modal('hide');
                    $("#alert_modal").modal({backdrop: 'static', keyboard: false});
                }
            }
        })
    }

</script>
