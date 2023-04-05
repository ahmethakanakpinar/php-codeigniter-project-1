<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Fotoğraf Ekle
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="../api/dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '../api/dropzone'}">
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
                    Fotoğrafları Görüntüle
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<th>#id</th>
								<th>Görsel</th>
								<th>Resim Adı</th>
								<th>Durumu</th>
								<th>İşlem</th>
							</thead>
							<tbody>
								<tr>
									<td>#1</td>
									<td><img width="30" class="img-responsive" src="https://s3-eu-west-1.amazonaws.com/tpd/logos/5be01d787b5e5b0001ebb6bb/0x0.png" alt=""></td>
									<td>deneme.jpeg</td>
									<td><input class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo (true) ? "checked": "" ?> /></td>
									<td><button class="btn btn-danger btn-outline btn-sm remove-btn"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button></td>
								</tr>
							</tbody>
						</table>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
</section><!-- #dash-content -->