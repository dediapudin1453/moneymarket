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
			<span class="breadcrumb-item"><?php echo lang_line('mod_title_add'); ?></span>
		</div>
	</div>
</div>

<div class="content">
	<div class="block">
		<div class="block-header">
			<h3><?php echo lang_line('mod_title_add');?></h3>
			<div class="pull-right">
				<a href="<?php echo admin_url($this->mod);?>" class="button btn-default btn-sm"><i class="icon-arrow-left7 "></i> <?php echo lang_line('button_back');?></a>
			</div>
		</div>
		<div class="box-content">
			<?= $this->session->flashdata('alert') ?>
			<!-- <form id="cf-form" autocomplete="off"> -->
			<form action="<?= admin_url($this->mod.'/submit_add') ?>" method="POST">
				<div class="row">
					<div class="col-md-12">
						<!-- Title -->
						<div class="form-group mb-4">
							<input type="text" name="title" id="title" class="form-control post-title-input" value="<?php echo set_value('title');?>" placeholder="<?php echo lang_line('form_label_title');?>" required>
						</div>
						<!--/ Title -->
						<div class="form-group mb-4">
							<input type="text" name="subtitle" id="subtitle" class="form-control post-title-input" value="<?php echo set_value('subtitle');?>" placeholder="Subtitle" required>
						</div>

						<!-- Content -->
						<div class="form-group mb-0">
							<label class="mb-1"><?php echo lang_line('form_label_content');?></label>
							<span class="btn-group pull-right">
								<button type="button" id="tiny-text" class="button btn-xs btn-default btn-flat">Text</button type="button">
								<button type="button" id="tiny-visual" class="button btn-xs btn-default btn-flat">Visual</button type="button">
							</span>
							<div class="clearfix"></div>
							<textarea id="Content" name="content" class="form-control" rows="11" style="border-radius:0px;"><?php echo  set_value('content');?></textarea>
							<div class="form-input-error"><?php echo form_error('content');?></div>
						</div>
						<!--/ Content -->

						<hr>
						<div>
							<button type="submit" class="button btn-primary submit_add"><i id="submit_icon" class="fa fa-check mr-2"></i>Submit</button>
							<a href="<?php echo admin_url($this->mod);?>" class="button btn-default pull-right"><i class="fa fa-times mr-2"></i><?php echo lang_line('button_cancel');?></a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>