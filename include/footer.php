
<!-- contact -->
<section class="contact-w3ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>Contact Us</h4>
				<p class="contact-agile2">Sign Up For Our News Letters</p>
				<form  method="post" name="sentMessage" id="contactForm" >
					<div class="control-group form-group">
                        
                            <label class="contact-p1">Full Name:</label>
                            <input type="text" class="form-control" name="name" id="name" required >
                            <p class="help-block"></p>
                       
                    </div>	
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Phone Number:</label>
                            <input type="tel" class="form-control" name="phone" id="phone" required >
							<p class="help-block"></p>
						
                    </div>
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Email Address:</label>
                            <input type="email" class="form-control" name="email" id="email" required >
							<p class="help-block"></p>
						
                    </div>
                    
                    
                    <input type="submit" name="sub" value="Send Now" class="btn btn-primary">	
				</form>
				<?php
				if(isset($_POST['sub']))
				{
					$name =$_POST['name'];
					$phone = $_POST['phone'];
					$email = $_POST['email'];
					$approval = "Not Allowed";
					$sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `email`,`cdate`,`approval`) VALUES ('$name','$phone','$email',now(),'$approval')" ;
					
					
					if(mysqli_query($con,$sql))
					echo"OK";
					
				}
				?>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
			<h4>Connect With Us</h4>
			<p class="contact-agile1"><strong>Phone :</strong>+880 1401777888</p>
			<p class="contact-agile1"><strong>Email :</strong> <a href="mailto:name@example.com">INFO@SUNRISE.COM</a></p>
			<p class="contact-agile1"><strong>Address :</strong> Marine Drive Road, Kolatali, Cox's Bazar, Bangladesh</p>
																
			<div class="social-bnr-agileits footer-icons-agileinfo">
				<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								
							</ul>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3074.7905052320443!2d-77.84987248482734!3d39.586871613613056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c9f6a80ccf0661%3A0x7210426c67abc40!2sVirginia+Welcome+Center%2FSafety+Rest+Area!5e0!3m2!1sen!2sin!4v1485760915662" ></iframe>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /contact -->
<div class="copy">
	<p>© 2023 SUNRISE . All Rights Reserved | Design by <a href="index.php">SUNRISE</a> </p>
</div>
<!--/footer -->
<!-- js -->
<script type="text/javascript" src="<?= $base_url ?>assets/website/js/jquery-2.1.4.min.js"></script>
<!-- contact form -->
<script src="<?= $base_url ?>assets/website/js/jqBootstrapValidation.js"></script>

<!-- /contact form -->	
<!-- Calendar -->
<script src="<?= $base_url ?>assets/website/js/jquery-ui.js"></script>
<script>
		$(function() {
		$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
		});
</script>
<!-- //Calendar -->
<!-- gallery popup -->
<link rel="stylesheet" href="<?= $base_url ?>assets/website/css/swipebox.css">
<script src="<?= $base_url ?>assets/website/js/jquery.swipebox.min.js"></script> 
<script type="text/javascript">
    jQuery(function($) {
        $(".swipebox").swipebox();
    });
</script>
<!-- //gallery popup -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?= $base_url ?>assets/website/js/move-top.js"></script>
<script type="text/javascript" src="<?= $base_url ?>assets/website/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- flexSlider -->
<script defer src="<?= $base_url ?>assets/website/js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(window).load(function(){
	$('.flexslider').flexslider({
	animation: "slide",
	start: function(slider){
		$('body').removeClass('loading');
	}
	});
});
</script>
			<!-- //flexSlider -->
<script src="<?= $base_url ?>assets/website/js/responsiveslides.min.js"></script>
<script>
	// You can also use "$(window).load(function() {"
	$(function () {
		// Slideshow 4
		$("#slider4").responsiveSlides({
		auto: true,
		pager:true,
		nav:false,
		speed: 500,
		namespace: "callbacks",
		before: function () {
			$('.events').append("<li>before event fired.</li>");
		},
		after: function () {
			$('.events').append("<li>after event fired.</li>");
		}
		});

	});
</script>
		<!--search-bar-->
		<script src="<?= $base_url ?>assets/website/js/main.js"></script>	
<!--//search-bar-->
<!--tabs-->
<script src="<?= $base_url ?>assets/website/js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true,   // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        activate: function(event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
    });
    $('#verticalTab').easyResponsiveTabs({
        type: 'vertical',
        width: 'auto',
        fit: true
    });
});
</script>
<!--//tabs-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		    $().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	
	<div class="arr-w3ls">
	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
<!-- //smooth scrolling -->
<script type="text/javascript" src="<?= $base_url ?>assets/website/js/bootstrap-3.1.1.min.js"></script>
</body>
</html>


