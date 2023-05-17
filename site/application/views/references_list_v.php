<!DOCTYPE html>
<html lang="tr">

<head>
	<?php $this->load->view("includes/head"); ?>
</head>

<body class="no-trans front-page transparent-header  page-loader-5">
	<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
	<div class="page-wrapper">
		<!-- Header start -->
            <?php $this->load->view("includes/header"); ?>
		<!-- Header end -->
        <!-- Body -->
            <?php $this->load->view("{$viewFolder}/content"); ?>
        <!-- Body end -->
        <!-- Footer start -->
            <?php $this->load->view("includes/footer"); ?>
		<!-- Footer end -->
		
	</div>
	<?php $this->load->view("includes/include_script"); ?>
</body>

</html>