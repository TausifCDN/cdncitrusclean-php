<?php include(APPPATH."Views/__partial/__header.php");?> 
<div class="form-banner-color " style="height: 194px;">
        <div class="container">
            <div class="text-white">
                <h1 class="my-3 form-heading">Tell us what you are looking for?</h1>
                <p> For a better and personalized experience, please tell us
                </p>
            </div>
        </div>
    </div>
    <!------select service start---->

    <form id="registerForm" method="post" action="<?= base_url() ?>/register/submit"  enctype="multipart/form-data">
    <div class="container">
        <h4 class="my-3 title-service">What do you need assistance with?</h4>
        <p>Please select the service(s) below</p>
        <div class="row">
               
                    <div class="col-12 col-md-3 col-lg-4 hcard">
                        <div class="round">
                            <input type="checkbox" name="service[]" value="data entry">
                            <label for="checkbox" class="checkbox-service"> data entry</label>
                        </div>
                    </div>
                
            
                    <div class="col-12 col-md-3 col-lg-4 hcard ">
                        <div class="round">
                            <input type="checkbox" name="service[]" value="Customer Support">
                            <label for="checkbox" class="checkbox-service">Customer Support</label>
                        </div>
                    </div>
                
              
                    <div class="col-12 col-md-3 col-lg-4 hcard ">
                        <div class="round">
                            <input type="checkbox" name="service[]" value="Content Writing">
                            <label for="checkbox" class="checkbox-service">Content Writing</label>
                        </div>
                    </div>
              
              
                    <div class="col-12 col-md-3 col-lg-4 hcard ">
                        <div class="round">
                            <input type="checkbox" name="service[]" value="Social Media Manager">
                            <label for="checkbox" class="checkbox-service">Social Media Manager</label>
                        </div>
                    </div>
              
                
              
                    <div class="col-12 col-md-3 col-lg-4 hcard ">
                        <div class="round">
                            <input type="checkbox" name="service[]" value="Email Handling">
                            <label for="checkbox" class="checkbox-service"> Email Handling</label>
                        </div>
                    </div>
               
             
                    <div class="col-12 col-md-3 col-lg-4 hcard ">
                        <div class="round">
                            <input type="checkbox" name="service[]" value="Calendar Management">
                            <label for="checkbox" class="checkbox-service">Calendar Management</label>
                        </div>
                    </div>
               
         
                    <div class="col-12 col-md-3 col-lg-4 hcard ">
                        <div class="round">
                            <input type="checkbox" name="service[]" value="Web Research">
                            <label for="checkbox" class="checkbox-service">Web Research</label>
                        </div>
                    </div>
               
          
                    <div class="col-12 col-md-3 col-lg-4 hcard ">
                        <div class="round">
                            <input type="checkbox" name="service[]" value="Ad Posting">
                            <label for="checkbox" class="checkbox-service">Ad Posting</label>
                        </div>
                    </div>
              
                
            </div>
      

                <div class="mt-3 col-6">
                    <p>Specify other</p>
                    <div class="form-group">
                        <input type="text" class="form-control input-form-height mt-2" id="formGroupFullName" name="service[]" placeholder="type here">
                    </div>
                </div>
    </div>
    <!------package details-->
    <div class="container mt-4">
        <h4 class="title-service">Package Heading</h4>
        <div class="row">
            <?php foreach ($packages as $package) { ?>
            <div class="col-12  col-lg-4  col-md-4 hbigcard">
                <div class="card p-3">
                    <div class="package-card">
                        <input type="radio" required id="starterPackage" name="package" value="<?= $package['id'] ?>">
                        <label for="starter1" class="package-heading px-1"><?= $package['package_heading'] ?> - $$<?= $package['price'] ?></label>
                        <p class="sixty-perhour p-1"><?= $package['hours_per_month'] ?> hours/month</p>
                        <p class=""><?= $package['description'] ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!--------- add form details-->
    <div class="container my-3">
        <h4>Add Personal/Business Details</h4>
        <div class="col-10">
                <div class="row">
                    <div class="col">
                        <label class="mt-2">First Name</label>
                        <input type="text" class="form-control input-form-height mt-2" placeholder="First name" name="first_name" required>
                    </div>
                    <div class="col">
                        <label class="mt-2" for="formGroupExampleInput">Last Name</label>
                        <input type="text" class="form-control input-form-height mt-2" placeholder="Last name" name="last_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="mt-2" for="formGroupExampleInput">Email Address</label>
                    <input type="email" required class="form-control input-form-height mt-2" id="exampleInputEmail1" placeholder="Email Address" name="email_id">
                </div>
                <div class="row">
                    <div class="col">
                        <label class="mt-2" for="formGroupExampleInput">Mobile Number</label>
                        <input type="tel" class="form-control input-form-height mt-2" required id="exampleInputEmail1" placeholder="Mobile Number" name="phone">
                    </div>
                    <div class="col">
                        <label class="mt-2" for="formGroupExampleInput">How many staff do you Required</label>
                        <input type="number" class="form-control input-form-height mt-2" name="staff_required" required>
                    </div>
                    <div class="form-group">
                        <label class="mt-2" for="exampleFormControlTextarea1">Please explain the nature of your requirements</label>
                        <textarea class="form-control mt-2 min-height-textarea" id="exampleFormControlTextarea1" rows="3" name="requirement_nature"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="mt-2" for="formGroupExampleInput2">Where did you hear about us</label>
                        <input type="text" class="form-control mt-2" id="formGroupaboutus" placeholder="company name" name="about_us">
                    </div>
                    <div class="bg-light my-2 border">
                        <div class="text-center my-3">
                            <label for="FileInput">
                                <img class="choose-file" src="<?= base_url() ?>/assets/images/teenyicons_attachment-solid.svg"
                                    style="cursor:pointer"
                                    onmouseover="this.src='<?= base_url() ?>/assets/images/teenyicons_attachment-solid.svg'"
                                    onmouseout="this.src='<?= base_url() ?>/assets/images/teenyicons_attachment-solid.svg'" alt="Choose a file"
                                    style="float:right;margin:7px" />
                                <p class="font-weight-bold mt-1">Add Attachment</p>
                                <p class="text-muted">drag any file or click to upload</p>
                            </label>
                            <!-- <form action="upload.php"> -->
                                <input type="file" id="FileInput" name="file" style="cursor: pointer;display: none;  " />
                                <!-- <input type="submit" id="Up" style="display: none;" /> -->
                            <!-- </form> -->

                        </div>
                    </div>
                </div>
                <!--------------calender------->
                <div class="container">
                    <div class="my-3">
                        <b>Add Meeting Details</b>
          <iframe src="https://calendly.com/mascotindia123/15min?back=1&month=2021-03" style="width:100%;height:700px;    border: none !important;"></iframe>
                    </div>
                </div>
                <button type="button" onclick="submitFunc()" class="btn btn-lg text-white p-3" style="background-color:#48D1CD!important;width:40%" >Book a Meeting</button>
        </div>
    </div>
    </form>

<?php include(APPPATH."Views/__partial/__footer.php");?>  
<?php include(APPPATH."Views/__partial/__js.php");?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .swal-footer {
      text-align: center;
    }
    .swal-button {
        padding: 15px 35px!important;
        font-size: 16px;
        background-color: #48D1CD;
        box-shadow: none;
    }
    .swal-button--cancel {
        background-color: #fff;
        border: grey thin solid;
    }
    .swal-text {
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }
</style>

<script>
    function submitFunc()
    {
      if(!$("#registerForm")[0].checkValidity()) {
            $("#registerForm")[0].reportValidity(); return false;
        }
        swal("Avail a special 20% discount for 3 month package Save $816 with a single click", {
  buttons: {
    catch: {
      text: "Yes, I am IN",
      value: "catch",
    },
    cancel: "Not this time",
  },
})
.then((value) => {
  switch (value) {
    case "catch":
      swal("Yes!", "Please select the 3 month package and continue", "success");
      break;
 
    default:
    // swal("Yes!", "Your meeting has been successfully scheduled. Please proceed with payment to confirm your scheduled meeting");
    swal("Yes!", "Your meeting has been successfully scheduled. Please proceed with payment to confirm your scheduled meeting", {
  buttons: {
    catch: {
      text: "Confirm Payment",
      value: "confirmed",
    },
  },
})
.then((value) => {
  switch (value) {
 
    case "confirmed":
      $("#registerForm").submit();
      break;
      
  }
});
        
  }
});
    }
</script>>