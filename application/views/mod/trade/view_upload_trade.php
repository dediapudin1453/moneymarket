<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h3><span class="font-weight-semibold"><?php echo lang_line('mod_title'); ?></span></h3>
		</div>
	</div>
	<div class="breadcrumb-line breadcrumb-line-light">
		<div class="breadcrumb">
			<a href="<?php echo admin_url('home'); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> <?php echo lang_line('admin_link_home'); ?></a>
			<span class="breadcrumb-item"><a href="<?php echo admin_url($this->mod); ?>"><?php echo lang_line('mod_title'); ?></a></span>
			<span class="breadcrumb-item"><?php echo lang_line('mod_title_edit'); ?></span>
		</div>
	</div>
</div>

<div class="content">

	<?php echo $this->alert->show($this->mod); ?>
    <div class="alert-upload">
    </div>
	
	<div class="block">
		<div class="block-header">
			<h2><?php echo lang_line('mod_title_edit'); ?></h2>
			<div class="pull-right">
				<a href="<?php echo admin_url($this->mod); ?>" class="button btn-sm btn-default"><i class="fa fa-arrow-circle-o-left"></i> <?php echo lang_line('mod_title');?></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
            <?php 
                echo form_open_multipart('','id="form_upload" autocomplete="off"');
            ?>
				<!-- upload -->
				<div class="form-group row rows-upload">
					<label class="col-form-label col-md-2"><?php echo lang_line('label_upload');?></label>
					<div class="col-md-8">
                        <input type="hidden" name="act" value="upload" />
						<input class="file_input form-control" type="file" name="file" accept="csv, xls" />
					</div>
                    <div class="col-md-2">
                        <button class="btn btn-primary submit_upload"><i class="fa fa-upload mr-2"></i> Import</button>
					</div>
				</div>
				<!--/ upload -->
                <?php echo form_close();?>
				<hr>
                <div class="table-responsive">
				<div class="col-md-12">
					<table id="DataTable" class="display responsive no-wrap table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="no-sort text-center">
									<input type="checkbox" class="select_all" data-toggle="tooltip" data-placement="top" data-title="<?php echo lang_line('tooltip_select_all');?>">
								</th>
								<th><?php echo lang_line('table_no_account');?></th>
								<th><?php echo lang_line('table_fullname');?></th>
								<th><?php echo lang_line('table_volume');?></th>
                                <th><?php echo lang_line('table_open_price');?></th>
                                <th><?php echo lang_line('table_open_time');?></th>
                                <th><?php echo lang_line('table_close_price');?></th>
                                <th><?php echo lang_line('table_close_time');?></th>
                                <th><?php echo lang_line('table_profit');?></th>
                                <th><?php echo lang_line('table_pips');?></th>
								<th><?php echo lang_line('table_created');?></th>
								<th class="th-action text-center"><?php echo lang_line('table_action');?></th>
							</tr>
						</thead>
						<tbody></tbody>
						<tr id="delall">
							<td colspan="12">
								<button type="button" class="button btn-sm btn-default text-danger delete_multi"><i class="icon-bin"></i> <?php echo lang_line('button_delete_selected_item');?></button>
							</td>
						</tr>
					</table>
				</div>
			</div>
			</div>
		</div>
		
	</div>
</div>

