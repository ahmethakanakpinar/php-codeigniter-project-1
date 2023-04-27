<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Ürün Ekle
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("$viewTitle/save") ?>" method="post">
							<div class="form-group <?php echo isset($form_error)? "has-error":""  ?>">
								<label for="title">Galeri Başlığı</label>
								<input type="text" class="form-control" id="title" name="title">
								<?php if(isset($form_error)): ?>
								<small>Hata</small>
								<?php endif; ?>
							</div>
							<div class="form-group ">
								<label for="control-demo-6" class="">Galeri Türü</label>
								<div id="control-demo-6" class="">
									<select class="form-control" name="gallery_type">
										<option value="image" <?php echo (isset($gallery_type) && ($gallery_type == "image")) ? "selected" : "";  ?>>Resim</option>
										<option value="movie" <?php echo (isset($gallery_type) && ($gallery_type == "movie")) ? "selected" : "";  ?>>Video</option>
										<option value="file" <?php echo (isset($gallery_type) && ($gallery_type == "file")) ? "selected" : "";  ?>>Dosya</option>
									</select>
								</div>
							</div><!-- .form-group -->
							<button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
							<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->