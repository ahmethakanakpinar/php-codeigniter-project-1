<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo " <b>$item->title</b> Kaydını Düzenliyorsunuz" ?> 
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("$viewTitle/update/$item->id/$item->gallery_type/$item->folder_name") ?>" method="post">
							<div class="form-group <?php echo isset($form_error)? "has-error":""  ?>">
								<label for="title">Galeri Başlığı</label>
								<input type="text" class="form-control" id="title" name="title" value="<?php echo $item->title; ?>">
								<?php if(isset($form_error)): ?>
								<small>Hata</small>
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