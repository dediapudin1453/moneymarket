<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title">Request account trade</h4>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card ribbon-box">
			<div class="card-body">
				<div class="ribbon-content">
					<form action="<?= member_url('account_trading/account_request') ?>" method="post">
						<hr>
						<?php echo $this->alert->show($this->mod); ?>
						<div class="form-group">
							<label><?= lang_line('acc_label_acc') ?> </label>
							<select name="account_type" id="account_type" class="form-control">
								<option value="">-- Choose Account Type --</option>
								<?php foreach ($product as $key => $value) { ?>
									<option value="<?= $value['id'] ?>" name="<?= $value['title'] ?>" leverage="<?= $value['leverage'] ?>"><?= $value['title'] ?></option>
								<?php } ?>
								<input type="hidden" name="acct" id="acct">
								<input type="hidden" name="leverage" id="leverage">
							</select>
						</div><br>
						<div class="form-group">
							<label><?= lang_line('acc_label_leverage') ?></label>
							<div class="form-control" id="leverage2" readonly></div>
						</div>
						<hr>
						<button type="submit" class="btn btn-success"><span>Submit</span> </button>
					</form>
				</div>
			</div> <!-- end card-body -->
		</div> <!-- end card-->
	</div> <!-- end col -->
</div>

<!-- <div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-6">
			<form action="<?= member_url('account_trading/account_request') ?>" method="post">
				<h2><i class="fa fa-upload"></i>Request Account Trading</h2>
				<hr>
				<?php echo $this->alert->show($this->mod); ?>
				<div class="form-group">
					<label><?= lang_line('acc_label_acc') ?> <span class="text-danger">*</span></label>
					<select name="account_type" id="account_type" class="form-control">
						<option value="">--Pilih Tipe Akun--</option>
						<?php foreach ($product as $key => $value) { ?>
							<option value="<?= $value['id'] ?>" name="<?= $value['title'] ?>" leverage="<?= $value['leverage'] ?>"><?= $value['title'] ?></option>
						<?php } ?>
						<input type="hidden" name="acct" id="acct">
						<input type="hidden" name="leverage" id="leverage">
					</select>
				</div>
				<div class="form-group">
					<label><?= lang_line('acc_label_leverage') ?></label>
					<div class="form-control" id="leverage2" readonly></div>
				</div>
				<hr>
				<a href="<?= member_url('account_trading') ?>"><button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button></a>
				<button type="submit" class="btn btn-primary">Submit</button>
				<div class="text-center">
				</div>
			</form>
		</div>
	</div>
</div> -->