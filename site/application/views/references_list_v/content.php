<section class="main-container">
    <div class="container">
        <h1 class="page-title">Referanslar</h1>
        <p>Referanslar</p>
        <div class="separator-2"></div>
        <?php $counter = 0; ?>
        <?php foreach($references as $reference): ?>
            <?php if($counter % 2 == 0): ?>
                <div class="image-box style-4 light-gray-bg">
                    <div class="row grid-space-0">
                        <div class="col-md-6">
                            <div class="overlay-container">
                                <img src="<?php echo !empty($reference->img_url) ? base_url("panel/uploads/{$image_folder_name}/$reference->img_url") : base_url("assets/images/portfolio-1.jpg") ?>" alt="<?php echo $reference->img_url ?>">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em><?php echo $reference->title ?></em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="body">
                                <div class="pv-30 visible-lg"></div>
                                <h3><?php echo $reference->title ?></h3>
                                <div class="separator-2"></div>
                                <p class="margin-clear"><?php echo character_limiter(strip_tags($reference->description),50); ?></p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="image-box style-4 light-gray-bg">
                    <div class="row grid-space-0">
                        <div class="col-md-6 col-md-push-6">
                            <div class="overlay-container">
                                <img src="<?php echo !empty($reference->img_url) ? base_url("panel/uploads/{$image_folder_name}/$reference->img_url") : base_url("assets/images/portfolio-1.jpg") ?>" alt="<?php echo $reference->img_url ?>">
                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em><?php echo $reference->title ?></em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-pull-6">
                            <div class="body text-right">
                                <div class="pv-30 visible-lg"></div>
                                <h3><?php echo $reference->title ?></h3>
                                <div class="separator-3"></div>
                                <p class="margin-clear"><?php echo character_limiter(strip_tags($reference->description),50); ?></p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php $counter++; ?>
        <?php endforeach; ?>
    </div>
</section>
