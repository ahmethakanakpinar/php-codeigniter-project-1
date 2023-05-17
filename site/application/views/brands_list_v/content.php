<section class="main-container">
    <div class="container">
        <h1 class="page-title">Markalar</h1>
        <p>Markalar</p>
        <div class="separator-2"></div>
        <div class="row">
            <?php foreach($brands as $brand): ?>
                <div class="col-sm-4">
                    <div class="image-box shadow text-center mb-20">
                        <div class="overlay-container">
                        <img src="<?php echo !empty($brand->img_url) ? base_url("panel/uploads/{$image_folder_name}/$brand->img_url") : base_url("assets/images/portfolio-1.jpg") ?>" alt="<?php echo $brand->img_url ?>">
                            <div class="overlay-top">
                                
                            </div>
                            <div class="overlay-bottom">
                                <div class="text">
                                        <h3><a href="portfolio-item.html"><?php echo $brand->title; ?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
           
    </div>
</section>
