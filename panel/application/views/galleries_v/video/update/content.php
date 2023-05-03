<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo "<b>$item->url</b> Kaydını Düzenliyorsunuz" ?>
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("{$viewTitle}/gallery_video_update/$item->id/$item->gallery_id") ?>" method="post">
							
								<div class="form-group <?php echo isset($form_error)? "has-error":""  ?>">
									<label for="url">Video Url</label>
									<input type="text" class="form-control" id="title" name="url" placeholder="Video bağlantısını buraya yapıştırın" value="<?php echo $item->url ?>">
								</div>
							<button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
							<a href="<?php echo base_url("$viewTitle/gallery_video_list/$item->gallery_id") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->