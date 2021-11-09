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

						<h4 class="mb-0 mt-2"><?= data_login('member', 'name'); ?></h4>
						<p class="text-muted font-14">Founder</p>


						<div class="text-start mt-3">
							<h4 class="font-13 text-uppercase">About Me :</h4>
							<p class="text-muted font-13 mb-3">
								Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
								1500s, when an unknown printer took a galley of type.
							</p>
							<p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">Geneva
									D. McKnight</span></p>

							<p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">(123)
									123 1234</span></p>

							<p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">user@email.domain</span></p>

							<p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
						</div>
					</div> <!-- end card-body -->
				</div> <!-- end card -->


			</div> <!-- end col-->

			<div class="col-xl-8 col-lg-7">
				<div class="card">
					<div class="card-body">
						<ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
							<li class="nav-item">
								<a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
									About
								</a>
							</li>
							<li class="nav-item">
								<a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
									Timeline
								</a>
							</li>
							<li class="nav-item">
								<a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
									Settings
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane" id="aboutme">
								<form>
									<h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="firstname" class="form-label">First Name</label>
												<input type="text" class="form-control" id="firstname" placeholder="Enter first name">
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="lastname" class="form-label">Last Name</label>
												<input type="text" class="form-control" id="lastname" placeholder="Enter last name">
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->

									<div class="row">
										<div class="col-12">
											<div class="mb-3">
												<label for="userbio" class="form-label">Bio</label>
												<textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->

									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="useremail" class="form-label">Email Address</label>
												<input type="email" class="form-control" id="useremail" placeholder="Enter email">
												<span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="userpassword" class="form-label">Password</label>
												<input type="password" class="form-control" id="userpassword" placeholder="Enter password">
												<span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->

									<div class="text-end">
										<button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
									</div>
								</form>

								<!-- end profile member -->


							</div> <!-- end tab-pane -->
							<!-- end about me section content -->

							<div class="tab-pane show active" id="timeline">

								<!-- comment box -->
								<div class="border rounded mt-2 mb-3">
									<form action="#" class="comment-area-box">
										<textarea rows="3" class="form-control border-0 resize-none" placeholder="Write something...."></textarea>
										<div class="p-2 bg-light d-flex justify-content-between align-items-center">
											<div>
												<a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-account-circle"></i></a>
												<a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-map-marker"></i></a>
												<a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-camera"></i></a>
												<a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-emoticon-outline"></i></a>
											</div>
											<button type="submit" class="btn btn-sm btn-dark waves-effect">Post</button>
										</div>
									</form>
								</div> <!-- end .border-->
								<!-- end comment box -->



							</div>
							<!-- end timeline content-->

							<div class="tab-pane" id="settings">
								<form>
									<h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="firstname" class="form-label">First Name</label>
												<input type="text" class="form-control" id="firstname" placeholder="Enter first name">
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="lastname" class="form-label">Last Name</label>
												<input type="text" class="form-control" id="lastname" placeholder="Enter last name">
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->

									<div class="row">
										<div class="col-12">
											<div class="mb-3">
												<label for="userbio" class="form-label">Bio</label>
												<textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->

									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label for="useremail" class="form-label">Email Address</label>
												<input type="email" class="form-control" id="useremail" placeholder="Enter email">
												<span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="mb-3">
												<label for="userpassword" class="form-label">Password</label>
												<input type="password" class="form-control" id="userpassword" placeholder="Enter password">
												<span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->


									<div class="text-end">
										<button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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

	<!-- Footer Start -->
	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<script>
						document.write(new Date().getFullYear())
					</script> © Hyper - Coderthemes.com
				</div>
				<div class="col-md-6">
					<div class="text-md-end footer-links d-none d-md-block">
						<a href="javascript: void(0);">About</a>
						<a href="javascript: void(0);">Support</a>
						<a href="javascript: void(0);">Contact Us</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end Footer -->

</div> <!-- content-page -->

