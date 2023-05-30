<?php $image_folder_name = "slides_v" ;?>
<div class="banner clearfix">

				<!-- slideshow start -->
				<!-- ================ -->
				<div class="slideshow">

					<!-- slider revolution start -->
					<!-- ================ -->
					<div class="slider-revolution-5-container">
						<div id="slider-banner-fullwidth-big-height" class="slider-banner-fullwidth-big-height rev_slider" data-version="5.0">
							<ul class="slides">
								<!-- slide 1 start -->
								<!-- ================ -->
								<?php foreach($slides as $slide): ?>
									<li data-transition="fadefromright" data-slotamount="default" data-masterspeed="default" data-title="We Can Build Anything">
	
										<!-- main image -->
										<img src="<?php echo !empty($slide->img_url) ? base_url("panel/uploads/{$image_folder_name}/$slide->img_url") : base_url("assets/images/page-portfolio-banner.jpg") ?>" alt="<?php echo $slide->img_url; ?>" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover"  class="rev-slidebg">
	
										<!-- LAYER NR. 1 -->
										<div class="tp-caption dark-translucent-bg caption-box text-left hidden-xs"
											style="background-color: rgba(0, 0, 0, 0.7);"
											data-x="left"
											data-y="center"
											data-start="1300"
											data-whitespace="normal"
											data-transform_idle="o:1;"
											data-transform_in="y:[100%];sX:1;sY:1;o:0;s:1150;e:Power4.easeInOut;"
											data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;"
											data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
											data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;">
											<h2 class="title"><?php echo $slide->title ?></h2>
											<div class="separator-2 clearfix"></div>
											<p><?php echo $slide->description ?></p>
											<?php if($slide->allowButton == 1): ?>
											<div class="text-right"><a class="btn btn-small btn-gray-transparent margin-clear" target="_blank" href="<?php echo $slide->button_url; ?>"><?php echo $slide->button_caption; ?></a></div>
											<?php endif; ?>
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