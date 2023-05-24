	<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title">Haberler</h1>
							<div class="separator-2"></div>
							<!-- page-title end -->

							<!-- timeline grid start -->
							<!-- ================ -->
							<div class="timeline clearfix">
                            <?php
                                    foreach($news_list as $new)
                                    {
                                        $turkish_date[] = date('F Y', strtotime($new->createdAt));
                                    }
                                    $news_date = array_unique($turkish_date);
                            ?>
                            <?php foreach($news_date as $date): ?>
                                <div class="timeline-date-label clearfix"><?php echo $date; ?></div>
                               
                                <?php $index = 0; ?>
								<?php foreach($news_list as $news): ?>
                                    <?php $different = date('F Y', strtotime($news->createdAt));?>
                                    <?php if($different == $date): ?>
                                         <!-- timeline grid item start -->
                                        <div class="timeline-item <?php echo ($index++ % 2 == 0) ? "":"pull-right";?> ">
                                            <!-- blogpost start -->
                                            <article class="blogpost shadow light-gray-bg bordered <?php echo ($news->news_type == "image")? '' : 'object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100"'; ?>">
                                                <?php if($news->news_type =="image"): ?>
                                                    <div class="overlay-container">
                                                        <img src="<?php echo !empty($news->img_url) ? base_url("panel/uploads/{$image_folder_name}/$news->img_url") : base_url("assets/images/blog-2.jpg") ?>" alt="<?php echo $news->img_url ?>">
                                                        <a class="overlay-link" href="<?php echo base_url("haber-detay/$news->url")?>"><i class="fa fa-link"></i></a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="<?php echo !empty($news->video_url) ? $news->video_url : base_url("assets/images/blog-2.jpg") ?>" alt="<?php echo $news->title ?>"></iframe>
                                                    </div>
                                                <?php endif; ?>
                                                <header>
                                                    <h2><a href="<?php echo base_url("haber-detay/$news->url")?>"><?php echo $news->title ?></a></h2>
                                                    <div class="post-info">
                                                        <span class="post-date">
                                                            <i class="icon-calendar"></i>
                                                            <span class="month"><?php echo get_readable_date($news->createdAt); ?></span>
                                                        </span>
                                                        <span class="submitted"><i class="icon-user-1"></i><a href="#"><?php echo $news->author; ?></a></span>
                                                        <span class="comments"><i class="icon-chat"></i> <a href="#">0 yorum</a></span>
                                                    </div>
                                                </header>
                                                <div class="blogpost-content">
                                                    <p><?php echo character_limiter(strip_tags($news->description),200);?></p>
                                                </div>
                                                <footer class="clearfix">
                                                    <div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
                                                    <div class="link pull-right"><i class="icon-link"></i><a href="<?php echo base_url("haber-detay/$news->url")?>">Daha Fazlası</a></div>
                                                </footer>
                                            </article>
                                            <!-- blogpost end -->									
                                        </div>
                                        <!-- timeline grid item end -->
                                    <?php endif; ?>
                                   
                                <?php endforeach; ?>
                                
                            <?php endforeach; ?>
					
							</div>
							<!-- timeline grid end -->

						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->