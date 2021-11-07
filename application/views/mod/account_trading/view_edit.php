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
            <a href="<?php echo admin_url('home'); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                <?php echo lang_line('admin_link_home') ?></a>
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
                <a href="<?php echo admin_url($this->mod);?>" class="button btn-default btn-sm"><i
                        class="icon-arrow-left7 "></i> <?php echo lang_line('button_back');?></a>
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
                        <label><?= lang_line('form_label_type') ?></label>
                        <div class="form-control post-title-input" readonly><?= $res_pages['type_account'] ?></div>
                    </div>
                    <div class="form-group mb-4">
                        <label><?= lang_line('form_label_leverage') ?></label>
                        <div class="form-control post-title-input" readonly><?= $res_pages['leverage'] ?></div>
                    </div>
                    <div class="form-group mb-4">
                        <label><?= lang_line('form_label_status') ?></label>
                        <?php if ($res_pages['status_request']=='Pending') { ?>
                        <select name="status" class="form-control post-title-input">
                            <option value="Pending" <?php if ($res_pages['status_request']=='Pending') {
										echo "selected";
									} ?>>Pending</option>
                            <option value="Approved" <?php if ($res_pages['status_request']=='Approved') {
										echo "selected";
									} ?>>Approved</option>
                            <option value="Rejected" <?php if ($res_pages['status_request']=='Rejected') {
										echo "selected";
									} ?>>Rejected</option>
                        </select>
                        <?php } else { ?>
                        <div class="form-control post-title-input" readonly><?= $res_pages['status_request'] ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group mb-4">
                        <label><?= lang_line('form_label_acc') ?></label>
                        <input type="text" name="account" class="form-control post-title-input"
                            value="<?= $res_pages['account'] ?>" <?php if ($res_pages['status_request']!='Approved') {
								echo "readonly";
							} ?>>
                    </div>
                    <div class="form-group mb-4">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control post-title-input"
                            value="<?= $res_pages['password'] ?>" <?php if ($res_pages['status_request']!='Approved') {
								echo "readonly";
							} ?>>
                    </div>
                    <div class="form-group mb-4">
                        <label>Password Investor</label>
                        <input type="text" name="password_investor" class="form-control post-title-input"
                            value="<?= $res_pages['password_investor'] ?>" <?php if ($res_pages['status_request']!='Approved') {
								echo "readonly";
							} ?>>
                    </div>
                    <div class="form-group mb-4">
                        <label>Server</label>
                        <input type="text" name="server" class="form-control post-title-input"
                            value="<?= $res_pages['server'] ?>" <?php if ($res_pages['status_request']!='Approved') {
								echo "readonly";
							} ?>>
                    </div>
                    <div class="form-group mb-4">
                        <label><?= lang_line('form_label_amount') ?></label>
                        <input type="text" name="amount" class="form-control post-title-input"
                            value="<?= $res_pages['amount'] ?>" <?php if ($res_pages['status_request']!='Approved') {
								echo "readonly";
							} ?>>
                    </div>
                </div>
                <hr>
                <div>
                    <button type="submit" class="button btn-primary submit_update"><i
                            class="fa fa-save mr-2"></i><?=lang_line('button_save');?></button>
                    <a href="<?=admin_url($this->mod);?>" class="button btn-default pull-right"><i
                            class="fa fa-times mr-2"></i><?=lang_line('button_cancel');?></a>
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
<script type="text/javascript">
function convertToRupiah(objek) {
    separator = ".";
    a = objek.value;
    b = a.replace(/[^\d]/g, "");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
            c = b.substr(i - 1, 1) + separator + c;
        } else {
            c = b.substr(i - 1, 1) + c;
        }
    }
    objek.value = c;
}
</script>