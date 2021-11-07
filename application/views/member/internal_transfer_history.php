<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $this->alert->show($this->mod); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<div class="pull-left">
					<h5 class="card-title">Internal Transfer History</h5>
				</div>
				<div class="pull-right">
					<a href="<?= member_url('internal_transfer/?t=request') ?>"><button type="button" class="btn btn-primary">  <i class="fa fa-plus"></i> Internal Transfer</button></a>
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

