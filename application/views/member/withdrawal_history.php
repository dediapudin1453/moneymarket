<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title">Withdrawal your history</h4>
		</div>
	</div>
</div>
<a href="<?= member_url('withdrawal/?t=request') ?>" class="btn btn-warning rounded-pill mb-3"><i class="uil uil-money-withdrawal"></i> Request Withdrawal</a>

<?php echo $this->alert->show($this->mod); ?>
<?= $this->session->flashdata('pesan') ?>
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
								<th>Date</th>
								<th>Bank</th>
								<th>Amount</th>
								<th>Rate</th>
								<th>Amount USD</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($wd as $key => $value) { ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= date('d-m-Y', strtotime($value['date'])) ?></td>
									<td><?= $value['bank_name'] ?></td>
									<td>IDR <?= number_format($value['amount']) ?></td>
									<td>IDR <?= number_format($value['rate_amount']) ?></td>
									<td>USD <?= number_format($value['amount_usd'], 2, '.', ',') ?></td>
									<td><?= $value['status'] ?></td>
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

<?php echo $this->alert->show($this->mod); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="pull-left">
					<h5 class="card-title">Withdrawal History</h5>
				</div>
				<div class="pull-right">
					<a href="<?= member_url('withdrawal/?t=request') ?>"><button type="button" class="btn btn-primary"> <i class="fa fa-plus"></i> Withdrawal</button></a>
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
								<th>Date</th>
								<th>Bank</th>
								<th>Amount</th>
								<th>Rate</th>
								<th>Amount USD</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($wd as $key => $value) { ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= date('d-m-Y', strtotime($value['date'])) ?></td>
									<td><?= $value['bank_name'] ?></td>
									<td>IDR <?= number_format($value['amount']) ?></td>
									<td>IDR <?= number_format($value['rate_amount']) ?></td>
									<td>USD <?= number_format($value['amount_usd'], 2, '.', ',') ?></td>
									<td><?= $value['status'] ?></td>
								</tr>
							<?php $no++;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>