<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Bizim Ekibimiz
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
                                    <th>#id</th>
                                    <th>Ad Soyad</th>
                                    <th>Pozisyonu</th>
                                    <th>E-posta</th>
                                    <th>Görsel</th>
                                    <th>Facebook</th>
                                    <th>İnstagram</th>
                                    <th>Twitter</th>
                                    <th>Durumu</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $item): ?>
                                <tr>
                                    <td class="w-50"><?php echo $item->id ?></td>
                                    <td><?php echo $item->full_name ?><i class=""></i></td>
                                    <td><?php echo $item->position ?> </td>
                                    <td><?php echo $item->email ?></td>
                                    <td class="text-center w-100">
                                        <?php 
                                            $name = CharConvert($item->full_name);
                                            $img_name = ($item->img_url != "") ? "uploads/{$viewFolder}/{$name}/{$item->img_url}" : "uploads/{$viewFolder}/default_users/default-user-image.png";
                                            $img_url = ($item->img_url != "") ? "$item->img_url" : "default-user-image.png"; 
                                        ?>
                                            <img width="100" class="img-fluid img-rounded" src="<?php echo $img_name ?>" alt="<?php echo $img_url ?>">
                                    </td>
                                    <td><?php echo "@".$item->facebook ?></td>
                                    <td><?php echo "@".$item->instagram ?></td>
                                    <td><?php echo "@".$item->twitter ?></td>
                                    <td class="text-center w-100">
                                        <input data-url="<?php echo base_url("$viewTitle/isActiveSetter/$item->id"); ?>" class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($item->isActive) ? "checked": "" ?> />
                                    </td>
                                    <td class="text-center w-200">
                                        <button class="btn btn-danger btn-outline btn-sm remove-btn" data-url="<?php echo base_url("$viewTitle/delete/$item->id")?>"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button>
                                        <a class="btn btn-info btn-outline btn-sm" href="<?php echo base_url("$viewTitle/update_form/$item->id")?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Düzenle</a>
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