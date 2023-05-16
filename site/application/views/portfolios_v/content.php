<section class="main-container">
    <div class="container">
        <div class="row">
            <div class="pv-40 banner light-gray-bg">
				<div class="container clearfix">

					<!-- slideshow start -->
					<!-- ================ -->
					<div class="slideshow">

						<!-- slider revolution start -->
						<!-- ================ -->
						<div class="slider-revolution-5-container">
							<div id="slider-banner-boxedwidth" class="slider-banner-boxedwidth rev_slider" data-version="5.0">
								<ul class="slides">
									<!-- slide 1 start -->
									<!-- ================ -->
									<?php foreach($portfolio_images as $image): ?>
									<li class="text-center" data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="<?php echo $portfolios->title ?>">

										<!-- main image -->
										<img src="<?php echo base_url("panel/uploads/portfolios_v/$image->img_url"); ?>" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">

										<!-- Transparent Background -->
										<div class="tp-caption dark-translucent-bg"
											data-x="center"
											data-y="center"
											data-start="0"
											data-transform_idle="o:1;"
											data-transform_in="o:0;s:600;e:Power2.easeInOut;"
											data-transform_out="o:0;s:600;"
											data-width="5000"
											data-height="450">
										</div>
									</li>
									<?php endforeach; ?>
									<!-- slide 1 end -->
								</ul>
								<div class="tp-bannertimer"></div>
							</div>
						</div>
						<!-- slider revolution end -->

					</div>
					<!-- slideshow end -->

				</div>
			</div>
			<!-- banner end -->

			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container padding-ver-clear">
				<div class="container pv-40">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">
							<h1 class="title"><?php echo $portfolios->title ?></h1>
							<div class="separator-2"></div>
							<p><?php echo $portfolios->description ?></p>
						</div>
						<!-- main end -->

						<!-- sidebar start -->
						<!-- ================ -->
						<aside class="col-md-4 col-lg-3 col-lg-offset-1">
							<div class="sidebar">
								<div class="block clearfix">
									<h3 class="title">Proje Detayları</h3>
									<div class="separator-2"></div>
									<ul class="list margin-clear">
										<li><strong>Müşteri: </strong> <span class="text-right"><?php echo $portfolios->client; ?></span></li>
										<li><strong>Tarihi: </strong> <span class="text-right"><?php echo get_readable_date($portfolios->finishedAt); ?></span></li>
										<li><strong>Kategori: </strong> <span class="text-right"><?php echo get_category_title($portfolios->category_id); ?></span></li>
									</ul>
									<h3>Paylaş</h3>
									<div class="separator-2"></div>
									<ul class="social-links colored circle small">
										<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
										<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
										<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
										<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
										<li class="xing"><a target="_blank" href="http://www.xing.com"><i class="fa fa-xing"></i></a></li>
									</ul>
								</div>
							</div>
						</aside>
						<!-- sidebar end -->
					</div>
				</div>
			</section>
			<!-- main-container end -->

			

			<!-- section start -->
			<!-- ================ -->
            <section class="section pv-40 clearfix">
				<div class="container">
					<h3>Diğer <strong>Portfolyolar</strong></h3>
					<div class="row grid-space-10">
                        <?php foreach($other_portfolios as $portfolio): ?>
                            <div class="col-sm-4">
                                <div class="image-box style-2 mb-20 bordered light-gray-bg">
                                    <div class="overlay-container overlay-visible">
                                       
                                    <img src="<?php echo default_image($portfolio, "portfolios_v", "portfolio"); ?>" alt="<?php echo default_image($portfolio, "portfolios_v", "portfolio", "img_alt");?>">
                                        <div class="overlay-bottom text-left">
                                            <p class="lead margin-clear"><?php echo $portfolio->title ?></p>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <p><?php echo character_limiter(strip_tags($portfolio->description),80); ?></p>
                                        <a href="<?php echo base_url("urun-detay/$portfolio->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Devamına Bak<i class="fa fa-arrow-right pl-10"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
					</div>
				</div>
			</section>
			<!-- section end -->
        </div>
    </div>