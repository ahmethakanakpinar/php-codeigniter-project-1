<section class="main-container">

<div class="container">
    <div class="row">

        <!-- main start -->
        <!-- ================ -->
        <div class="main col-md-12">

            <!-- page-title start -->
            <!-- ================ -->
            <h1 class="page-title">Eğitimler</h1>
            <div class="separator-2"></div>
            <!-- page-title end -->
            <p class="lead">Eğitimler</p>
            <?php foreach($courses as $course): ?>
            <div class="image-box style-3-b">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="overlay-container">
                            <img src="<?php echo !empty($course->img_url) ? base_url("panel/uploads/{$image_folder_name}/$course->img_url") : base_url("assets/images/portfolio-1.jpg") ?>" alt="<?php echo "" ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-8 col-lg-9">
                        <div class="body">
                            <h3 class="title"><a href="<?php echo base_url("egitim-detay/$course->url");?>"><?php echo $course->title ?></a></h3>
                            <?php 
                                if($course->event_date < date("Y-m-d H:i:s"))
                                    $danger = "text-danger";
                                else
                                    $danger = "text-success";
                            ?>
                            <p class="small mb-10 <?php echo $danger ?>"><i class="icon-calendar"></i> <?php echo get_readable_date($course->event_date); ?> </p>
                            <div class="separator-2"></div>
                            <p class="mb-10"><?php echo character_limiter(strip_tags($course->description),95); ?></p>
                            <a href="<?php echo base_url("egitim-detay/$course->url");?>" class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear">Daha Fazlası<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
           
            <nav>
                <ul class="pagination">
                    <li><a href="#" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#" aria-label="Next"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </nav>

        </div>
        <!-- main end -->

    </div>
</div>
</section>