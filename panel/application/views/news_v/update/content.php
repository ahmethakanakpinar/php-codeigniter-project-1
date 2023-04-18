<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo "<b>$item->title</b> Kaydını Düzenliyorsunuz" ?>
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("{$viewTitle}/update") ?>" method="post" enctype = "multipart/form-data">
							<div class="form-group <?php echo isset($form_error) ? "has-error":""  ?>">
								<label for="title">Haber Başlığı</label>
								<input type="text" class="form-control" id="title" name="title" value = "<?php echo $item->title ?>">
								<?php if(isset($form_error)): ?>
								<small>Hata</small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Açıklama</label>
								<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description ?></textarea>
							</div>
							<div class="form-group ">
								<label for="control-demo-6" class="">Haberin Türü</label>
								<div id="control-demo-6" class="">
									<select class="form-control news_type_select" name="news_type">
										<?php if($form_error): ?>
											<option value="image" <?php echo ($news_type == "image") ? "selected" : "";  ?>>Resim</option>
											<option value="movie" <?php echo ($news_type == "movie") ? "selected" : "";  ?>>Video</option>
										<?php else: ?>
											<option value="image" <?php echo ($item->news_type == "image") ? "selected":""; ?>>Resim</option>
											<option value="movie" <?php echo ($item->news_type == "movie") ? "selected":""; ?>>Video</option>
										<?php endif; ?>
									</select>
								</div>
							</div><!-- .form-group -->
							<?php if(isset($form_error)): ?>
								<div class="form-group image_upload_container" style="display: <?php echo ($item->news_type == "image") ? "block" : "none"; echo $news_type == "image" ? "block" : "none" ?>">
									<label for="exampleInputFile">Görsel Seçiniz</label>
									<input type="file" id="exampleInputFile" class="form-control" name="img_url">
								</div><!-- .form-group -->
								<div class="form-group video_url_container <?php echo isset($form_error)? "has-error":""  ?>" style="display: <?php echo $news_type == "movie" ? "block" : "none" ?>">
									<label for="title">Video Url</label>
									<input type="text" class="form-control" id="title" name="video_url" placeholder="Video bağlantısını buraya yapıştırın">
									<?php if(isset($form_error)): ?>
									<small>Hata</small>
									<?php endif; ?>
								</div>
							<?php else: ?>
								<div class="row">
									<div class="col-md-2 image_upload_container">
										<img src="<?php echo base_url("uploads/{$viewFolder}/{$item->img_url}") ?>" alt="<?php $item->img_url ?>">
									</div>
									<div class="col-md-10">
										<div class="form-group image_upload_container" style="display: <?php  echo ($item->news_type == "image") ? "block" : "none";  ?>">
											<label for="exampleInputFile">Görsel Seçiniz</label>
											<input type="file" id="exampleInputFile" class="form-control" name="img_url" value="<?php $item->img_url ?>">
										</div><!-- .form-group -->
									</div>
									</div>
								<div class="form-group video_url_container <?php echo isset($form_error)? "has-error":""  ?>" style="display: <?php  echo ($item->news_type == "movie") ? "block" : "none";  ?>">
									<label for="title">Video Url</label>
									<input type="text" class="form-control" id="title" name="video_url" placeholder="Video bağlantısını buraya yapıştırın" value="<?php echo $item->video_url ?>">
								</div>
							<?php endif; ?>
							<button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
							<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->