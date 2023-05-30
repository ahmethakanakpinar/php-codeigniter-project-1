<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Slider Ekle
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("{$viewTitle}/save") ?>" method="post" enctype = "multipart/form-data">
							<div class="form-group <?php echo isset($form_error) ? ((set_value("title") == "") ? "has-error":"") :""; ?>">
								<label for="title">Slider Başlığı</label>
								<input type="text" class="form-control" id="title" name="title" value="<?php echo isset($form_error) ? set_value("title") : "" ?>">
								<?php if(isset($form_error)): ?>
									<small class="text-danger"><?php echo form_error("title"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Slider Açıklaması</label>
								<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
							</div>
							<div class="form-group image_upload_container">
								<label for="exampleInputFile">Slider Seçiniz</label>
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
							<div class="form-group">
							
								<label for="exampleInputPassword1">Button Aktif</label><br>
								<input name="switch" class="form-control buttonswitch" type="checkbox" data-switchery data-color="#10c469" <?php  echo isset($form_error) ? ((set_value("switch") == "on") ? "checked":"") :""; ?>> 
							</div>
							<div class="button_enable" style="<?php echo isset($form_error) ? ((set_value("switch") == "on") ? "display:block":"") :""; ?>">
								<div class="form-group <?php echo isset($form_error) ? ((set_value("button_caption") == "") ? "has-error":"") :""; ?>">
									<label for="button_caption">Buton Başlığı</label>
									<input type="text" class="form-control" id="button_caption" name="button_caption" placeholder="Butona vermek istediğiniz isim" value="<?php echo isset($form_error) ? set_value("button_caption") : "" ?>">
									<?php if(isset($form_error)): ?>
										<small class="text-danger"><?php echo form_error("button_caption"); ?></small>
									<?php endif; ?>
								</div>
								<div class="form-group <?php echo isset($form_error) ? ((set_value("button_url") == "") ? "has-error":"") :""; ?>">
									<label for="button_url">Slider Url</label>
									<input type="text" class="form-control" id="button_url" name="button_url" placeholder="Butona tıklandığında yönlendirilecek URL"  value="<?php echo isset($form_error) ? set_value("button_url") : "" ?>">
									<?php if(isset($form_error)): ?>
										<small class="text-danger"><?php echo form_error("button_url"); ?></small>
									<?php endif; ?>
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
							<button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
							<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->