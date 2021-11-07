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
					<div class="col-md-12">
						<!-- Title -->
						<div class="form-group mb-4">
							<label><?= lang_line('form_label_name') ?></label>
							<div class="form-control post-title-input" readonly><?= $res_pages['username'] ?></div>
						</div>
						<div class="form-group mb-4">
							<label><?= lang_line('form_label_from') ?></label>
							<div class="form-control post-title-input" readonly><?= $res_pages['from_tf'] ?></div>
						</div>
						<div class="form-group mb-4">
							<label><?= lang_line('form_label_to') ?></label>
							<div class="form-control post-title-input" readonly><?= $res_pages['to_tf'] ?></div>
						</div>
						<div class="form-group mb-4">
							<label><?= lang_line('form_label_amount') ?></label>
							<div class="form-control post-title-input" readonly><?= number_format($res_pages['amount'],2) ?></div>
						</div>
						<div class="form-group mb-4">
							<label><?= lang_line('form_label_ket') ?></label>
							<div class="form-control post-title-input" readonly><?= $res_pages['keterangan'] ?></div>
						</div>
						<div class="form-group mb-4">
							<label><?= lang_line('form_label_status') ?></label>
							<select name="status" class="form-control post-title-input">
								<option value="Pending" <?php if ($res_pages['status']=='Pending') {
									echo "selected";
								} ?>>Pending</option>
								<option value="Approved" <?php if ($res_pages['status']=='Approved') {
									echo "selected";
								} ?>>Approved</option>
								<option value="Rejected" <?php if ($res_pages['status']=='Rejected') {
									echo "selected";
								} ?>>Rejected</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div>
					<button type="submit" class="button btn-primary submit_update"><i class="fa fa-save mr-2"></i><?=lang_line('button_save');?></button>
					<a href="<?=admin_url($this->mod);?>" class="button btn-default pull-right"><i class="fa fa-times mr-2"></i><?=lang_line('button_cancel');?></a>
				</div>
			<?=form_close();?>
		</div>
	</div>
</div>
<script type="text/javascript">
	function convertToRupiah(objek) {
    	separator = ".";
    	a = objek.value;
    	b = a.replace(/[^\d]/g,"");
    	c = "";
    	panjang = b.length; 
    	j = 0; 
	    for (i = panjang; i > 0; i--) {
	      	j = j + 1;
	      	if (((j % 3) == 1) && (j != 1)) {
	        	c = b.substr(i-1,1) + separator + c;
	      	} else {
	        	c = b.substr(i-1,1) + c;
	      	}
	    }
	    objek.value = c;
  	}   
</script>