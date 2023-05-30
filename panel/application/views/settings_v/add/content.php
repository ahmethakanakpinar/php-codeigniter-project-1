<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Kullanıcı Ekle
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<form action="<?php echo base_url("{$viewTitle}/save") ?>" method="post" enctype = "multipart/form-data">
					<div class="widget">
						<div class="m-b-lg nav-tabs-horizontal">
							<!-- tabs list -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab">Site Bilgileri</a></li>
								<li role="presentation"><a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">Adres Bilgisi</a></li>
								<li role="presentation"><a href="#tab-3"  aria-controls="tab-3" role="tab" data-toggle="tab">Hakkımızda</a></li>
								<li role="presentation"><a href="#tab-4"  aria-controls="tab-4" role="tab" data-toggle="tab">Misyon</a></li>
								<li role="presentation"><a href="#tab-5"  aria-controls="tab-5" role="tab" data-toggle="tab">Vizyon</a></li>
								<li role="presentation"><a href="#tab-6"  aria-controls="tab-6" role="tab" data-toggle="tab">Sosyal Medya</a></li>
								<li role="presentation"><a href="#tab-7"  aria-controls="tab-7" role="tab" data-toggle="tab">Logo</a></li>
							</ul><!-- .nav-tabs -->
							<!-- Tab panes -->
							<div class="tab-content p-md">
								<div role="tabpanel" class="tab-pane in active fade" id="tab-1">
									<div class="row">
										<div class="form-group col-md-8">
											<label for="company_name">Site Adı</label>
											<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Şirket Adı veya Site Adı" value="<?php echo isset($form_error) ? set_value("company_name") : "" ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("company_name"); ?></small>
											<?php endif; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label for="phone_1">Telefon 1</label>
											<input type="text" class="form-control" id="phone_1" name="phone_1" placeholder="Telefon Numarası" value="<?php echo isset($form_error) ? set_value("phone_1") : "" ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("phone_1"); ?></small>
											<?php endif; ?>
										</div>
										<div class="form-group col-md-4">
											<label for="phone_2">Telefon 2</label>
											<input type="text" class="form-control" id="phone_2" name="phone_2" placeholder="Diğer Telefon Numarası" value="<?php echo isset($form_error) ? set_value("phone_2") : "" ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("phone_2"); ?></small>
											<?php endif; ?>
										</div>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-2">
									<div class="form-group">
										<label for="adress">Adres Bilgisi</label>
										<textarea name="adress" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-3">
									<div class="form-group">
										<label for="about_us">Hakkımızda</label>
										<textarea name="about_us" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-4">
									<div class="form-group">
										<label for="mission">Misyon</label>
										<textarea name="mission" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-5">
									<div class="form-group">
										<label for="vission">Vizyon</label>
										<textarea name="vission" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-6">
									<div class="row">
											<div class="form-group col-md-8">
												<label for="email">E-posta Adresiniz</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="Şirketin E-posta Adresi" value="<?php echo isset($form_error) ? set_value("email") : "" ?>">
												<?php if(isset($form_error)): ?>
												<small class="text-danger"><?php echo form_error("email"); ?></small>
												<?php endif; ?>
											</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label for="facebook">Facebook</label>
											<input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook Adresiniz" value="<?php echo isset($form_error) ? set_value("facebook") : "" ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("facebook"); ?></small>
											<?php endif; ?>
										</div>
										<div class="form-group col-md-4">
											<label for="twitter">Twitter</label>
											<input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter Adresiniz" value="<?php echo isset($form_error) ? set_value("twitter") : "" ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("twitter"); ?></small>
											<?php endif; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label for="instagram">Instagram</label>
											<input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram Adresiniz" value="<?php echo isset($form_error) ? set_value("instagram") : "" ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("instagram"); ?></small>
											<?php endif; ?>
										</div>
										<div class="form-group col-md-4">
											<label for="linkedin">LinkedIn</label>
											<input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn Adresiniz" value="<?php echo isset($form_error) ? set_value("linkedin") : "" ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("linkedin"); ?></small>
											<?php endif; ?>
										</div>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-7">
									<div class="row">
										<div class="form-group col-md-8">
											<label for="exampleInputFile">Görsel Seçiniz</label>
											<div class="row">
												<div class="col-md-1">
													<label class="label" data-toggle="tooltip" title="Resim yükleyin">
														<img class="rounded avatar" src="<?php echo base_url("assets") ?>/assets/images/image-upload.png" alt="Resim Seçiniz" style="cursor:pointer">
														<input type="file" id="input" class="sr-only" name="logo" accept="image/*" >
													</label>
												</div>
												<div class="col-md-11">
													<div id="image_crop_data"></div>
												</div>
											</div>
										</div><!-- .form-group -->		
									</div>
								</div><!-- .tab-pane  -->
							</div><!-- .tab-content  -->
						</div><!-- .nav-tabs-horizontal -->
					</div><!-- .widget -->
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
				<button type="submit" class="btn btn-primary btn-md ">Kaydet</button>
				<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md">İptal</a>
				</form>
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->