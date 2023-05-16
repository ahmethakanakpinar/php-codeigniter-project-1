<section class="main-container">
    <div class="container">
        <h1 class="page-title">Ürünler Listesi</h1>
        <p>Ürünler Listesi</p>
        <div class="separator-2"></div>
        <div class="row">
            <?php foreach($products as $product): ?>
                <div class="col-sm-4">
                    <div class="image-box style-2 mb-20 bordered light-gray-bg">
                        <div class="overlay-container overlay-visible">
                            <img src="<?php echo default_image($product, "product_v","product"); ?>" alt="<?php echo default_image($product, "product_v","product","img_alt"); ?>">
                            <div class="overlay-bottom text-left">
                                <p class="lead margin-clear"><?php echo $product->title ?></p>
                            </div>
                        </div>
                        <div class="body">
                            <p><?php echo character_limiter(strip_tags($product->description),95); ?></p>
                            <a href="<?php echo base_url("urun-detay/$product->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Devamına Bak<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>