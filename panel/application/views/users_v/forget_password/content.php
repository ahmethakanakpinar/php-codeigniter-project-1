	<div id="back-to-home">
		<a href="<?php echo base_url("login");?>" class="btn btn-outline btn-default"><i class="fa fa-reply animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			<a href="index.html">
				<span><i class="fa fa-flash"></i></span>
				<span>Ahmet Hakan</span>
			</a>
		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="reset-password-form">
	<h4 class="form-title m-b-xl text-center">Şifrenizi mi Unuttunuz ?</h4>
	<form action="<?php echo base_url("reset-password"); ?>" method="post">
		<div class="form-group">
			<input type="email" class="form-control" placeholder="E-mail" name="email">
		</div>
		<?php if(isset($form_error)): ?>
		<small class="text-danger"><?php echo form_error("email"); ?></small>
		<?php endif; ?>
		<button class="btn btn-primary">Şifremi Sıfırla</button>
	</form>
</div><!-- #reset-password-form -->

	</div><!-- .simple-page-wrap -->