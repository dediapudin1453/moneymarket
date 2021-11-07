<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $this->alert->show($this->mod); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<h5 class="card-title">History Deposit</h5>
				<div class="pull-right">
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
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
								$no=1;
								foreach ($deposit as $key => $value) { ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= date('d-m-Y', strtotime($value['date'])) ?></td>
										<td><?= $value['bank_name'] ?></td>
										<td>IDR <?= number_format($value['amount']) ?></td>
										<td>IDR <?= number_format($value['rate_amount']) ?></td>
										<td>USD <?= number_format($value['amount_usd'],2,'.',',') ?></td>
										<td><?= $value['status'] ?></td>
									</tr>
								<?php $no++; 
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<hr>
		<div class="card ">
			<div class="card-header">
				<h5 class="card-title">History Withdrawal</h5>
				<div class="pull-right">
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
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
								$no=1;
								foreach ($wd as $key => $value) { ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= date('d-m-Y', strtotime($value['date'])) ?></td>
										<td><?= $value['bank_name'] ?></td>
										<td>IDR <?= number_format($value['amount']) ?></td>
										<td>IDR <?= number_format($value['rate_amount']) ?></td>
										<td>USD <?= number_format($value['amount_usd'],2,'.',',') ?></td>
										<td><?= $value['status'] ?></td>
									</tr>
								<?php $no++; 
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<hr>
		<div class="card ">
			<div class="card-header">
				<h5 class="card-title">History Internal Transfer</h5>
				<div class="pull-right">
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th class="no-sort text-center">
									No
								</th>
								<th>Date</th>
								<th>From</th>
								<th>To</th>
								<th>Amount</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$no=1;
								foreach ($internal as $key => $value) { ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= date('d-m-Y', strtotime($value['date'])) ?></td>
										<td><?= $value['from_tf'] ?></td>
										<td><?= $value['to_tf'] ?></td>
										<td>USD <?= number_format($value['amount'],2,'.',',') ?></td>
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