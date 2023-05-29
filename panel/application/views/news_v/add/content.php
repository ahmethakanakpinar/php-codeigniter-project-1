<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Haber Ekle
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("{$viewTitle}/save") ?>" method="post" enctype = "multipart/form-data">
							<div class="form-group <?php echo isset($form_error) ? "has-error":""  ?>">
								<label for="title">Haber Başlığı</label>
								<input type="text" class="form-control" id="title" name="title">
								<?php if(isset($form_error)): ?>
								<small>Hata</small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Açıklama</label>
								<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
							</div>
							<div class="form-group ">
								<label for="control-demo-6" class="">Haberin Türü</label>
								<div id="control-demo-6" class="">
									<select class="form-control news_type_select" name="news_type">
										<option value="image" <?php echo (isset($news_type) && ($news_type == "image")) ? "selected" : "";  ?>>Resim</option>
										<option value="movie" <?php echo (isset($news_type) && ($news_type == "movie")) ? "selected" : "";  ?>>Video</option>
									</select>
								</div>
							</div><!-- .form-group -->
							<?php if(isset($form_error)): ?>
								<div class="form-group image_upload_container" style="display: <?php echo $news_type == "image" ? "block" : "none" ?>">
									<label for="exampleInputFile">Görsel Seçiniz</label>
									<div class="row">
										<div class="col-md-1">
											<label class="label" data-toggle="tooltip" title="Resim yükleyin">
												<img class="rounded avatar" src="<?php echo base_url("assets") ?>/assets/images/image-upload.png" alt="Resim Seçiniz" style="cursor:pointer">
												<input type="file" id="input" class="sr-only" name="img_url" accept="image/*" >
											</label>
										</div>
										<div class="col-md-11">
											<div id="image_crop_data"></div>
										</div>
									</div>
								</div><!-- .form-group -->
								<div class="form-group video_url_container <?php echo isset($form_error)? "has-error":""  ?>" style="display: <?php echo $news_type == "movie" ? "block" : "none" ?>">
									<label for="title">Video Url</label>
									<input type="text" class="form-control" id="title" name="video_url" placeholder="Video bağlantısını buraya yapıştırın">
									<?php if(isset($form_error)): ?>
									<small>Hata</small>
									<?php endif; ?>
								</div>
							<?php else: ?>
								<div class="form-group image_upload_container">
									<label for="exampleInputFile">Görsel Seçiniz</label>
									<div class="row">
										<div class="col-md-1">
											<label class="label" data-toggle="tooltip" title="Resim yükleyin">
												<img class="rounded avatar" src="<?php echo base_url("assets") ?>/assets/images/image-upload.png" alt="Resim Seçiniz" style="cursor:pointer">
												<input type="file" id="input" class="sr-only" name="img_url" accept="image/*" >
											</label>
										</div>
										<div class="col-md-11">
											<div id="image_crop_data"></div>
										</div>
									</div>
									<!-- .image-finished -->
								</div><!-- .form-group -->
								<div class="form-group video_url_container <?php echo isset($form_error)? "has-error":""  ?>">
									<label for="title">Video Url</label>
									<input type="text" class="form-control" id="title" name="video_url" placeholder="Video bağlantısını buraya yapıştırın">
								</div>
							<?php endif; ?>
							<!-- MODEL POPUP -->
							<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalLabel">Resimi Kırp</h5>
									<p class="modal-title" id="modalLabel">Mouse tekerleği ile resmi büyültüp küçültebilirsiniz.</p>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="img-container">
									<img id="image" src="">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>
									<button type="button" class="btn btn-primary" id="crop">Kırp</button>
								</div>
								</div>
							</div>
							</div>
							<!-- MODEL POPUP -->
							<button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
							<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->
