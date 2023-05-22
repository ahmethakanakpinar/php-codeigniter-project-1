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
							<h2 class="title">Drop Us a Line</h2>
							<div class="row">
								<div class="col-md-6">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet quisquam.</p>
									<div class="alert alert-success hidden" id="MessageSent">
										We have received your message, we will contact you very soon.
									</div>
									<div class="alert alert-danger hidden" id="MessageNotSent">
										Oops! Something went wrong, please verify that you are not a robot or refresh the page and try again.
									</div>
									<div class="contact-form">
										<form id="contact-form-with-recaptcha" class="margin-clear" role="form">
											<div class="form-group has-feedback">
												<label for="name">Name*</label>
												<input type="text" class="form-control" id="name" name="name" placeholder="">
												<i class="fa fa-user form-control-feedback"></i>
											</div>
											<div class="form-group has-feedback">
												<label for="email">Email*</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="">
												<i class="fa fa-envelope form-control-feedback"></i>
											</div>
											<div class="form-group has-feedback">
												<label for="subject">Subject*</label>
												<input type="text" class="form-control" id="subject" name="subject" placeholder="">
												<i class="fa fa-navicon form-control-feedback"></i>
											</div>
											<div class="form-group has-feedback">
												<label for="message">Message*</label>
												<textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
												<i class="fa fa-pencil form-control-feedback"></i>
											</div>
											<div class="g-recaptcha" data-sitekey="your_site_key"></div>
											<input type="submit" value="Submit" class="submit-button btn btn-default">
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