<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Ürünler
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
                 
                    <?php if(empty($items)): ?> 
                        <div class="alert alert-info text-center">
                        <p>Burada herhangi bir veri bulunamamaktadır. Eklemek için <a href="#">Tıklayınız</a></p>
                        </div>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>url</th>
                                    <th>Başlık</th>
                                    <th>Açıklama</th>
                                    <th>Durumu</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $item): ?>
                                <tr>
                                    <td><?php echo $item->id ?></td>
                                    <td><?php echo $item->url ?></td>
                                    <td><?php echo $item->title ?></td>
                                    <td><?php echo $item->description ?></td>
                                    <td>
                                        <input id="switch-2-2" type="checkbox" data-switchery data-color="#10c469" <?php echo ($item->isActive) ? "checked": "" ?> />
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-outline btn-sm" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Sil</a>
                                        <a class="btn btn-info btn-outline btn-sm" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Düzenle</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
             
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->