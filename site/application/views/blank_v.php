<!DOCTYPE html>
<html lang="tr">

<head>
	<?php $this->load->view("includes/head"); ?>
</head>

<body class="no-trans front-page transparent-header  page-loader-5">
	<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
	<div class="page-wrapper">
		<!-- header start -->
		<div class="header-container">
			<header class="header fixed dark clearfix">
				<?php $this->load->view("includes/header"); ?>
			</header>
		</div>
		<!-- Header end -->
		<footer id="footer" class="clearfix dark">
			<?php $this->load->view("includes/footer"); ?>
		</footer>
	</div>
	<?php $this->load->view("includes/include_script"); ?>
</body>

</html>