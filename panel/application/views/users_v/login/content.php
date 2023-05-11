<div id="back-to-home">
		<a href="<?php echo base_url("dashboard"); ?>" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			<a href="index.html">
				<span><i class="fa fa-flash"></i></span>
				<span>Ahmet Hakan</span>
			</a>
		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
	<h4 class="form-title m-b-xl text-center">Hesabınız ile oturum açın</h4>
	<form action="<?php echo base_url("userop/do_login"); ?>" method="post">
		<div class="form-group">
			<input id="sign-in-username" type="text" class="form-control" placeholder="Kullanıcı Adı" name="user_username">
		</div>
		<?php if(isset($form_error)): ?>
		<small class="text-danger"><?php echo form_error("user_username"); ?></small>
		<?php endif; ?>

		<div class="form-group">
			<input id="sign-in-password" type="password" class="form-control" placeholder="Şifre" name="user_password">
		</div>
		<?php if(isset($form_error)): ?>
		<small class="text-danger"><?php echo form_error("user_password"); ?></small>
		<?php endif; ?>

		<div class="form-group m-b-xl">
			<div class="checkbox checkbox-primary">
				<input type="checkbox" id="keep_me_logged_in"/>
				<label for="keep_me_logged_in">Beni Hatırla</label>
			</div>
		</div>
		<button type="submit" class="btn btn-primary" >Giriş Yap</button>
	</form>
</div><!-- #login-form -->

<div class="simple-page-footer">
	<p><a href="<?php echo base_url("forget-password") ?>">Şifremi Unuttum ?</a></p>
</div><!-- .simple-page-footer -->


	</div><!-- .simple-page-wrap -->