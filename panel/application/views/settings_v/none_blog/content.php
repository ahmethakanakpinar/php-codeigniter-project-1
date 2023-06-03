<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    Site Ayarları
					<?php if(isAllowViewModule($this->viewTitle, "write")): ?>
                        <a class="btn btn-primary btn-outline pull-right btn-xs" href="<?php echo base_url("$viewTitle/new_form"); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Ekle</a>
                    <?php endif; ?>
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
                        <div class="alert alert-info text-center">
                        <p>Burada herhangi bir veri bulunamamaktadır. Eklemek için <a href="<?php echo base_url("$viewTitle/new_form") ?>">Tıklayınız</a></p>
                        </div>
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->