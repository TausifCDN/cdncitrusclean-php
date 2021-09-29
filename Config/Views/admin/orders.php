<?php include 'header.php';?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <h2>All Orders</h2> 
              <div class="clearfix"></div>
            </div>
            <div class="x_content hws_table_responsive" id="ajax_data">
                <table  class="all_users table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>Order Id</th>
                          <th>Sub Total</th>
                          <th>Discount</th>
                          <th>Total</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($orders as $order){
                            ?>
                            <tr>
                                <td><?php echo $order->id;?></td>
                                <td>$<?php echo $order->sub_total;?></td>
                                <td>$<?php echo $order->discount;?></td>
                                <td>$<?php echo $order->total;?></td>
                                <td><?php echo $order->email;?></td>
                                <td><?php echo $order->phone;?></td>
                                <td><?php echo $order->address;?></td>
                            </tr>
                            <?php 
                        }
                        ?>
                        <!--<tr><td colspan="7" class="text-center">No Record Found</td></tr>-->
                  </tbody>
                </table>
            </div>  
        </div>
    </div> 
</div>
<?php include 'footer.php';?>