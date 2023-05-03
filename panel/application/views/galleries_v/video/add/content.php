<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Yeni Video Ekle
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("{$viewTitle}/gallery_video_save/$gallery_id") ?>" method="post">
							
								<div class="form-group  <?php echo isset($form_error)? "has-error":""  ?>">
									<label for="title">Video Url</label>
									<input type="text" class="form-control" id="title" name="url" placeholder="Video bağlantısını buraya yapıştırın">
								</div>
								<?php if(isset($form_error)): ?>
								<small>Hata</small>
								<?php endif; ?>

							<button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
							<a href="<?php echo base_url("$viewTitle/gallery_video_list/$gallery_id") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->