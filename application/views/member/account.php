<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="content-page">
	<div class="content">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
							<li class="breadcrumb-item active">Profile</li>
						</ol>
					</div>
					<h4 class="page-title">Profile</h4>
				</div>
			</div>
		</div>
		<!-- end page title -->

		<div class="row">
			<div class="col-xl-4 col-lg-5">
				<div class="card text-center">
					<div class="card-body">
						<img src="<?= user_photo(data_login('member', 'photo')); ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

						<h4 class="mb-0 mt-2"><?= data_login('member', 'name'); ?></h4><br>
						<!-- Photo modal-->
						<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#photo-modal">Change Photo</button>
						<div id="photo-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">

									<div class="modal-body">
										<?php echo form_open_multipart(); ?>
										<div class="modal-body">
											<div class="form-group">
												<!-- Picture -->
												<div class="text-center mb-2">
													<img id="image-preview" src="<?= user_photo(data_login('member', 'photo')); ?>" class="imgprv" style="max-width:200px;">
												</div>
												<div class="picture">
													<input type="file" accept="image/*" name="fupload" class="form-control">
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary upload">Save changes</button>
										</div>
										<?php echo form_close(); ?>

									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
						<div class="text-start mt-3">
							<h4 class="font-13 text-uppercase"><?= lang_line('account_label_aboutme'); ?> :</h4>
							<p class="text-muted font-13 mb-3">
								<?= $row['about']; ?>

							</p>

							<p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2"><?= $row['tlpn']; ?></span></p>

							<p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 "><?= $row['email']; ?></span></p>

							<p class="text-muted mb-1 font-13"><strong>Join Date :</strong> <span class="ms-2"><?php if ($row['join_date'] === '0000-00-00') {
																													$join_date = '-';
																												} else {
																													$join_date = date('d-m-Y', strtotime($row['join_date']));
																												} ?><?php echo $join_date; ?></span></p>
						</div>
					</div> <!-- end card-body -->
				</div> <!-- end card -->


			</div> <!-- end col-->

			<div class="col-xl-8 col-lg-7">
				<div class="card">
					<div class="card-body">
						<ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
							<li class="nav-item">
								<a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
									<?= lang_line('account_title_profile'); ?>
								</a>
							</li>
							<li class="nav-item">
								<a href="#identity_id" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 ">
									<?= lang_line('account_title_id'); ?>
								</a>
							</li>
							<li class="nav-item">
								<a href="#bank" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
									<?= lang_line('account_title_bank'); ?>
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane show active" id="aboutme">
								<?= $this->session->flashdata('pesan') ?>
								<form action="<?= member_url('account/update_account') ?>" method="POST">
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="name" class="form-label"><?= lang_line('account_label_name'); ?></label>
												<input type="text" class="form-control" name="name" id="name" value="<?= $row['name']; ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="email" class="form-label"><?= lang_line('account_label_email'); ?></label>
												<input type="text" class="form-control" name="email" id="email" value="<?= $row['email']; ?>">
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->

									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="tlpn" class="form-label"><?= lang_line('account_label_tlpn'); ?> </label>
												<input type="text" class="form-control" name="tlpn" maxlength="14" value="<?= $row['tlpn']; ?>">
												<span class="font-13 text-muted">e.g "81x xxx xxx xxx without "0"</span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="birthday" class="form-label"><?= lang_line('account_label_birthday'); ?></label>
												<input type="date" id="datepicker datetimepicker" class="form-control" name="birthday" id="birthday" value="<?= $row['birthday']; ?>">
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->



									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="username" class="form-label"><?= lang_line('account_label_username'); ?> </label>
												<input type="text" class="form-control" name="username" id="tlpn" value="<?= $row['username']; ?>" disabled>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="birthday" class="form-label"><?= lang_line('account_label_gender'); ?></label>
												<?php
												$gender = ($row['gender'] == 'M' ? 'Male' : 'Female');
												?>
												<?php if ($row['gender'] == 'M') : ?>
													<div class="pull-left" style="width:100px;">
														<input id="male" type="radio" name="gender" value="M" checked="">
														<label for="male">Man</label>
													</div>
													<div class="pull-left" style="width:100px;">
														<input id="female" type="radio" name="gender" value="F">
														<label for="female">Women</label>
													</div>
												<?php else : ?>
													<div class="pull-left" style="width:100px;">
														<input id="male" type="radio" name="gender" value="M">
														<label for="male">Man</label>
													</div>
													<div class="pull-left" style="width:100px;">
														<input id="female" type="radio" name="gender" value="F" checked>
														<label for="female">Women</label>
													</div>
												<?php endif ?>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->

									<div class="row">
										<div class="col-md-12">
											<div class="mb-3">
												<label for="address" class="form-label"><?= lang_line('account_label_address'); ?> </label>
												<input type="text" class="form-control" name="address" id="address" value="<?= $row['address']; ?>">
											</div>
										</div>
									</div> <!-- end row -->

									<div class=" row">
										<div class="col-12">
											<div class="mb-3">
												<label for="userbio" class="form-label">Bio</label>
												<textarea class="form-control" name="about" id="about" rows="4"> <?= $row['about']; ?> </textarea>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->

									<div class="text-end">
										<button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> <?= lang_line('button_save') ?></button>
									</div>
								</form>
								<!-- end profile member -->

							</div> <!-- end tab-pane -->
							<!-- end about me section content -->

							<div class="tab-pane" id="identity_id">
								<form class="form" action="<?= member_url('account/update_id') ?>" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="bank" class="form-label"><?= lang_line('account_label_idtype'); ?></label>
												<select name="id_type" class="form-control">
													<option value="KTP" <?php if ($row['id_type'] == "KTP") {
																			echo "selected";
																		} ?>>KTP</option>
													<option value="SIM" <?php if ($row['id_type'] == "SIM") {
																			echo "selected";
																		} ?>>SIM</option>
													<option value="Passport" <?php if ($row['id_type'] == "Passport") {
																					echo "selected";
																				} ?>>Passport</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="id_number" class="form-label"><?= lang_line('account_label_idno'); ?></label>
												<input type="number" class="form-control" name="id_number" id="id_number" value="<?= $row['id_number']; ?>">
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->

									<div class="row">
										<div class="col-md-12">
											<div class="mb-3">
												<label for="id_photo" class="form-label"><?= lang_line('account_label_idupload'); ?> </label>
												<?php if (!empty($row['id_photo'])) { ?>
													<img src="<?= site_url('content/uploads/user/' . $row['id_photo']) ?>">
												<?php } ?>
											</div>
										</div>
									</div> <!-- end row -->

									<input type="file" name="foto" class="form-control" value="" maxlength="50">
									<!-- <?php if (!empty($row['id_photo'])) { ?>
										<img src="<?= site_url('content/uploads/user/' . $row['id_photo']) ?>">
									<?php } ?> -->

									<div class="text-end">
										<button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
									</div>
								</form>
							</div>
							<!-- end timeline content-->

							<div class="tab-pane" id="bank">
								<form action="<?= member_url('account/update_bank'); ?>" method="POST">
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="bank" class="form-label"><?= lang_line('account_label_bank'); ?></label>
												<input type="text" name="bank" id="bank" class="form-control" value="<?php if (!empty($row_bank['bank_name'])) {
																															echo $row_bank['bank_name'];
																														} ?>" maxlength="50">
												<input type="hidden" name="idbank" value="<?php if (!empty($row_bank['id'])) {
																								echo encrypt($row_bank['id']);
																							}  ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="norekening" class="form-label"><?= lang_line('account_label_rekening'); ?></label>
												<input type="number" class="form-control" name="norekening" id="norekening" value="<?php if (!empty($row_bank['acc_number'])) {
																																		echo $row_bank['acc_number'];
																																	} ?>">
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->

									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="pemilik" class="form-label"><?= lang_line('account_label_pemilik'); ?></label>
												<input type="text" name="pemilik" class="form-control" value="<?php if (!empty($row_bank['owner_name'])) {
																													echo $row_bank['owner_name'];
																												} ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="cabang" class="form-label"><?= lang_line('account_label_cabang'); ?></label>
												<input type="text" class="form-control" name="cabang" id="cabang" value="<?php if (!empty($row_bank['branch'])) {
																																echo $row_bank['branch'];
																															}; ?>">
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->


									<div class="text-end">
										<button type="submit" name="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
									</div>
								</form>
							</div>
							<!-- end settings content-->

						</div> <!-- end tab-content -->
					</div> <!-- end card body -->
				</div> <!-- end card -->
			</div> <!-- end col -->
		</div>
		<!-- end row-->

	</div> <!-- End Content -->

