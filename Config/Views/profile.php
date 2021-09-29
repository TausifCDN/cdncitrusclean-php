<?php include(APPPATH."Views/__partial/__header.php"); ?>

<section class="profile-info mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">My Orders</a>
                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">My Information</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="profile-info" style="background: #f6f6f6; padding-top: 5px;margin-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="main-tabs-inner">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Order ID 122863691M2</h4>
                                    <p>Order on 27 March, 2021 | 08:22 pm</p>
                                    <p>Delivered on 28 March, 2021 | 06:41 pm</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="#"><button ttype="button" class="btn theme-btn-3">Order Again</button></a>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-2">
                                    <img src="http://192.168.30.149/cdncc/uploads/residential.png" style="width: 100%;" />
                                </div>
                                <div class="col-md-5" style="position: relative;">
                                    <div class="product_content">
                                        <h4>Lemon Dream Hand Sanitizer</h4>
                                        <p>Qty : 1</p>
                                    </div>
                                </div>
                                <div class="col-md-2" style="position: relative;">
                                    <div class="product_content">
                                        <p>$49.99</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-btm" />
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <img src="http://192.168.30.149/cdncc/uploads/residential.png" style="width: 100%;" />
                                </div>
                                <div class="col-md-5" style="position: relative;">
                                    <div class="product_content">
                                        <h4>Lemon Dream Hand Sanitizer</h4>
                                        <p>Qty : 1</p>
                                    </div>
                                </div>
                                <div class="col-md-2" style="position: relative;">
                                    <div class="product_content">
                                        <p>$49.99</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-btm" />
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <img src="http://192.168.30.149/cdncc/uploads/residential.png" style="width: 100%;" />
                                </div>
                                <div class="col-md-5" style="position: relative;">
                                    <div class="product_content">
                                        <h4>Lemon Dream Hand Sanitizer</h4>
                                        <p>Qty : 1</p>
                                    </div>
                                </div>
                                <div class="col-md-2" style="position: relative;">
                                    <div class="product_content">
                                        <p>$49.99</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-inners">
                                    <h2>Personal Details</h2>
                                    <form action="<?php echo base_url();?>/user/update" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="validationTooltip01">First Name</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" value="<?= $user['first_name'] ?>" required="" placeholder="Moeed" name="first_name" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="validationTooltip02" id="last-name">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name" id="validationTooltip02" value="<?= $user['last_name'] ?>" placeholder="Shahid" required="" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="exampleInputEmail1">Email Address</label>
                                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['email_id'] ?>" placeholder="moeed.shahid@yahoo.com" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <label for="" class="">Password</label>
                                                    <input type="password" class="form-control" id="" placeholder="**************************" />
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" data-target="#pwdChangeModal" class="change-pswrd-text">Change Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2>Shipping Details <a href="#" class="text-right">+ Add New Address</a></h2>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="inputAddress1">Address</label>
                                                    <input type="text" name="address" class="form-control" id="inputAddress1" value="<?= $user['address'] ?>" placeholder="House # 5, Street # 4, Lorem Ipsum dolor" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="city1">City</label>
                                                    <input type="text" name="city" class="form-control" id="city1" value="<?= $user['city'] ?>" placeholder="Ohio" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="state1">State</label>
                                                    <input type="text" class="form-control" name="state" id="state1" value="<?= $user['state'] ?>" placeholder="Taxas" />
                                                </div>
                                            </div>
                                            <button type="Edit Details" class="btn btn-primary">Edit Details</button>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="map">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3431.010992855607!2d76.85850361446036!3d30.689966794744937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f937b356fde6f%3A0x26b26443de00ad27!2s5%2C%20Street%204%2C%20Haripur%2C%20Sector%204%2C%20Panchkula%2C%20Haryana%20134109!5e0!3m2!1sen!2sin!4v1616827586832!5m2!1sen!2sin"
                                                    width="100%"
                                                    height="100%"
                                                    style="border: 0;"
                                                    allowfullscreen=""
                                                    loading="lazy"
                                                ></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include(APPPATH."Views/__partial/__footer.php"); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($session->msg)) { ?>
<script>
    swal("Success", "<?php echo $session->msg;?>", "success");
</script>
<?php } ?>
