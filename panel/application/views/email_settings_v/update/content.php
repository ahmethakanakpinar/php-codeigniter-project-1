<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo "<b>$item->user_name</b> Adlı  Mail Adresini Düzenliyorsunuz" ?>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("{$viewTitle}/update") ?>" method="post" enctype = "multipart/form-data">
							<div class="form-group">
								<label for="protocol">Protokol</label>
								<input type="text" class="form-control" id="protocol" name="protocol" placeholder="Protocol" value="<?php echo isset($form_error) ? set_value("protocol") : $item->protocol; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("protocol"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="host">E-posta Sunucu Bilgisi</label>
								<input type="text" class="form-control" id="host" name="host" placeholder="Host" value="<?php echo isset($form_error) ? set_value("host") : $item->host; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("host"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="port">Port Numarası</label>
								<input type="text" class="form-control" id="port" name="port" placeholder="Port" value="<?php echo isset($form_error) ? set_value("port") : $item->port; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("port"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="user">E-posta Adresi (User)</label>
								<input type="text" class="form-control" id="user" name="user" placeholder="User" value="<?php echo isset($form_error) ? set_value("user") : $item->user; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("user"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="password">Eposta Adresine ait Şifre</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("password"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="email_from">Kimden Gidecek (from)</label>
								<input type="text" class="form-control" id="email_from" name="email_from" placeholder="From" value="<?php echo isset($form_error) ? set_value("email_from") : $item->email_from; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("email_from"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="email_to">Kime Gidecek (to)</label>
								<input type="text" class="form-control" id="email_to" name="email_to" placeholder="To" value="<?php echo isset($form_error) ? set_value("email_to") : $item->email_to; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("email_to"); ?></small>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="user_name">Başlık Adı</label>
								<input type="text" class="form-control" id="user_name" name="user_name" placeholder="E-mail Title" value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name; ?>">
								<?php if(isset($form_error)): ?>
								<small class="text-danger"><?php echo form_error("user_name"); ?></small>
								<?php endif; ?>
							</div>
							
							<button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
							<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->