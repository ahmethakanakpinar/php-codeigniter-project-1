<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Galeri
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="<?php echo base_url("product/new_form"); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
                 
                    <?php if(empty($items)): ?> 
                        <div class="alert alert-info text-center">
                        <p>Burada herhangi bir veri bulunamamaktadır. Eklemek için <a href="<?php echo base_url("product/new_form") ?>">Tıklayınız</a></p>
                        </div>
                    <?php else: ?>
                        <table class="table table-hover table-striped table-bordered content-container">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#id</th>
                                    <th>url</th>
                                    <th>Galeri Başlığı</th>
                                    <th>Galeri Tipi</th>
                                    <th>Dosya İsmi</th>
                                    <th>Durumu</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody class="sortable" data-url="<?php echo base_url("product/rankSetter") ?>">
                                <?php foreach($items as $item): ?>
                                <tr id = "ord-<?php echo $item->id ?>">
                                    <td><i class="fa fa-reorder" aria-hidden="true"></i></td>
                                    <td><?php echo $item->id ?></td>
                                    <td><?php echo $item->url ?></td>
                                    <td><?php echo $item->gallery_name ?></td>
                                    <td><?php echo $item->gallery_type ?></td>
                                    <td><?php echo $item->folder_name ?></td>
                                    <td>
                                        <input data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>" class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($item->isActive) ? "checked": "" ?> />
                                    </td>
                                    <td>
                                        <button  class="btn btn-danger btn-outline btn-sm remove-btn" data-url="<?php echo base_url("product/delete/$item->id")?>"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button>
                                        <a class="btn btn-info btn-outline btn-sm" href="<?php echo base_url("product/update_form/$item->id")?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Düzenle</a>
                                        <a class="btn btn-dark btn-outline btn-sm" href="<?php echo base_url("product/image_form/$item->id")?>"><i class="fa fa-image" aria-hidden="true"></i> Resimler</a>
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