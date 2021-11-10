<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php echo $this->alert->show($this->mod); ?>
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title">Referral</h4>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card ribbon-box ">
			<div class="card-body">
				<div class="ribbon ribbon-info float-start"><i class="mdi mdi-access-point me-1"></i>Share and reffer your friends</div>
				<input type="text" class="form-control" value="<?= member_url() ?>register/?ref=<?= $link['username'] ?>" id="referral" readonly> <br>
				<!-- <button onclick="copy_data()" class="btn_submit_profile btn btn-success"><i class="fa fa-save mr-2"></i>Click to copy</button> -->

			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-body">
				<table class="table table-striped table-centered mb-0">
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
						<?php $no = 1;
						foreach ($referral as $key => $value) { ?>
							<tr>
								<td class="table-user"><?= $no ?></td>
								<td><?= $value['name'] ?></td>
								<td><?= $value['username'] ?></td>
								<td><?= $value['email'] ?></td>
								<td><?= $value['tlpn'] ?></td>
							</tr>
						<?php $no++;
						} ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>