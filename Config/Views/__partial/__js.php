<!-- Template Main JS File -->
<script src="<?php echo base_url();?>/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/owlcarousel/js/owl.carousel.js"></script>   
<script>


	var owl,owl2,owl3,owl4=""
   	$(document).ready(function() {
	    
		
		 owl = $('#carousel_packages');
	    owl.owlCarousel({
	        margin: 10,
	        nav: false,
	        loop: true,
	        responsive: {
	            0: {
	                items: 1
	            },
	            600: {
	                items: 2
	            },
	            1000: {
	                items: 3
	            }
	        }
	    })
		
		
			
		
		
		 owl2 = $('#carousal-clients');
	    owl2.owlCarousel({
	        margin: 10,
	        nav: false,
	        loop: true,
	        autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
	        responsive: {
	            0: {
	                items: 1
	            },
	            600: {
	                items: 3
	            },
	            1000: {
	                items: 5
	            }
	        }
	    })

	});
	
	
	owl3= $('#carousel_category');
	    owl3.owlCarousel({
	        margin: 10,
			dots:false,
	        nav: false,
	        loop: true,
	        responsive: {
	            0: {
	                items: 1
	            },
	            600: {
	                items: 2
	            },
	            769: {
	                items: 3
	            },
	            1200: {
	                items: 5
	            }
	        }
	    });
	    owl4= $('#carousel_reviews');
	    owl4.owlCarousel({
	        margin: 10,
			dots:false,
	        nav: false,
	        loop: false,
	        responsive: {
	            0: {
	                items: 1
	            },
	            600: {
	                items: 2
	            },
	            1000: {
	                items: 3
	            }
	        }
	    });
	
	$("#carousel_previous").click(function(e){
		var o=$(this).attr("data-id");
		if(o=='owl3')
			 owl3.trigger('prev.owl.carousel');
	});

	$("#carousel_next").click(function(e){
		
		var o=$(this).attr("data-id");
		
		if(o=='owl3')
			 owl3.trigger('next.owl.carousel');
	});

	
	
</script>

