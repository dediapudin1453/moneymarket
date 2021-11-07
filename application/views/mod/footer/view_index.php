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
			<span class="breadcrumb-item"><?php echo lang_line('mod_title_all'); ?></span>
		</div>
	</div>
</div>
<div class="content">

	<?php echo $this->alert->show($this->mod);?>
	
	<div class="block">
		<div class="block-header">
			<h3><?php echo lang_line('mod_title_all');?></h3>
			<div class="pull-right">
				<!-- <a href="<?php echo admin_url($this->mod.'/add-new');?>" class="button btn-primary btn-sm"><i class="icon-add"></i> <?php echo lang_line('button_add_new');?></a> -->
			</div>
		</div>

		<div class="row">
			<div class="table-responsive">
				<div class="col-md-12">
					<table id="DataTable" class="display responsive no-wrap table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="no-sort text-center">
									<input type="checkbox" class="select_all" data-toggle="tooltip" data-placement="top" data-title="<?php echo lang_line('tooltip_select_all');?>">
								</th>
								<th><?php echo lang_line('table_title'); ?></th>
								<th><?php echo lang_line('table_copyright'); ?></th>
								<!-- <th><?php echo lang_line('table_content'); ?></th> -->
								<th><?php echo lang_line('table_active');?></th>
								<th class="th-action text-center"><?php echo lang_line('table_action');?></th>
							</tr>
						</thead>
						<tbody></tbody>
						<tr id="delall">
							<!-- <td colspan="5">
								<button type="button" class="button btn-sm btn-default text-danger delete_multi"><i class="icon-bin"></i> <?php echo lang_line('button_delete_selected_item');?></button>
							</td> -->
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>