<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo $this->alert->show($this->mod); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<h5 class="card-title">Referral</h5>
				<div class="pull-right">
				</div>
			</div>
			<div class="card-body">
				<label>Your link referral</label>
					<input type="text"  class="form-control" value="<?= member_url() ?>register/?ref=<?= $link['username'] ?>" id="referral" readonly> <br>
					<button onclick="copy_data()" class="btn_submit_profile btn btn-success"><i class="fa fa-save mr-2"></i>Click to copy</button><hr>
				<div class="table-responsive">
					<table id="table_referral" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Phone</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($referral as $key => $value) { ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['name'] ?></td>
									<td><?= $value['username'] ?></td>
									<td><?= $value['email'] ?></td>
									<td><?= $value['tlpn'] ?></td>
								</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>