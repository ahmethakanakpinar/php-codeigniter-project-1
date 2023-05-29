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
							<div class="form-group">
								<label for="exampleInputPassword1">Açıklama</label>
								<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description ?></textarea>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label for="datetimepicker1">Eğitim Tarihi</label>
									<input type="hidden" name="event_date" value="<?php echo $item->event_date ?>"  id="datetimepicker1" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format : 'YYYY-MM-DD HH:mm:ss'}"></input>
								</div><!-- END column -->
								<div class="col-md-2 image_upload_container">
									<img src="<?php echo base_url("uploads/{$viewFolder}/{$item->img_url}") ?>" alt="<?php $item->img_url ?>">
								</div>
								<div class="col-md-6">
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
									</div><!-- .form-group -->
								</div>
							</div>
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
							<button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
							<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->