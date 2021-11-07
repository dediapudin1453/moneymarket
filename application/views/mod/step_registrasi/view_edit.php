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

			<?= $this->session->flashdata('alert') ?>
			<form method="POST" action="<?= admin_url($this->mod.'/submit_update') ?>">
				<div class="row">
					<div class="col-md-12">
						<!-- Title -->
						<div class="form-group mb-4">
							<input type="text" name="title" id="title" class="form-control post-title-input" value="<?=!empty(set_value('title')) ? set_value('title') : $res_pages['title'];?>" placeholder="<?=lang_line('form_label_title');?>">
							<input type="hidden" name="param" value="<?= encrypt($res_pages['id']) ?>">
						</div>
						<!--/ Title -->

						<div class="form-group mb-4">
							<input type="text" name="subtitle" id="subtitle" class="form-control post-title-input" value="<?=!empty(set_value('subtitle')) ? set_value('subtitle') : $res_pages['subtitle'];?>" placeholder="Leverage">
						</div>

						<!-- Content -->
						<div class="form-group mb-0">
							<label class="mb-1"><?=lang_line('form_label_content');?></label>
							<span class="btn-group pull-right">
								<button type="button" id="tiny-text" class="button btn-xs btn-default btn-flat">Text</button type="button">
								<button type="button" id="tiny-visual" class="button btn-xs btn-default btn-flat">Visual</button type="button">
							</span>
							<div class="clearfix"></div>
							<textarea id="Content" name="content" class="form-control" rows="11" style="border-radius:0px;"><?=!empty(set_value('content')) ? set_value('content') : $res_pages['information'];?></textarea>
							<div class="form-input-error"><?=form_error('content');?></div>
						</div>
						<!--/ Content -->

						<hr>
						<div>
							<button type="submit" class="button btn-primary submit_update"><i class="fa fa-save mr-2"></i><?=lang_line('button_save');?></button>
							<a href="<?=admin_url($this->mod);?>" class="button btn-default pull-right"><i class="fa fa-times mr-2"></i><?=lang_line('button_cancel');?></a>
						</div>
					</div>
				</div>
			</form>
				
			
		</div>
	</div>
</div>