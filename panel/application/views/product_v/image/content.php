<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("product/image_upload/$item->id") ?>" class="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("product/image_upload/$item->id") ?>'}">
							<div class="dz-message">
								<h3 class="m-h-lg">Drop files here or click to upload.</h3>
								<p class="m-b-lg text-muted">(This is just a demo dropzone. Selected files are not actually uploaded.)</p>
							</div>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                   <?php echo "<b>$item->title</b> adlı ürünün Fotoğraflarını Görüntüle" ?>
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<?php if(empty($item_images)): ?>
							<div class="alert alert-info text-center">
								<p>Burada herhangi bir resim bulunamamaktadır.</a></p>
							</div>
						<?php else: ?>
						<table class="table table-bordered table-striped table-hover picture_list">
							<thead>
								<th>#id</th>
								<th>Görsel</th>
								<th>Resim Adı</th>
								<th>Durumu</th>
								<th>İşlem</th>
							</thead>
							<tbody>
								<?php foreach($item_images as $image): ?>
								<tr>
									<td class="w100 text-center">#<?php echo $image->id ?></td>
									<td class="w100 text-center"><img width="30" class="img-responsive" src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url") ?>" alt="<?php echo $image->img_url ?>"></td>
									<td><?php echo $image->img_url ?></td>
									<td class="w100 text-center"><input class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($image->isActive) ? "checked": "" ?> /></td>
									<td class="w100 text-center"><button class="btn btn-danger btn-outline btn-block btn-sm remove-btn"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php endif; ?>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
</section><!-- #dash-content -->