<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<h4 class="m-b-lg">
                    <?php echo " <b>$item->title</b> Kaydını Düzenliyorsunuz" ?> 
                </h4>
			</div><!-- END column -->
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="widget-body">
						<form action="<?php echo base_url("{$viewTitle}/update/$item->id") ?>" method="post">
							<div class="row">
								<div class="form-group col-md-6 <?php echo isset($form_error)? "has-error":""  ?>">
									<label for="title">Başlık</label>
									<input type="text" class="form-control" id="title" name="title" placeholder="İşi anlatan başlık bilgisi" value="<?php echo isset($form_error) ? set_value("title") : $item->title; ?>">
									<?php if(isset($form_error)): ?>
										<small class="text-danger"><?php echo form_error("title"); ?></small>
									<?php endif; ?>
								</div>
								<div class="form-group col-md-6 ">
									<label for="control-demo-6" class="">Kategori</label>
									<?php $category_id = isset($form_error) ? set_value("category_id") : $item->category_id; ?>
									<div id="control-demo-6" class="">
										<select class="form-control" name="category_id">
											<?php foreach($categories as $category): ?>
												<option value="<?php echo $category->id ?>" <?php echo ($category_id == $category->id ) ? "selected" : "" ?>><?php echo $category->title ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div><!-- .form-group -->
							</div>
							<div class="row">
								<div class="col-md-4">
									<label for="datetimepicker1">Bitirme Tarihi</label>
									<input type="hidden" name="finishedAt"  id="datetimepicker1" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format : 'YYYY-MM-DD HH:mm:ss'}"></input>
								</div><!-- END column -->
								<div class="col-md-8">
									<div class="form-group <?php echo isset($form_error)? "has-error":""  ?>">
										<label for="client">Müşteri</label>
										<input type="text" class="form-control" id="client" name="client" placeholder="İşi yaptığınız müşteri" value="<?php echo isset($form_error) ? set_value("client") : $item->client; ?>">
										<?php if(isset($form_error)): ?>
											<small class="text-danger"><?php echo form_error("client"); ?></small>
										<?php endif; ?>
									</div>
								</div>
								
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Açıklama</label>
								<textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo isset($form_error) ? set_value("description") : $item->description; ?></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-md btn-outline">Submit</button>
							<a href="<?php echo base_url("{$viewTitle}") ?>" class="btn btn-danger btn-md btn-outline">İptal</a>
						</form>
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
		</div><!-- .row -->
	</section><!-- #dash-content -->