</div> <!-- content-page -->


<!-- modal edit photo -->
<div id="modal_edit_photo" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fa fa-camera mr-2"></i> <?= lang_line('edit_photo') ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php echo form_open_multipart(); ?>
				<div class="modal-body">
					<div class="form-group">
						<!-- Picture -->
						<div class="text-center mb-2">
							<img id="image-preview" src="<?= user_photo(data_login('member', 'photo')); ?>" class="imgprv" style="max-width:200px;">
						</div>
						<div class="custom-file">
							<input id="picture" type="file" accept="image/*" name="fupload" class="custom-file-input" required>
							<label class="custom-file-label" for="picture">
								<span class="d-inline-block text-truncate w-75">Chose image...</span>
							</label>
						</div>
						<!--/ Picture -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary upload"><i class="fa fa-upload mr-2"></i> <?= lang_line('button_upload') ?></button>
					<button type="button" class="btn btn-danger delete_photo"><i class="fa fa-trash mr-2"></i> <?= lang_line('button_delete') ?></button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-sign-out"></i> <?= lang_line('button_cancel') ?></button>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!--/ modal edit photo -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Photo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php echo form_open_multipart(); ?>
			<div class="modal-body">
				<div class="form-group">
					<!-- Picture -->
					<div class="text-center mb-2">
						<img id="image-preview" src="<?= user_photo(data_login('member', 'photo')); ?>" class="imgprv" style="max-width:200px;">
					</div>
					<div class="picture">
						<input type="file" accept="image/*" name="fupload" class="form-control" value="" id="wizard-picture">
						<!-- Tambahkan class picture di dalam div input type nya -->
					</div>
					<!--/ Picture -->
				</div>
				<div class="picture-container">
					<div class="picture">
						<img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="">
						<input type="file" accept="image/*" name="fupload" class="form-control" id="wizard-picture">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary upload"><i class="fa fa-upload mr-2"></i> <?= lang_line('button_upload') ?></button>
				<button type="button" class="btn btn-danger delete_photo"><i class="fa fa-trash mr-2"></i> <?= lang_line('button_delete') ?></button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-sign-out"></i> <?= lang_line('button_cancel') ?></button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>