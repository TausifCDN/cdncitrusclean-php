
        <script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
        <script src="https://js.stripe.com/v3/"></script>
<script>
$( document ).ready(function() {

/*
Plan3-
price_1IXIiVSFFXFieOESo939MjJK

Plan2-
price_1IXIi0SFFXFieOES6OGJIH2J

Plan1-
price_1IXIhRSFFXFieOESBzvsxHVU
*/


var stripe = Stripe('pk_test_51IXIdWSFFXFieOESYRk1D7mOEyp2npjWbrG0FrdW1qe1SC6mPqnOHIohD9nIc0DGpmakMuO2gKRdIATWSN3I4yZ400qATptPB5');

  stripe.redirectToCheckout({
    lineItems: [{
      price: 'price_1IXIhRSFFXFieOESBzvsxHVU',
      quantity: 1
    }],
    mode: 'payment',
    successUrl: '<?php echo base_url('/').'/success?sale_id='.base64_encode($sale_id).'';?>',
    cancelUrl: '<?php echo base_url('/').'/cancel?sale_id='.base64_encode($sale_id).';?>'
  });

});

</script>