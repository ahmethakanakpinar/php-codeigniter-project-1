<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo "<b>$item->company_name</b> Sitesini Düzenliyorsunuz" ?>
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
											<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Şirket Adı veya Site Adı" value="<?php echo isset($form_error) ? set_value("company_name") : $item->company_name ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("company_name"); ?></small>
											<?php endif; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label for="phone_1">Telefon 1</label>
											<input type="text" class="form-control" id="phone_1" name="phone_1" placeholder="Telefon Numarası" value="<?php echo isset($form_error) ? set_value("phone_1") : $item->phone_1 ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("phone_1"); ?></small>
											<?php endif; ?>
										</div>
										<div class="form-group col-md-4">
											<label for="phone_2">Telefon 2</label>
											<input type="text" class="form-control" id="phone_2" name="phone_2" placeholder="Diğer Telefon Numarası" value="<?php echo isset($form_error) ? set_value("phone_2") : $item->phone_2 ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("phone_2"); ?></small>
											<?php endif; ?>
										</div>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-2">
									<div class="form-group">
										<label for="adress">Adres Bilgisi</label>
										<textarea name="adress" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->adress ?></textarea>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-3">
									<div class="form-group">
										<label for="about_us">Hakkımızda</label>
										<textarea name="about_us" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->about_us ?></textarea>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-4">
									<div class="form-group">
										<label for="mission">Misyon</label>
										<textarea name="mission" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->mission ?></textarea>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-5">
									<div class="form-group">
										<label for="vission">Vizyon</label>
										<textarea name="vission" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->vission ?></textarea>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-6">
									<div class="row">
											<div class="form-group col-md-8">
												<label for="email">E-posta Adresiniz</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="Şirketin E-posta Adresi" value="<?php echo isset($form_error) ? set_value("email") : $item->email ?>">
												<?php if(isset($form_error)): ?>
												<small class="text-danger"><?php echo form_error("email"); ?></small>
												<?php endif; ?>
											</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label for="facebook">Facebook</label>
											<input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook Adresiniz" value="<?php echo isset($form_error) ? set_value("facebook") : $item->facebook ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("facebook"); ?></small>
											<?php endif; ?>
										</div>
										<div class="form-group col-md-4">
											<label for="twitter">Twitter</label>
											<input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter Adresiniz" value="<?php echo isset($form_error) ? set_value("twitter") : $item->twitter ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("twitter"); ?></small>
											<?php endif; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-4">
											<label for="instagram">Instagram</label>
											<input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram Adresiniz" value="<?php echo isset($form_error) ? set_value("instagram") : $item->instagram ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("instagram"); ?></small>
											<?php endif; ?>
										</div>
										<div class="form-group col-md-4">
											<label for="linkedin">LinkedIn</label>
											<input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn Adresiniz" value="<?php echo isset($form_error) ? set_value("linkedin") : $item->linkedin ?>">
											<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("linkedin"); ?></small>
											<?php endif; ?>
										</div>
									</div>
								</div><!-- .tab-pane  -->
								<div role="tabpanel" class="tab-pane fade" id="tab-7">
									<div class="row">
										<div class="col-md-2 image_upload_container">
											<img src="<?php echo base_url("uploads/{$viewFolder}/{$item->logo}") ?>" alt="<?php $item->logo ?>">
										</div>
										<div class="col-md-10">
											<div class="form-group">
												<label for="logo">Logo Seçiniz</label>
												<input type="file" id="logo" class="form-control" name="logo">
											</div><!-- .form-group -->		
										</div>
									</div>	
								</div><!-- .tab-pane  -->
							</div><!-- .tab-content  -->
						</div><!-- .nav-tabs-horizontal -->
					</div><!-- .widget -->
				<button type="submit" class="btn btn-primary btn-md ">Kaydet</button>
				<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md">İptal</a>
				</form>
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->