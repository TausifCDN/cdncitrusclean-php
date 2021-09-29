<?php include 'header.php';?>

<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <a href="<?php echo admin_base_url();?>/users">
            <span class="count_top"><i class="fa fa-users"></i> Users</span>
            <div class="count"><?php echo $categories = count($categories); ?></div>
        </a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <a href="<?php echo admin_base_url();?>/products">
            <span class="count_top"><i class="fa fa-shopping-cart"></i> Products</span>
            <div class="count"><?php echo $product = count($product); ?></div>
        </a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <a href="<?php echo admin_base_url();?>/orders">
            <span class="count_top"><i class="fa fa-users"></i> Orders</span>
            <div class="count"><?php echo $order = count($order); ?></div>
        </a>
    </div> 
</div>

<?php include 'footer.php';?>
