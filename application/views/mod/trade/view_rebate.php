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
            <?php echo form_open_multipart('','id="form_claim_all_rebate" autocomplete="off"'); ?>
                <input type="hidden" name="act" value="all_rebate_claim" />
				<button class="button btn-sm btn-success submit_claim_all_rebate mr-2"><i class="fa fa-save"></i> <?php echo lang_line('btn_rebate_claim_all');?></button>
            <?php echo form_close();?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
                <div class="table-responsive">
				<div class="col-md-12">
					<table id="DataTable-rebate" class="display responsive no-wrap table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="no-sort text-center">
									<input type="checkbox" class="select_all" data-toggle="tooltip" data-placement="top" data-title="<?php echo lang_line('tooltip_select_all');?>">
								</th>
								<!-- <th><?php echo lang_line('table_no_account');?></th> -->
								<th>Penerima Rebate</th>
								<!-- <th>Dari</th> -->
                                <th>Total Volume</th>
                                <th>Total Rebate</th>
                                <th>Tanggal</th>
                                <th>Status</th>
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

