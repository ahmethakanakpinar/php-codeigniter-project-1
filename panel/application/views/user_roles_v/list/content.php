<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Markalar
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="<?php echo base_url("$viewTitle/new_form"); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
                 
                    <?php if(empty($items)): ?> 
                        <div class="alert alert-info text-center">
                        <p>Burada herhangi bir veri bulunamamaktadır. Eklemek için <a href="<?php echo base_url("$viewTitle/new_form") ?>">Tıklayınız</a></p>
                        </div>
                    <?php else: ?>
                        <table class="table table-hover table-striped table-bordered content-container">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#id</th>
                                    <th>Başlık</th>
                                    <th>Durumu</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody class="sortable" data-url="<?php echo base_url("$viewTitle/rankSetter") ?>">
                                <?php foreach($items as $item): ?>
                                <tr id = "ord-<?php echo $item->id ?>">
                                    <td class="w-100"><i class="fa fa-reorder" aria-hidden="true"></i></td>
                                    <td class="w-100"><?php echo $item->id ?></td>
                                    <td><?php echo $item->title ?></td>
                                    <td class="text-center w-100">
                                        <input data-url="<?php echo base_url("$viewTitle/isActiveSetter/$item->id"); ?>" class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($item->isActive) ? "checked": "" ?> />
                                    </td>
                                    <td class="text-center w-300">
                                        <button class="btn btn-danger btn-outline btn-sm remove-btn" data-url="<?php echo base_url("$viewTitle/delete/$item->id")?>"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button>
                                        <a class="btn btn-info btn-outline btn-sm" href="<?php echo base_url("$viewTitle/update_form/$item->id")?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Düzenle</a>
                                        <a class="btn btn-dark btn-outline btn-sm" href="<?php echo base_url("$viewTitle/permissions_form/$item->id")?>"><i class="fa fa-eye" aria-hidden="true"></i> Yetki</a>
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