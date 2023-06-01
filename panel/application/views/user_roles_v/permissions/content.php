<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo "<b>$item->title</b> kaydın Yetkisini Düzenliyorsunuz" ?>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
					<form action="<?php echo base_url("{$viewTitle}/password_update/$item->id") ?>" method="post">
						
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<th>Modül Adı</th>
							<th>Görüntüleme</th>
							<th>Ekleme</th>
							<th>Düzenleme</th>
							<th>Silme</th>
						</thead>
						<tbody>
							<tr>
								<td>Users</td>
								<td class="w-100 text-center"><input type="checkbox" data-switchery data-color="#10c469"></td>
								<td class="w-100 text-center"><input type="checkbox" data-switchery data-color="#10c469"></td>
								<td class="w-100 text-center"><input type="checkbox" data-switchery data-color="#10c469"></td>
								<td class="w-100 text-center"><input type="checkbox" data-switchery data-color="#10c469"></td>
							</tr>
						</tbody>
					</table>
					<hr>
					<button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
					<a href="<?php echo base_url("$viewTitle") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
					</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->