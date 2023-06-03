<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Mail Ayarları
                    <?php if(isAllowViewModule($this->viewTitle, "write")): ?>
                        <a class="btn btn-primary btn-outline pull-right btn-xs" href="<?php echo base_url("$viewTitle/new_form"); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                    <?php endif; ?>
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
                                    <th>İd</th>
                                    <th>Başlık</th>
                                    <th>Sunucu Adı</th>
                                    <th>Protokol</th>
                                    <th>Port</th>
                                    <th>E-posta</th>
                                    <th>Kime</th>
                                    <?php if(isAllowViewModule($this->viewTitle, "update")):  ?>
                                        <th>Durumu</th>
                                    <?php endif; ?>
                                    <?php if(isAllowViewModule($this->viewTitle, "write") || isAllowViewModule($this->viewTitle, "update") || isAllowViewModule($this->viewTitle, "delete")):  ?>
                                    <th class="text-center">İşlem</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $item): ?>
                                <tr>
                                    <td class="w-50 text-center"><?php echo "#$item->id" ?></td>
                                    <td class="text-center"><?php echo $item->user_name ?></td>
                                    <td><?php echo $item->host ?></td>
                                    <td class="text-center"><?php echo $item->protocol ?> </td>
                                    <td class="text-center"><?php echo $item->port ?></td>
                                    <td><?php echo $item->user ?></td>
                                    <td><?php echo $item->email_to ?></td>
                                   <?php if(isAllowViewModule($this->viewTitle, "update")):  ?>
                                        <td class="text-center w-100">
                                            <input data-url="<?php echo base_url("$viewTitle/isActiveSetter/$item->id"); ?>" class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($item->isActive) ? "checked": "" ?> />
                                        </td>
                                    <?php endif; ?>
                                    <?php if(isAllowViewModule($this->viewTitle, "write") || isAllowViewModule($this->viewTitle, "update") || isAllowViewModule($this->viewTitle, "delete")):  ?>
                                        <td class="text-center w-200">
                                            <button class="btn btn-danger btn-outline btn-sm remove-btn" data-url="<?php echo base_url("$viewTitle/delete/$item->id")?>"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button>
                                            <a class="btn btn-info btn-outline btn-sm" href="<?php echo base_url("$viewTitle/update_form/$item->id")?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Düzenle</a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
             
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->