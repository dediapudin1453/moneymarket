<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $this->alert->show($this->mod); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<h5 class="card-title">Withdrawal</h5>
				<div class="pull-right">
				</div>
			</div>
			<?= $this->session->flashdata('pesan') ?>
			<div class="card-body">
				<form action="<?= member_url('withdrawal/submit_withdrawal') ?>" method="POST">
					<div class="row mb-3">
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang_line('withdrawal_label_bank')?><span class="text-danger">*</span></label>
								<select name="bank_name" class="form-control">
									<?php foreach ($bank as $key => $value) { ?>
										<option value="<?= encrypt($value['id']) ?>"><?= $value['bank_name'] ?> - <?= $value['acc_number'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang_line('withdrawal_label_asal')?></label>
								<select name="asal" class="form-control">
									<option value="Wallet">Wallet - USD <?= number_format($wallet['amount'],2) ?></option>
								</select>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang_line('withdrawal_label_jumlah')?><span class="text-danger">*</span></label>
							 	<div class="input-group mb-2">
							        <div class="input-group-prepend">
							          	<div class="input-group-text">USD</div>
							        </div>
							        <input type="text" name="amount_wd" id="amount_wd" onkeyup="validAngka(this)" class="form-control">
						      	</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-group">
									<label><?=lang_line('withdrawal_label_rate')?></label>
								 	<div class="input-group mb-2">
								        <div class="input-group-prepend">
								          	<div class="input-group-text">IDR</div>
								        </div>
								        <input type="text" name="rate_tampil" value="<?= number_format($rate['amount'],0,',','.') ?>" class="form-control" id="rate_tampil" readonly>
								        <input type="hidden" name="rate_wd" id="rate_wd" value="<?= $rate['amount'] ?>" readonly>
							      	</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<div class="form-group">
								<label><?=lang_line('withdrawal_label_usd')?><span class="text-danger">*</span></label>
							 	<div class="input-group mb-2">
							        <div class="input-group-prepend">
							          	<div class="input-group-text">IDR</div>
							        </div>
							        <input type="text" name="amount_get_wd" class="form-control" id="amount_get_wd" readonly>
						      	</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn_submit_profile btn btn-success" id="biodata"><i class="fa fa-save mr-2"></i><?=lang_line('button_save')?></button>
				</form>
			</div>
		</div>
	</div>
</div>