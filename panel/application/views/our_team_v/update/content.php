<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo "<b>$item->full_name</b> Adlı  Kullanıcı Kaydını Düzenliyorsunuz" ?>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("{$viewTitle}/update/$item->id") ?>" method="post" enctype = "multipart/form-data">
							<div class="form-group">
								<label for="full_name">Ad Soyad</label>
								<input type="text" class="form-control" id="full_name" name="full_name" placeholder="Ad Soyad" value="<?php echo isset($form_error) ? set_value("full_name") : $item->full_name; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("full_name"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="position">Pozisyonu</label>
								<input type="text" class="form-control" id="position" name="position" placeholder="Pozisyonu?" value="<?php echo isset($form_error) ? set_value("position") : $item->position; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("position"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="email">E-posta Adresi</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="E-posta Adresi" value="<?php echo isset($form_error) ? set_value("email") : $item->email; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("email"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group image_upload_container">
								<label for="exampleInputFile">Fotoğraf Seçiniz</label>
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
								<small class="text-secondary">Fotoğraf Seçmek Zorunlu değildir</small>
							</div><!-- .form-group -->			
							<div class="form-group">
								<label for="facebook">Facebook Adresi</label>
								<input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook Adresini Giriniz" value="<?php echo isset($form_error) ? set_value("facebook") : $item->facebook; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("facebook"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="instagram">Instagram Adresi</label>
								<input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram Adresini Giriniz" value="<?php echo isset($form_error) ? set_value("instagram") : $item->instagram; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("instagram"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="twitter">Twitter Adresi</label>
								<input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter Adresinizi Giriniz" value="<?php echo isset($form_error) ? set_value("twitter") : $item->twitter; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("twitter"); ?></small>
								<?php endif; ?>
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