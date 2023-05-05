<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo "<b>$item->user_name</b> Adlı  Kullanıcı Kaydını Düzenliyorsunuz" ?>
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
					<form action="<?php echo base_url("{$viewTitle}/update/$item->id") ?>" method="post" enctype = "multipart/form-data">
							<div class="form-group <?php echo isset($form_error) ? "has-error":""  ?>">
								<label for="user_name">Kullanıcı Adı</label>
								<input type="text" class="form-control" id="user_name" name="user_name" placeholder="Kullanıcı Adı" value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name ?>">
								<?php if(isset($form_error)): ?>
								<small><?php echo form_error("user_name"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group <?php echo isset($form_error) ? "has-error":""  ?>">
								<label for="full_name">Ad Soyad</label>
								<input type="text" class="form-control" id="full_name" name="full_name" placeholder="Ad Soyad" value="<?php echo isset($form_error) ? set_value("user_name") : $item->full_name ?>">
								<?php if(isset($form_error)): ?>
								<small><?php echo form_error("full_name"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group <?php echo isset($form_error) ? "has-error":""  ?>">
								<label for="email">E-posta Adresi</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="E-posta Adresi" value="<?php echo isset($form_error) ? set_value("user_name") : $item->email ?>">
								<?php if(isset($form_error)): ?>
								<small><?php echo form_error("email"); ?></small>
								<?php endif; ?>
							</div>
							
							<div class="row">
								<div class="text-center w-150 col-md-3">
                                        <?php 
                                            $img_name = ($item->img_url != "") ? base_url("/uploads/{$viewFolder}/{$item->user_name}/{$item->img_url}") : base_url("uploads/{$viewFolder}/default_users/default-user-image.png");
                                            $img_url = ($item->img_url != "") ? "$item->img_url" : "default-user-image.png"; 
                                        ?>
                                            <img  class="img-fluid img-rounded" src="<?php echo $img_name ?>" alt="<?php echo $img_url ?>">
								</div>
								<div class="form-group image_upload_container col-md-9">
									<label for="exampleInputFile">Fotoğraf Seçiniz</label>
									<input type="file" id="exampleInputFile" class="form-control" name="img_url">
									<small>Fotoğraf Seçmek Zorunlu değildir</small>
								</div><!-- .form-group -->						
							</div>
							<button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
							<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->