
<?php $settings = get_settings(); ?>
    <!-- banner start -->
			<!-- ================ -->
			<div class="banner dark-translucent-bg" style="background-image:url('images/background-img-3.jpg'); background-position: 50% 30%;">
				<div class="container">
					<div class="row">
						<div class="col-md-8 text-center col-md-offset-2 pv-20">
							<h1 class="page-title text-center">Bize Ulaşın</h1>
							<div class="separator"></div>
							<p class="lead text-center">Bize ulaşmak için aşağıdaki kanallardan herhangi birine ulaşabilirsiniz</p>
							<ul class="list-inline mb-20 text-center">
								<li><i class="text-default fa fa-map-marker pr-5"></i><?php echo strip_tags($settings->adress)  ?></li>
								<li><a href="tel:<?php echo $settings->phone_1 ?>" class="link-dark"><i class="text-default fa fa-phone pl-10 pr-5"></i><?php echo $settings->phone_1 ?></a></li>
								<li><a href="mailto:<?php echo $settings->email ?>" class="link-dark"><i class="text-default fa fa-envelope-o pl-10 pr-5"></i><?php echo $settings->email ?></a></li>
							</ul>
							<div class="separator"></div>
							<ul class="social-links circle animated-effect-1 margin-clear text-center space-bottom">
								<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
								<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
								<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
								<li class="xing"><a target="_blank" href="http://www.xing.com"><i class="fa fa-xing"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- banner end -->

			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12 space-bottom">
							<h2 class="title">Bize Yazın...</h2>
							<div class="row">
								<div class="col-md-6">
									<p>Bize mesaj göndermek için aşağıdaki formu doldurabilirsiniz...</p>
									<div class="alert alert-success hidden" id="MessageSent">
										Başarılı bir şekilde mesajınız bize ulaştı.
									</div>
									<div class="alert alert-danger hidden" id="MessageNotSent">
										Mesaj gönderme işleminiz başarısız! Lütfen Tekrar deneyiniz.
									</div>
									<div class="contact-form">
										<form class="margin-clear" role="form" method="post" action="<?php echo base_url("mesaj-gonder"); ?>">
											<div class="form-group has-feedback">
												<label for="name">Ad Soyad*</label>
												<input type="text" class="form-control" id="name" name="name" placeholder="">
												<i class="fa fa-user form-control-feedback"></i>
												<?php if(isset($form_error)): ?>
													<small class="text-danger"><?php echo form_error("name"); ?></small>
												<?php endif; ?>
											</div>
											<div class="form-group has-feedback">
												<label for="email">E-posta*</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="Mail Adresini Giriniz" name ="subscribe_email">
												<i class="fa fa-envelope form-control-feedback"></i>
												<?php if(isset($form_error)): ?>
													<small class="text-danger"><?php echo form_error("email"); ?></small>
												<?php endif; ?>
											</div>
											<div class="form-group has-feedback">
												<label for="subject">Konu*</label>
												<input type="text" class="form-control" id="subject" name="subject" placeholder="">
												<i class="fa fa-navicon form-control-feedback"></i>
												<?php if(isset($form_error)): ?>
													<small class="text-danger"><?php echo form_error("subject"); ?></small>
												<?php endif; ?>
											</div>
											<div class="form-group has-feedback">
												<label for="message">Mesajınız*</label>
												<textarea class="form-control" rows="6" id="message" name="message" placeholder=""><?php echo isset($form_error) ? set_value("message") : "" ?></textarea>
												<i class="fa fa-pencil form-control-feedback"></i>
												<?php if(isset($form_error)): ?>
													<small class="text-danger"><?php echo form_error("message"); ?></small>
												<?php endif; ?>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="g-recaptcha" data-sitekey="6Lc_2jAmAAAAAJJvhATf1MOBSInimhiEyqJpXogP"></div>
												</div>
											</div>
											<button type="submit" class="submit-button btn btn-default">Gönder</button>
										</form>
									</div>
								</div>
								<div class="col-md-6">
									<div id="map-canvas"></div>
									
								</div>
							</div>
						</div>
						<!-- main end -->
					</div>
				</div>
			</section>
			<!-- main-container end -->
            <!-- section start -->
			<!-- ================ -->
			<section class="section pv-40 parallax background-img-1 dark-translucent-bg" style="background-position:50% 60%;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="call-to-action text-center">
								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<h2 class="title">En yeni haberler için abone olun</h2>
										<p>Kampanyalarımızdan, fırsatlarımızdan ve etkinliklerimizden ilk önce siz haberdar olmak istiyorsanız; bize abone olmayı unutmayın</p>
										<div class="separator"></div>
										<form class="form-inline margin-clear">
											<div class="form-group has-feedback">
												<label class="sr-only" for="subscribe2">E-posta</label>
												<input type="email" class="form-control" id="subscribe2" placeholder="E-mail adresi" name="subscribe2" required="">
												<i class="fa fa-envelope form-control-feedback"></i>
											</div>
											<button type="submit" class="btn btn-gray-transparent btn-animated margin-clear">Gönder <i class="fa fa-send"></i></button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- section end -->
			<!-- <script>
			{
				"success": true|false,
				"challenge_ts": timestamp,  // timestamp of the challenge load (ISO format yyyy-MM-dd'T'HH:mm:ssZZ)
				"hostname": string,         // the hostname of the site where the reCAPTCHA was solved
				"error-codes": [...]        // optional
			}
			</script> -->
			