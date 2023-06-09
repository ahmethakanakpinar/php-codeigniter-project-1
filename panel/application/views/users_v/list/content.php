<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Kullanıcılar
                    <?php if(isAllowViewModule($this->viewTitle, "write")): ?>
                        <a class="btn btn-primary btn-outline pull-right btn-xs" href="<?php echo base_url("$viewTitle/new_form"); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                    <?php endif; ?>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">

                    <?php if(empty($items)): ?> 
                        <div class="alert alert-info text-center">
                        <p>Burada herhangi bir veri bulunamamaktadır. <?php if(isAllowViewModule($this->viewTitle, "write")): ?>Eklemek için <a href="<?php echo base_url("$viewTitle/new_form") ?>">Tıklayınız</a><?php endif; ?></p>
                        </div>
                    <?php else: ?>
                        <table class="table table-hover table-striped table-bordered content-container">
                            <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>Kullanıcı Adı</th>
                                    <th>Ad Soyad</th>
                                    <th>E-posta</th>
                                    <th>Görsel</th>
                                    <th>Rol</th>
                                    <?php if(isAllowViewModule($this->viewTitle, "update")):  ?>
                                        <th>Durumu</th>
                                    <?php endif; ?>
                                    <?php if(isAllowViewModule($this->viewTitle, "write") || isAllowViewModule($this->viewTitle, "update") || isAllowViewModule($this->viewTitle, "delete")):  ?>
                                        <th>İşlem</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $item): ?>
                                <tr>
                                    <td class="w-50"><?php echo $item->id ?></td>
                                    <td><?php echo $item->user_name ?> </td>
                                    <td><?php echo $item->full_name ?></td>
                                    <td><?php echo $item->email ?></td>
                                    <td class="text-center w-100">
                                        <?php 
                                            $img_name = ($item->img_url != "") ? "uploads/{$viewFolder}/{$item->user_name}/{$item->img_url}" : "uploads/{$viewFolder}/default_users/default-user-image.png";
                                            $img_url = ($item->img_url != "") ? "$item->img_url" : "default-user-image.png"; 
                                        ?>
                                            <img width="100" class="img-fluid img-rounded" src="<?php echo base_url($img_name) ?>" alt="<?php echo $img_url ?>">
                                    </td>
                                    <td><?php echo get_category_title($item->user_role, "user_role_model") ?></td>
                                    <?php if(isAllowViewModule($this->viewTitle, "update")):  ?>
                                        <td class="text-center w-100">
                                            <input data-url="<?php echo base_url("$viewTitle/isActiveSetter/$item->id"); ?>" class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($item->isActive) ? "checked": "" ?> />
                                        </td>
                                    <?php endif; ?>
                                    <?php if(isAllowViewModule($this->viewTitle, "write") || isAllowViewModule($this->viewTitle, "update") || isAllowViewModule($this->viewTitle, "delete")):  ?>
                                        <td class="text-center w-300">
                                            <?php if(isAllowViewModule($this->viewTitle, "delete")):  ?>
                                                <button class="btn btn-danger btn-outline btn-sm remove-btn" data-url="<?php echo base_url("$viewTitle/delete/$item->id")?>"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button>
                                            <?php endif; ?>
                                            <?php if(isAllowViewModule($this->viewTitle, "update")):  ?>
                                                <a class="btn btn-info btn-outline btn-sm" href="<?php echo base_url("$viewTitle/update_form/$item->id")?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Düzenle</a>
                                            <?php endif; ?>
                                            <?php if(isAllowViewModule($this->viewTitle, "update")):  ?>
                                                <a class="btn btn-purple btn-outline btn-sm" href="<?php echo base_url("$viewTitle/password_form/$item->id")?>"><i class="fa fa-key" aria-hidden="true"></i> Şifre Değiştir</a>
                                            <?php endif; ?>
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