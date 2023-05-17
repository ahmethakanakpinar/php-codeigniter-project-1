<div class="banner dark-translucent-bg" style="background-image:url('<?php echo !empty($course->img_url) ? base_url("panel/uploads/{$image_folder_name}/$course->img_url") : base_url("assets/images/page-portfolio-banner.jpg") ?>' ); background-position: 50% 21%;">
	<div class="container">
		<div class="row">
			<div class="col-md-8 text-center col-md-offset-2 pv-20">
				<h2 class="title object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><strong><?php echo $course->title; ?></strong></h2>
				<div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
				<p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><?php echo character_limiter(strip_tags($course->description),50); ?></p>
			</div>
		</div>
	</div>
</div>
<section class="main-container">
	
    <div class="container">
        <div class="row">
			<!-- banner start -->
			<!-- ================ -->
			
			<!-- banner end -->

			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">
				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">
							<!-- Nav tabs -->
							<ul class="nav nav-pills" role="tablist">
								<li class="active"><a href="" role="tab" data-toggle="tab" title="images"><i class="fa fa-pencil pr-5"></i> <?php echo $course->title; ?></a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content space-bottom">
								<div>
									<p><?php echo $course->description; ?></p>
								</div>
							</div>
							<!-- pills end -->
						
						</div>
						<!-- main end -->

					
					</div>
					<!-- section start -->
					<!-- ================ -->
					<section class="section pv-40 clearfix">
						<div class="container">
							<h3>Diğer <strong>Eğitimler</strong></h3>
							<div class="row grid-space-10">
								<?php foreach($other_courses as $courses): ?>
									<div class="col-sm-4">
										<div class="image-box style-2 mb-20 bordered light-gray-bg">
											<div class="overlay-container overlay-visible">
											
											<img src="<?php echo !empty($courses->img_url) ? base_url("panel/uploads/{$image_folder_name}/$courses->img_url") : base_url("assets/images/portfolio-1.jpg") ?>">
												<div class="overlay-bottom text-left">
													<p class="lead margin-clear"><?php echo $courses->title ?></p>
												</div>
											</div>
											<div class="body">
												<p><?php echo character_limiter(strip_tags($courses->description),80); ?></p>
												<a href="<?php echo base_url("egitim-detay/$courses->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Devamına Bak<i class="fa fa-arrow-right pl-10"></i></a>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</section>
					<!-- section end -->
				</div>
			</section>
			<!-- main-container end -->

        </div>
    </div>