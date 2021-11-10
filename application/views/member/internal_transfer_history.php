<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title">Internal transfer history</h4>
		</div>
	</div>
</div>
<a href="<?= member_url('internal_transfer/?t=request') ?>" class="btn btn-warning rounded-pill mb-3"><i class="mdi mdi-sync-alert"></i> Internal Transfer</a>

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
								<th>From</th>
								<th>To</th>
								<th>Amount</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($internal as $key => $value) { ?>
								<tr>
									<td class="table-user"><?= $no ?></td>
									<td><?= date('d-m-Y', strtotime($value['date'])) ?></td>
									<td><?= $value['from_tf'] ?></td>
									<td><?= $value['to_tf'] ?></td>
									<td>USD <?= number_format($value['amount'], 2, '.', ',') ?></td>
									<td>
										<?php if ($value['status'] == "Approved") {
											echo '<span class="badge badge-success-lighten rounded-pill">Approved</span>';
										} elseif ($value['status'] == "Pending") {
											echo '<span class="badge badge-warning-lighten rounded-pill">Pending</span>';
										} else {
											echo '<span class="badge badge-danger-lighten rounded-pill">Rejected</span>';
										}
										?>
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