<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo "<b>$gallery->title</b> Galerisine ait videolar"; ?>
                    <a class="btn btn-primary btn-outline pull-right btn-xs" href="<?php echo base_url("$viewTitle/new_video_form/$gallery->id"); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
                 
                    <?php if(empty($items)): ?> 
                        <div class="alert alert-info text-center">
                        <p>Burada herhangi bir veri bulunamamaktadır. Eklemek için <a href="<?php echo base_url("$viewTitle/new_video_form/$gallery->id") ?>">Tıklayınız</a></p>
                        </div>
                    <?php else: ?>
                        <table class="table table-hover table-striped table-bordered content-container">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#id</th>
                                    <th>url</th>
                                    <th>Video</th>
                                    <th>Durumu</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody class="sortable" data-url="<?php echo base_url("$viewTitle/galleryVideoRankSetter") ?>">
                                <?php foreach($items as $item): ?>
                                <tr id = "ord-<?php echo $item->id ?>">
                                    <td><i class="fa fa-reorder" aria-hidden="true"></i></td>
                                    <td><?php echo $item->id ?></td>
                                    <td><?php echo $item->url ?></td>
                                    <td class="text-center">
                                            <iframe 
                                                width="300"
                                                src="<?php echo $item->url ?>"
                                                title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen>
                                            </iframe>
                                    </td>
                                    <td>
                                        <input data-url="<?php echo base_url("$viewTitle/galleryVideoIsActiveSetter/$item->id"); ?>" class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($item->isActive) ? "checked": "" ?> />
                                    </td>
                                    <td>
                                        <button  class="btn btn-danger btn-outline btn-sm remove-btn" data-url="<?php echo base_url("$viewTitle/gallery_video_delete/$item->id/$item->gallery_id")?>"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button>
                                        <a class="btn btn-info btn-outline btn-sm" href="<?php echo base_url("$viewTitle/gallery_update_form/$item->id")?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Düzenle</a>
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