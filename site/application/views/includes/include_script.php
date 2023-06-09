	<?php $settings = get_settings(); ?>
	<!-- JavaScript files placed at the end of the document so the pages load faster -->
		<!-- ================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url("assets");?>/bootstrap/js/bootstrap.min.js"></script>
		<!-- Modernizr javascript -->
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/modernizr.js"></script>
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/rs-plugin-5/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/rs-plugin-5/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
		<!-- Isotope javascript -->
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/isotope/isotope.pkgd.min.js"></script>
		<!-- Magnific Popup javascript -->
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<!-- Appear javascript -->
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/waypoints/jquery.waypoints.min.js"></script>
		<!-- Count To javascript -->
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/jquery.countTo.js"></script>
		<!-- Parallax javascript -->
		<script src="<?php echo base_url("assets");?>/plugins/jquery.parallax-1.1.3.js"></script>
		<!-- Contact form -->
		<script src="<?php echo base_url("assets");?>/plugins/jquery.validate.js"></script>
		<!-- Morphext -->
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/morphext/morphext.min.js"></script>
		
		<!-- Google Maps javascript -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyDSio4u2cqShx52YjhdzbxjfPk1LLlzROI"></script>
		<script type="text/javascript" id="mapScriptTag" 
				data-lat="<?php echo $settings->location_lat;?>" 
				data-long="<?php echo $settings->location_long;?>" 
				src="<?php echo base_url("assets");?>/js/google.map.config.js">
		</script>

		<!-- Background Video -->
		<script src="<?php echo base_url("assets");?>/plugins/vide/jquery.vide.js"></script>
		<!-- Owl carousel javascript -->
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/owlcarousel2/owl.carousel.min.js"></script>
		<!-- Pace javascript -->
		<script type="text/javascript" src="<?php echo base_url("assets");?>/plugins/pace/pace.min.js"></script>
		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="<?php echo base_url("assets");?>/js/template.js"></script>
		<!-- Custom Scripts -->
		<?php $this->load->view("includes/alert.php") ?>
		<script type="text/javascript" src="<?php echo base_url("assets");?>/js/custom.js"></script>
		<script src="https://www.google.com/recaptcha/api.js"></script>
