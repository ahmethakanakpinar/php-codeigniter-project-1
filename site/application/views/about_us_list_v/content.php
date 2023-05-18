<div class="banner dark-translucent-bg" style="background-image:url('<?php echo base_url("assets") ?>/images/page-about-banner-1.jpg'); background-position: 50% 27%;">
				<div class="container">
					<div class="row">
						<div class="col-md-8 text-center col-md-offset-2 pv-20">
							<h3 class="title logo-font object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><?php echo $settings->company_name ?></h3>
							<div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
							<p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><?php echo character_limiter(strip_tags($settings->about_us),100); ?></p>
						</div>
					</div>
				</div>
			</div>   
<section class="main-container padding-bottom-clear">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">
                <h3 class="title">Biz <strong>Kimiz</strong></h3>
                <div class="separator-2"></div>
                <div class="row">
                    <div class="col-md-12">
                        <p><?php echo $settings->about_us ?></p>
                    </div>
                  
                </div>
            </div>
            <!-- main end -->

        </div>
    </div>

    <!-- section start -->
    <!-- ================ -->
    <div class="light-gray-bg pv-20 section mt-20">
        <div class="container">
            <h4 class="mb-20">Bizim <strong>Takım</strong></h4>
            <div class="row grid-space-10">
                <?php foreach($our_team as $personel): ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="image-box team-member style-2 shadow bordered mb-20 text-center">
                            <div class="overlay-container overlay-visible">
                                <?php $fullname = CharConvert($personel->full_name); ?>
                                <img src="<?php echo !empty($personel->img_url) ? base_url("panel/uploads/our_team_v/$fullname/$personel->img_url") : base_url("assets/images/team-member-1.jpg") ?>" alt="<?php echo $personel->img_url ?>">
                                <div class="overlay-bottom">
                                </div>
                            </div>
                            <div class="body">
                                <h3 class="margin-clear"><?php echo $personel->full_name ?></h3>
                                <small><?php echo $personel->position ?></small>
                                <div class="separator mt-10"></div>
                                <ul class="social-links circle colored margin-clear">
                                    <li class="facebook"><a target="_blank" href="http://www.facebook.com/<?php echo $personel->facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li class="instagram"><a target="_blank" href="http://www.instagram.com/<?php echo $personel->instagram; ?>"><i class="fa fa-instagram"></i></a></li>
                                    <li class="twitter"><a target="_blank" href="https://www.twitter.com/<?php echo $personel->twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
        </div>
    </div>
    <!-- section end -->

    <!-- section start -->
    <!-- ================ -->
    <div class="section">
        <div class="container">
            <h3>Niye <strong>Bizi Seçmelisiniz</strong></h3>
            <div class="separator-2"></div>
            <div class="row">
                <!-- accordion start -->
                <!-- ================ -->
                <div class="col-md-12">
                    <div class="panel-group collapse-style-1" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <i class="fa fa-rocket pr-10"></i>Misyon
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <?php echo strip_tags($settings->mission); ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                                        <i class="fa fa-leaf pr-10"></i>Vizyon
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php echo strip_tags($settings->vission); ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- accordion end -->
            </div>
            <!-- clients start -->
            <!-- ================ -->
            <div class="separator"></div>
            <div class="clients-container">
                <div class="clients">
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
                        <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-1.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="200">
                        <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-2.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
                        <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-3.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="400">
                        <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-4.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="500">
                        <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-5.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="600">
                        <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-6.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="700">
                        <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-7.png" alt=""></a>
                    </div>
                    <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="800">
                        <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-8.png" alt=""></a>
                    </div>
                </div>
            </div>
            <!-- clients end -->
        </div>
    </div>
    <!-- section end -->

</section>