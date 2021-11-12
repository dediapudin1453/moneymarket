<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php echo $this->alert->show($this->mod); ?>
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title"><?= lang_line('itf_label_title') ?></h4>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<?= $this->session->flashdata('pesan') ?>
			<div class="card-body">
				<form action="<?= member_url($this->mod . '/submit_internal_transfer') ?>" method="POST">
					<div class="row mb-3">
						<div class="col-md-6">
							<div class="form-group">
								<label><?= lang_line('itf_label_from') ?> <span class="text-danger">*</span></label>
								<select name="from_internaltrf" class="form-control">
									<option value="Wallet">Wallet - USD <?= number_format($wallet['amount'], 2) ?></option>
									<?php foreach ($account as $key => $value) { ?>
										<option value="<?= $value['account'] ?>"><?= $value['account'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?= lang_line('itf_label_to') ?> </label>
								<select name="to_internaltrf" class="form-control">
									<option value="Wallet">Wallet - USD <?= number_format($wallet['amount'], 2) ?></option>
									<?php foreach ($account as $key => $value) { ?>
										<option value="<?= $value['account'] ?>"><?= $value['account'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<div class="form-group">
								<label><?= lang_line('itf_label_amount') ?> <span class="text-danger">*</span></label>
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">USD</div>
									</div>
									<input type="text" name="amount_internaltrf" id="amount_internaltrf" onkeyup="validAngka(this)" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn_submit_profile btn btn-success" id="biodata"><i class="fa fa-save mr-2"></i><?= lang_line('button_save') ?></button>
				</form>
			</div>
		</div>
	</div>
</div>