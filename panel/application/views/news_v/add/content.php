<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Haber Ekle
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("$viewTitle/save") ?>" method="post">
							<div class="form-group <?php echo isset($form_error)? "has-error":""  ?>">
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
							<div class="form-group">
								<label for="control-demo-6" class="">Haberin Türü</label>
								<div id="control-demo-6" class="">
									<select class="form-control">
										<option value="image">Resim</option>
										<option value="movie">Video</option>
									</select>
								</div>
							</div><!-- .form-group -->
							<div class="form-group">
								<label for="exampleInputFile">Görsel Seçiniz</label>
								<input type="file" id="exampleInputFile" class="form-control" name="img_url">
							</div><!-- .form-group -->
							<div class="form-group <?php echo isset($form_error)? "has-error":""  ?>">
								<label for="title">Video Url</label>
								<input type="text" class="form-control" id="title" name="video_url" placeholder="Video bağlantısını buraya yapıştırın">
								<?php if(isset($form_error)): ?>
								<small>Hata</small>
								<?php endif; ?>
							</div>
							<button type="submit" class="btn btn-primary btn-md btn-outline">Submit</button>
							<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->