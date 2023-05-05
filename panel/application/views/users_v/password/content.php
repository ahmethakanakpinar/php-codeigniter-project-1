<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo "<b>$item->user_name</b> Adlı  Kullanıcının Şifresini Düzenliyorsunuz" ?>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
					<form action="<?php echo base_url("{$viewTitle}/password_update/$item->id") ?>" method="post">
						<div class="form-group">
							<label for="password">Şifre</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Şifre">
							<?php if(isset($form_error)): ?>
							<small class="text-danger"><?php echo form_error("password"); ?></small>
							<?php endif; ?>
						</div>
						<div class="form-group">
							<label for="password-repeat">Şifre Tekrar</label>
							<input type="password" class="form-control" id="password-repeat" name="password-repeat" placeholder="Şifre Tekrar">
							<?php if(isset($form_error)): ?>
							<small class="text-danger"><?php echo form_error("password-repeat"); ?></small>
							<?php endif; ?>
						</div>
						<button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
						<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
					</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->