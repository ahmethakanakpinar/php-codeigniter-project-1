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
                                    <?php foreach($product_images as $image): ?>
                                        <!-- slide 1 start -->
                                        <!-- ================ -->
                                        <li class="text-center" data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="<?php echo $product->title ?>">

                                            <!-- main image -->
                                            <img src="<?php echo base_url("panel/uploads/product_v/$image->img_url"); ?>" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">

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


                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption large_white tp-resizeme hidden-xs"
                                                data-x="center"
                                                data-y="155"
                                                data-start="1300"
                                                data-width="500"
                                                data-transform_idle="o:1;"
                                                data-transform_in="o:0;s:2000;e:Power4.easeInOut;">
                                                <div class="separator light"></div>
                                            </div>

                                            <!-- LAYER NR. 3 -->
                                       

                                        </li>
                                        <!-- slide 1 end -->
                                    <?php endforeach; ?>
								
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
						<div class="main col-md-12">
							<h1 class="title"><?php echo $product->title ?></h1>
							<div class="separator-2"></div>
							<p><?php echo $product->description ?></p>
						</div>
						<!-- main end -->

						
					</div>
				</div>
			</section>
			<!-- main-container end -->

			<!-- section start -->
			<!-- ================ -->
			<section class="section pv-40 clearfix">
				<div class="container">
					<h3>Diğer <strong>Ürünler</strong></h3>
					<div class="row grid-space-10">
                        <?php foreach($other_products as $product): ?>
                            <div class="col-sm-4">
                                <div class="image-box style-2 mb-20 bordered light-gray-bg">
                                    <div class="overlay-container overlay-visible">
                                       
                                        <img src="<?php echo default_image($product, "product_v","product"); ?>" alt="<?php echo default_image($product, "product_v","product","img_alt"); ?>">
                                        <div class="overlay-bottom text-left">
                                            <p class="lead margin-clear"><?php echo $product->title ?></p>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <p><?php echo character_limiter(strip_tags($product->description),95); ?></p>
                                        <a href="<?php echo base_url("urun-detay/$product->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Devamına Bak<i class="fa fa-arrow-right pl-10"></i></a>
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