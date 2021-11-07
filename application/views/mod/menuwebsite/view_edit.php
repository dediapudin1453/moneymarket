<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h3>
				<span class="font-weight-semibold"><?php echo lang_line('mod_title'); ?></span>
			</h3>
		</div>
	</div>
	<div class="breadcrumb-line breadcrumb-line-light">
		<div class="breadcrumb">
			<a href="<?php echo admin_url('home'); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> <?php echo lang_line('admin_link_home') ?></a>
			<span class="breadcrumb-item"><?php echo lang_line('mod_title'); ?></span>
			<span class="breadcrumb-item"><?php echo lang_line('mod_title_edit'); ?></span>
		</div>
	</div>
</div>

<div class="content">
	<div id="alert-notif" style="display:none;"></div>
	<div class="block">
		<div class="block-header">
			<h3><?php echo lang_line('mod_title_edit');?></h3>
			<div class="pull-right">
				<a href="<?php echo admin_url($this->mod);?>" class="button btn-default btn-sm"><i class="icon-arrow-left7 "></i> <?php echo lang_line('button_back');?></a>
			</div>
		</div>
		<div class="box-content">
			<?=form_open('','id="form_update" autocomplete="off"');?>
				<div class="row">
					<div class="col-md-9">
						<!-- Title -->
						<div class="form-group mb-4">
							<input type="text" name="menu" id="menu" class="form-control post-title-input" value="<?=!empty(set_value('title')) ? set_value('title') : $res_pages['title'];?>" placeholder="<?=lang_line('form_label_title');?>">
						</div>
						<!--/ Title --><!-- 

						<div class="form-group mb-4">
							<select name="parent_id" id="parent_id" class="form-control post-title-input">
								<option value="">Parent</option>
								<option value="0" <?php if ($res_pages['parent_id']=='0') {
									echo "selected";
								} ?>>-</option>
								<?php foreach ($parent as $key => $value) { ?>
									<option value="<?= $value->id ?>" <?php if ($res_pages['parent_id']==$value->id) {
									echo "selected";
								} ?>><?= $value->title ?></option>
								<?php } ?>
							</select>
						</div> -->

						<div class="form-group mb-4">
							<input type="text" name="url" id="url" class="form-control post-title-input" value="<?=!empty(set_value('url')) ? set_value('url') : $res_pages['url'];?>" placeholder="<?=lang_line('form_label_url');?>">
						</div>
					</div>

					<div class="col-md-3 " style="min-width:120px;">
						<div id="sticky">
							<div class="accordion post-setting" id="accordionExampleX">
								<!-- Status -->
								<div class="card">
									<div class="card-header" id="collapse-category">
										<button class="btn btn-link" type="button" data-toggle="collapse" aria-expanded="true" data-target="#collapseStatus" aria-controls="collapseStatus">Status</button>
									</div>
									<div id="collapseStatus" class="collapse show" aria-labelledby="collapse-status" data-parent="#accordionExample">
										<div class="card-body">
											<div class="form-check">
												<?php if ( !empty(set_value('active')) || $res_pages['active'] == 'Y' ): ?>

												<input class="form-check-input" type="checkbox" id="cActivea" name="active" value="1" checked>
												<label class="form-check-label" for="cActivea"><?=lang_line('form_label_active');?></label>
												
												<?php else: ?>

												<input class="form-check-input" type="checkbox" id="cActiveb" name="active" value="1">
												<label class="form-check-label" for="cActiveb"><?=lang_line('form_label_active');?></label>

												<?php endif ?>
											</div>
										</div>
									</div>
								</div>
								<!--/ Status -->
							</div>
							<hr>
							<div>
								<button type="submit" class="button btn-primary submit_update"><i class="fa fa-save mr-2"></i><?=lang_line('button_save');?></button>
								<a href="<?=admin_url($this->mod);?>" class="button btn-default pull-right"><i class="fa fa-times mr-2"></i><?=lang_line('button_cancel');?></a>
							</div>
						</div>
					</div>
				</div>
			<?=form_close();?>
		</div>
	</div>
</div>