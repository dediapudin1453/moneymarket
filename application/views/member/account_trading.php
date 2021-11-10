<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title">Your account trade</h4>
		</div>
	</div>
</div>
<a href="<?= member_url('account_trading/account_request') ?>" class="btn btn-warning rounded-pill mb-3"><i class="mdi mdi-plus"></i> Request account trade</a>
<?php echo $this->alert->show($this->mod); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="card ribbon-box">
			<div class="card-body">
				<div class="ribbon-content">
					<table class="table table-striped table-centered mb-0">
						<thead>
							<tr>
								<th class="no-sort text-center">
									No
								</th>
								<th><?= lang_line('acc_label_acc') ?></th>
								<th><?= lang_line('acc_label_type') ?></th>
								<th><?= lang_line('acc_label_leverage') ?></th>
								<th><?= lang_line('acc_label_amount') ?></th>
								<th><?= lang_line('acc_label_status') ?></th>
								<th><?= lang_line('acc_label_date') ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php $no = 1;
								foreach ($acc as $key => $res) { ?>
							<tr>
								<td class="table-user">
									<?= $no ?>
								</td>
								<td>
									<?= $res['account'] ?>
									<?php if (!empty($res['account'])) { ?>
										<div><span>Password : <?= $res['password'] ?></span>
											<p><span>Password : <?= $res['password_investor'] ?></span>
										</div>
									<?php } ?>

								</td>
								<td>
									<?= $res['type_account'] ?>
								</td>
								<td>
									<?= $res['leverage'] ?>
								</td>
								<td>
									USD <?= number_format($res['amount'], 2) ?>
								</td>
								<td>
									<?= $res['status_request'] ?>
								</td>
								<td>
									<?= date('d-m-Y', strtotime($res['date'])) ?>
								</td>
							</tr>
						<?php $no++;
								} ?>

						</tr>
						</tbody>
					</table>
				</div>
			</div> <!-- end card-body -->
		</div> <!-- end card-->
	</div> <!-- end col -->
</div>
<!-- <div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="pull-left">
					<h5 class="card-title">Personal Account Trade</h5>
				</div>
				<div class="pull-right">
					<a href="<?= member_url('account_trading/account_request') ?>"><button type="button" class="btn btn-primary"> <i class="fa fa-plus"></i> <?= lang_line('acc_label_btnadd') ?></button></a>
				</div>
			</div><br>
			<?= $this->session->flashdata('pesan') ?>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="table_acct">
						<thead>
							<tr>
								<th class="no-sort text-center">
									No
								</th>
								<th><?= lang_line('acc_label_acc') ?></th>
								<th><?= lang_line('acc_label_type') ?></th>
								<th><?= lang_line('acc_label_leverage') ?></th>
								<th><?= lang_line('acc_label_amount') ?></th>
								<th><?= lang_line('acc_label_status') ?></th>
								<th><?= lang_line('acc_label_date') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($acc as $key => $res) { ?>
								<tr>
									<td>
										<?= $no ?>
									</td>
									<td>
										<?= $res['account'] ?>
										<?php if (!empty($res['account'])) { ?>
											<div><span>Password : <?= $res['password'] ?></span>
												<p><span>Password : <?= $res['password_investor'] ?></span>
											</div>
										<?php } ?>

									</td>
									<td>
										<?= $res['type_account'] ?>
									</td>
									<td>
										<?= $res['leverage'] ?>
									</td>
									<td>
										USD <?= number_format($res['amount'], 2) ?>
									</td>
									<td>
										<?= $res['status_request'] ?>
									</td>
									<td>
										<?= date('d-m-Y', strtotime($res['date'])) ?>
									</td>
								</tr>
							<?php $no++;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div> -->