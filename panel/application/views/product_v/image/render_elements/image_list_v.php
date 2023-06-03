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
            <th>Resim Adı</th>
            <?php if(isAllowViewModule($this->viewTitle, "update")):  ?>
                                        <th>Durumu</th>
                                    <?php endif; ?>
            <th>Kapak </th>
            <?php if(isAllowViewModule($this->viewTitle, "write") || isAllowViewModule($this->viewTitle, "update") || isAllowViewModule($this->viewTitle, "delete")):  ?>
                                        <th>İşlem</th>
                                    <?php endif; ?>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("{$viewTitle}/rankSetterImage") ?>">
            <?php foreach($item_images as $image): ?>
                <tr id = "ord-<?php echo $image->id ?>">
                    <td class="w100 text-center"><i class="fa fa-reorder" aria-hidden="true"></i></td>
                    <td class="w100 text-center">#<?php echo $image->id ?></td>
                    <td class="w100 text-center"><img width="30" class="img-responsive" src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url") ?>" alt="<?php echo $image->img_url ?>"></td>
                    <?php if(isAllowViewModule($this->viewTitle, "update")):  ?>
                        <td><?php echo $image->img_url ?></td>
                    <?php endif; ?>
                    <td class="w100 text-center"><input data-url="<?php echo base_url("{$viewTitle}/isActiveSetterImage/$image->id")?>" class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($image->isActive) ? "checked": "" ?> /></td>
                    <td class="w100 text-center"><input data-url="<?php echo base_url("{$viewTitle}/isCoverSetter/$image->id/$image->product_id")?>" class="isCover" type="checkbox" data-switchery data-color="#ff5b5b" <?php echo ($image->isCover) ? "checked": "" ?> /></td>
                    <td class="w100 text-center"><button data-url="<?php echo base_url("{$viewTitle}/imageDelete/$image->id/$image->product_id") ?>" class="btn btn-danger btn-outline btn-block btn-sm remove-btn"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>