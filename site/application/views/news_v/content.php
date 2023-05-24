<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?php echo $news->title ?></h1>
							<!-- page-title end -->

							<!-- blogpost start -->
							<!-- ================ -->
							<article class="blogpost full">
								<header>
									<div class="post-info">
										<span class="post-date">
											<i class="icon-calendar"></i>
											<span class="month"><?php echo get_readable_date($news->createdAt); ?></span>
										</span>
										<span class="submitted"><i class="icon-user-1"></i><a href="#"><?php echo $news->author; ?></a></span>
										<span class="comments"><i class="icon-chat"></i> <a href="#">0 comments</a></span>
									</div>
								</header>
								<div class="blogpost-content">
									<div id="carousel-blog-post" class="carousel slide mb-20" data-ride="carousel">
										<!-- Indicators -->
										<!-- Wrapper for slides -->
										<div class="carousel-inner" role="listbox">
											<div class="item active">
												<div class="overlay-container">
												<?php if($news->news_type =="image"): ?>
                                                    <div class="overlay-container">
													<img src="<?php echo !empty($news->img_url) ? base_url("panel/uploads/{$image_folder_name}/$news->img_url") : base_url("assets/images/blog-2.jpg") ?>" alt="<?php echo $news->img_url ?>">
													<a class="overlay-link popup-img" href="<?php echo !empty($news->img_url) ? base_url("panel/uploads/{$image_folder_name}/$news->img_url") : base_url("assets/images/blog-2.jpg") ?>"><i class="fa fa-search-plus"></i></a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="<?php echo !empty($news->video_url) ? $news->video_url : base_url("assets/images/blog-2.jpg") ?>" alt="<?php echo $news->title ?>"></iframe>
                                                    </div>
                                                <?php endif; ?>
												</div>
											</div>
										</div>
									</div>
									<p><?php echo $news->description; ?></p>
								</div>
								<footer class="clearfix">
									<div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
									<div class="link pull-right">
										<ul class="social-links circle small colored clearfix margin-clear text-right animated-effect-1">
											<li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
											<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
											<li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
										</ul>
									</div>
								</footer>
							</article>
							<!-- blogpost end -->

						</div>
						<!-- main end -->

						

						<!-- sidebar start -->
						<!-- ================ -->
						<aside class="col-md-4 col-lg-3 col-lg-offset-1">
							<div class="sidebar">
								<div class="block clearfix">
									<h3 class="title">Öne çıkan Haberler</h3>
									<div class="separator-2"></div>
									<div id="carousel-portfolio-sidebar" class="carousel slide" data-ride="carousel">
										<!-- Indicators -->
										<ol class="carousel-indicators">
											<?php $index = 0; ?>
											<?php foreach($other_news as $latest): ?>
												<li data-target="#carousel-portfolio-sidebar" data-slide-to="<?php echo $index ?>" class="<?php echo ($index++ == 0) ? "active" : "" ?>"></li>
											<?php endforeach; ?>
										</ol>

										<!-- Wrapper for slides -->
										<div class="carousel-inner" role="listbox">
											<?php $index = 0; ?>
											<?php foreach($other_news as $latest): ?>
												<div class="item <?php echo ($index++ == 0) ? "active" : "" ?>">
													<div class="image-box shadow bordered text-center mb-20">
														<div class="overlay-container">
														<?php if($latest->news_type =="image"): ?>
															<div class="overlay-container">
																<img src="<?php echo !empty($latest->img_url) ? base_url("panel/uploads/{$image_folder_name}/$latest->img_url") : base_url("assets/images/blog-2.jpg") ?>" alt="<?php echo $latest->img_url ?>">
																<a href="<?php echo base_url("haber-detay/$latest->url")?>" class="overlay-link">
																	<i class="fa fa-link"></i>
																</a>
															</div>
														<?php else: ?>
															<div class="embed-responsive embed-responsive-16by9">
																<iframe class="embed-responsive-item" src="<?php echo !empty($latest->video_url) ? $latest->video_url : base_url("assets/images/blog-2.jpg") ?>" alt="<?php echo $latest->title ?>"></iframe>
																<a href="<?php echo base_url("haber-detay/$latest->url")?>" class="overlay-link">
																	<i class="fa fa-link"></i>
																</a>
															</div>
														<?php endif; ?>
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
								<div class="block clearfix">
									<h3 class="title">Popular Tags</h3>
									<div class="separator-2"></div>
									<div class="tags-cloud">
										<div class="tag">
											<a href="#">energy</a>
										</div>
										<div class="tag">
											<a href="#">business</a>
										</div>
										<div class="tag">
											<a href="#">food</a>
										</div>
										<div class="tag">
											<a href="#">fashion</a>
										</div>
										<div class="tag">
											<a href="#">finance</a>
										</div>
										<div class="tag">
											<a href="#">culture</a>
										</div>
										<div class="tag">
											<a href="#">health</a>
										</div>
										<div class="tag">
											<a href="#">sports</a>
										</div>
										<div class="tag">
											<a href="#">life style</a>
										</div>
										<div class="tag">
											<a href="#">books</a>
										</div>
										<div class="tag">
											<a href="#">lorem</a>
										</div>
										<div class="tag">
											<a href="#">ipsum</a>
										</div>
										<div class="tag">
											<a href="#">responsive</a>
										</div>
										<div class="tag">
											<a href="#">style</a>
										</div>
										<div class="tag">
											<a href="#">finance</a>
										</div>
										<div class="tag">
											<a href="#">sports</a>
										</div>
										<div class="tag">
											<a href="#">technology</a>
										</div>
										<div class="tag">
											<a href="#">support</a>
										</div>
										<div class="tag">
											<a href="#">life style</a>
										</div>
										<div class="tag">
											<a href="#">books</a>
										</div>
									</div>
								</div>
								<div class="block clearfix">
									<h3 class="title">Diğer Haberler</h3>
									<div class="separator-2"></div>
									<?php foreach($other_news as $latest): ?>
										<div class="media margin-clear">
											<div class="media-left">
												<div class="overlay-container">
														<?php if($latest->news_type =="image"): ?>
															<img class="media-object" src="<?php echo !empty($latest->img_url) ? base_url("panel/uploads/{$image_folder_name}/$latest->img_url") : base_url("assets/images/blog-2.jpg") ?>" alt="<?php echo $latest->img_url ?>">
															<a href="<?php echo base_url("haber-detay/$latest->url")?>" class="overlay-link small"><i class="fa fa-link"></i></a>
														<?php else: ?>
																<iframe width="60" height="30" class="embed-responsive-item" src="<?php echo !empty($latest->video_url) ? $latest->video_url : base_url("assets/images/blog-2.jpg") ?>" alt="<?php echo $latest->title ?>"></iframe>
																<a href="<?php echo base_url("haber-detay/$latest->url")?>" class="overlay-link small"><i class="fa fa-link"></i></a>
														<?php endif; ?>
												</div>
											</div>
											<div class="media-body">
												<h6 class="media-heading"><a href="<?php echo base_url("haber-detay/$latest->url")?>"><?php echo character_limiter($latest->title,25); ?></a></h6>
												<p class="small margin-clear"><i class="fa fa-calendar pr-10"></i><?php echo get_readable_date($latest->createdAt); ?></p>
											</div>
											<hr>
										</div>
									<?php endforeach; ?>
									<div class="text-right ">
										<a href="<?php echo base_url("haberler")?>" class="link-dark"><i class="fa fa-plus-circle pl-5 pr-5"></i>Daha Fazlası</a>	
									</div>
								</div>
							</div>
						</aside>
						<!-- sidebar end -->
					
							<div class="main col-md-12">
								<!-- comments start -->
								<!-- ================ -->
								<div id="comments" class="comments">
									<h2 class="title">There are 3 comments</h2>
									<!-- comment start -->
									<div class="comment clearfix">
										<div class="comment-avatar">
											<img class="img-circle" src="<?php echo base_url("assets/images")?>/avatar.jpg" alt="avatar">
										</div>
										<header>
											<h3>Comment title</h3>
											<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
										</header>
										<div class="comment-content">
											<div class="comment-body clearfix">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
												<a href="blog-post.html" class="btn-sm-link link-dark pull-right"><i class="fa fa-reply"></i> Reply</a>
											</div>
										</div>
										
										<!-- comment start -->
										<div class="comment clearfix">
											<div class="comment-avatar">
												<img class="img-circle" src="<?php echo base_url("assets/images")?>/avatar.jpg" alt="avatar">
											</div>
											<header>
												<h3>Comment title</h3>
												<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
											</header>
											<div class="comment-content">
												<div class="comment-body clearfix">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
													<a href="blog-post.html" class="btn-sm-link link-dark pull-right"><i class="fa fa-reply"></i> Reply</a>
												</div>
											</div>
										</div>
										<!-- comment end -->

									</div>
									<!-- comment end -->

									<!-- comment start -->
									<div class="comment clearfix">
										<div class="comment-avatar">
											<img class="img-circle" src="<?php echo base_url("assets/images")?>/avatar.jpg" alt="avatar">
										</div>
										<header>
											<h3>Comment title</h3>
											<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
										</header>
										<div class="comment-content">
											<div class="comment-body clearfix">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
												<a href="blog-post.html" class="btn-sm-link link-dark pull-right"><i class="fa fa-reply"></i> Reply</a>
											</div>
										</div>
									</div>
									<!-- comment end -->

								</div>
								<!-- comments end -->

								<!-- comments form start -->
								<!-- ================ -->
								<div class="comments-form">
									<h2 class="title">Add your comment</h2>
									<form role="form" id="comment-form">
										<div class="form-group has-feedback">
											<label for="name4">Name</label>
											<input type="text" class="form-control" id="name4" placeholder="" name="name4" required>
											<i class="fa fa-user form-control-feedback"></i>
										</div>
										<div class="form-group has-feedback">
											<label for="subject4">Subject</label>
											<input type="text" class="form-control" id="subject4" placeholder="" name="subject4" required>
											<i class="fa fa-pencil form-control-feedback"></i>
										</div>
										<div class="form-group has-feedback">
											<label for="message4">Message</label>
											<textarea class="form-control" rows="8" id="message4" placeholder="" name="message4" required></textarea>
											<i class="fa fa-envelope-o form-control-feedback"></i>
										</div>
										<input type="submit" value="Submit" class="btn btn-default">
									</form>
								</div>
								<!-- comments form end -->
							</div>
						

					</div>
				</div>
			</section>
			<!-- main-container end -->