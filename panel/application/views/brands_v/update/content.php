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
						<form action="<?php echo base_url("{$viewTitle}/update/$item->id") ?>" method="post" enctype = "multipart/form-data">
							<div class="form-group <?php echo isset($form_error) ? "has-error":""  ?>">
								<label for="title">Haber Başlığı</label>
								<input type="text" class="form-control" id="title" name="title" value = "<?php echo $item->title ?>">
								<?php if(isset($form_error)): ?>
								<small>Hata</small>
								<?php endif; ?>
							</div>
								<div class="row">
									<div class="col-md-2 image_upload_container">
										<img src="<?php echo base_url("uploads/{$viewFolder}/{$item->img_url}") ?>" alt="<?php $item->img_url ?>">
									</div>
									<div class="col-md-10">
										<div class="form-group image_upload_container">
											<label for="exampleInputFile">Görsel Seçiniz</label>
											<input type="file" id="exampleInputFile" class="form-control" name="img_url" value="<?php $item->img_url ?>">
										</div><!-- .form-group -->
									</div>
								</div>
							<button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
							<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->