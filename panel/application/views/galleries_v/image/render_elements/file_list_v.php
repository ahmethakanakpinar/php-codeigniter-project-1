<?php if(empty($item_images)): ?>
    <div class="alert alert-info text-center">
        <p>Burada herhangi bir resim bulunamamaktadır.</a></p>
    </div>
<?php else: ?>
    <table class="table table-bordered table-striped table-hover picture_list">
        <thead>
            <th></th>
            <th>#id</th>
            <th>Görsel</th>
            <th>Dosya Yolu/Adı</th>
            <?php if(isAllowViewModule($this->viewTitle, "update")):  ?>
                <th>Durumu</th>
            <?php endif; ?>
            <?php if(isAllowViewModule($this->viewTitle, "write") || isAllowViewModule($this->viewTitle, "update") || isAllowViewModule($this->viewTitle, "delete")):  ?>
                <th>İşlem</th>
            <?php endif; ?>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("{$viewTitle}/rankSetterFile/$gallery_type") ?>">
            <?php foreach($item_images as $image): ?>
                <tr id = "ord-<?php echo $image->id ?>">
                    <td class="w100 text-center"><i class="fa fa-reorder" aria-hidden="true"></i></td>
                    <td class="w100 text-center">#<?php echo $image->id ?></td>
                    <td class="w100 text-center">
                        <?php if($gallery_type == "image"): ?>
                            <img width="50" class="img-responsive" style = "margin:auto;" src="<?php echo base_url("$image->url") ?>" alt="<?php echo $image->url ?>">
                        <?php else: ?>
                            <i class = "fa fa-folder fa-2x"></i>
                        <?php endif; ?>
                    </td>

                    <td><?php echo $image->url ?></td>
                    <?php if(isAllowViewModule($this->viewTitle, "update")):  ?>
                    <td class="w100 text-center"><input data-url="<?php echo base_url("{$viewTitle}/isActiveSetterFile/$image->id/$gallery_type")?>" class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($image->isActive) ? "checked": "" ?> /></td>
                    <?php endif; ?>
                    <td class="w100 text-center"><button data-url="<?php echo base_url("{$viewTitle}/fileDelete/$image->id/$image->gallery_id/$gallery_type") ?>" class="btn btn-danger btn-outline btn-block btn-sm remove-btn"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>