<div class="container">
	<?= $this->alert->show($this->mod); ?>
	<div class="row">
		<div class="col-md-4">
			<div class="card card-user no-padding">
				<div class="image">
					<div class="btn_edit_photo" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-camera"></i> <?= lang_line('edit_photo') ?></div>
					<img src="<?= content_url('plugins/linggafx.com/img/bg1.jpg') ?>" alt="...">
				</div>
				<div class="card-body">
					<div class="author">
						<img class="avatar border-gray" src="<?= user_photo(data_login('member', 'photo')); ?>" alt="...">
						<h5 class="title"><?= $row['name']; ?></h5>
						<p class="">
							<?= $row['email']; ?>
						</p>
					</div>
					<p class="text-center">
						<?= $row['about']; ?>
					</p>
				</div>
				<div class="card-footer">
					<hr>
					<div class="button-container">
						<div class="row">
							<div class="col-lg-12 col-md-6 col-6 ml-auto">
								<?php if ($row['join_date'] === '0000-00-00') {
									$join_date = '-';
								} else {
									$join_date = date('d-m-Y', strtotime($row['join_date']));
								} ?>
								<h5>Join date<br><small><?php echo $join_date; ?></small></h5>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
				</div>
				<ul class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-center" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="id-tab" data-toggle="tab" href="#identitas" role="tab" aria-controls="identitas" aria-selected="false"><?= lang_line('account_title_id'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="false"><?= lang_line('account_title_bank'); ?></a>
					</li>
				</ul>

				<!-- start : content tab -->
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="card-body">
							<?= $this->session->flashdata('pesan') ?>
							<form class="form" action="<?= member_url('account/update_account') ?>" method="POST">
								<div class="card-header ">
									<h4 class="card-title">Profile</h4>
								</div>
								<div class="row mb-3">
									<!-- email -->
									<div class="col-md-6">
										<div class="form-group">
											<label><?= lang_line('account_label_email'); ?> <small class="text-danger">*</small></label>
											<input type="text" name="email" class="form-control" value="<?= $row['email']; ?>" maxlength="50">
										</div>
									</div>
									<!--/ email -->
									<!-- username -->
									<div class="col-md-6">
										<div class="form-group">
											<label><?= lang_line('account_label_name'); ?> <small class="text-danger">*</small></label>
											<input type="text" name="name" class="form-control" value="<?= $row['name']; ?>" maxlength="20">

										</div>
									</div>
									<!--/ username -->
								</div>
								<!-- Phone -->
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label><?= lang_line('account_label_tlpn'); ?> <small class="text-danger">*</small></label>
											<div class="input-group">
												<input type="text" name="tlpn" class="form-control" value="<?= $row['tlpn']; ?>">
												<div class="input-group-append">
													<span class="input-group-text"><i class="fa fa-phone"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label><?= lang_line('account_label_birthday'); ?> <small class="text-danger">*</small></label>
											<div class="input-group">
												<input type="date" id="datepicker datetimepicker" name="birthday" class="form-control" value="<?= $row['birthday']; ?>" required>
												<!-- <div class="input-group-append">
													<span class="input-group-text"><i class="fa fa-calendar"></i></span>
												</div> -->
											</div>
										</div>
									</div>
								</div>
								<!--/ Phone -->
								<!-- Gender -->
								<div class="row mb-3">

									<div class="col-md-6">
										<div class="form-group">
											<label>My Job</label>
											<!-- <textarea name="about" class="form-control" rows="3"><?= $row['about']; ?></textarea> -->
											<input type="text" name="about" class="form-control" value="<?= $row['about']; ?>" maxlength="50">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label><?= lang_line('account_label_gender'); ?></label>
											<div class="rows">
												<?php
												$gender = ($row['gender'] == 'M' ? 'Male' : 'Female');
												?>
												<?php if ($row['gender'] == 'M') : ?>
													<div class="pull-left" style="width:100px;">
														<input id="male" type="radio" name="gender" value="M" checked="">
														<label for="male">Laki-laki</label>
													</div>
													<div class="pull-left" style="width:100px;">
														<input id="female" type="radio" name="gender" value="F">
														<label for="female">Perempuan</label>
													</div>
												<?php else : ?>
													<div class="pull-left" style="width:100px;">
														<input id="male" type="radio" name="gender" value="M">
														<label for="male">Laki-laki</label>
													</div>
													<div class="pull-left" style="width:100px;">
														<input id="female" type="radio" name="gender" value="F" checked>
														<label for="female">Perempuan</label>
													</div>
												<?php endif ?>
											</div>
										</div>
									</div>
								</div>
								<!--/ Gender -->
								<!-- Address -->
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="form-group">
											<label><?= lang_line('account_label_address'); ?></label>
											<textarea name="address" class="form-control" rows="3"><?= $row['address']; ?></textarea>
										</div>
									</div>
								</div>
								<!-- Address -->
								<button type="submit" class="btn_submit_profile btn btn-success"><i class="fa fa-save mr-2"></i><?= lang_line('button_save') ?></button>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
					<div class="tab-pane fade" id="identitas" role="tabpanel" aria-labelledby="identitas-tab">
						<div class="card">
							<div class="card-body">
								<form class="form" action="<?= member_url('account/update_id') ?>" method="POST" enctype="multipart/form-data">
									<div class="card">
										<div class="card-header ">
											<h4 class="card-title"><?= lang_line('account_title_id'); ?></h4>
										</div>
										<div class="card-body">
											<!-- KTP -->
											<div class="row mb-3">

												<div class="col-md-6">
													<div class="form-group">
														<label><?= lang_line('account_label_idtype'); ?></label>
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
													<div class="form-group">
														<label><?= lang_line('account_label_idno'); ?></label>
														<input type="number" name="id_number" class="form-control" value="<?= $row['id_number'] ?>" maxlength="50">
													</div>
												</div>
											</div>
											<!--/ KTP -->

											<!-- Upload KTP -->
											<div class="row mb-3">
												<div class="col-md-12">
													<div class="form-group">
														<input type="file" name="foto" class="form-control" value="" maxlength="50">
														<?php if (!empty($row['id_photo'])) { ?>
															<img src="<?= site_url('content/uploads/user/' . $row['id_photo']) ?>">
														<?php } ?>
													</div>
												</div>
											</div>
											<div class="picture-container">
												<div class="picture">
													<img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="">
													<input type="file" name="foto" class="form-control" id="wizard-picture">
												</div>
											</div>
											<hr>
											<button type="submit" class="btn_submit_profile btn btn-success"><i class="fa fa-save mr-2"></i><?= lang_line('button_save') ?></button>
											<div class="clearfix"></div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
						<form class="form" action="<?= member_url('account/update_bank') ?>" method="POST">
							<div class="card-header ">
							</div>
							<div class="card-body">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Your <?= lang_line('account_title'); ?> Bank </h4>
									</div>
									<div class="card-body">
										<div class="row mb-3">
											<!-- bank -->
											<div class="col-md-6">
												<div class="form-group">
													<label><?= lang_line('account_label_bank'); ?> Method<small class="text-danger">*</small></label>
													<input type="text" name="bank" class="form-control" value="<?php if (!empty($row_bank['bank_name'])) {
																													echo $row_bank['bank_name'];
																												} ?>" maxlength="50">
													<input type="hidden" name="idbank" value="<?php if (!empty($row_bank['id'])) {
																									echo encrypt($row_bank['id']);
																								}  ?>">
												</div>
											</div>
											<!--/ bank -->
											<!-- no rekening -->
											<div class="col-md-6">
												<div class="form-group">
													<label><?= lang_line('account_label_rekening'); ?><small class="text-danger">*</small></label>
													<input type="number" name="norekening" class="form-control" value="<?php if (!empty($row_bank['acc_number'])) {
																															echo $row_bank['acc_number'];
																														} ?>" maxlength="20">

												</div>
											</div>
											<!--/ no rekening -->
										</div>
										<div class="row mb-3">
											<!-- nama pemilik rekening -->
											<div class="col-md-6">
												<div class="form-group">
													<label><?= lang_line('account_label_pemilik'); ?><small class="text-danger">*</small></label>
													<input type="text" name="pemilik" class="form-control" value="<?php if (!empty($row_bank['owner_name'])) {
																														echo $row_bank['owner_name'];
																													} ?>" maxlength="150">
												</div>
											</div>
											<!--/ bank -->
											<!-- no rekening -->
											<div class="col-md-6">
												<div class="form-group">
													<label><?= lang_line('account_label_cabang'); ?><small class="text-danger">*</small></label>
													<input type="text" name="cabang" class="form-control" value="<?php if (!empty($row_bank['branch'])) {
																														echo $row_bank['branch'];
																													}; ?>" maxlength="50">

												</div>
											</div>
											<!--/ no rekening -->
										</div>
										<button type="submit" class="btn_submit_profile btn btn-success"><i class="fa fa-save mr-2"></i><?= lang_line('button_save') ?></button>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- end : content tab -->
			</div>
		</div>
	</div>
</div>

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
					<!-- <div class="custom-file">
								<input id="picture" type="file" accept="image/*" name="fupload" class="custom-file-input" required>
								<label class="custom-file-label" for="picture">
									<span class="d-inline-block text-truncate w-75">Chose image...</span>
								</label>
							</div> -->
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