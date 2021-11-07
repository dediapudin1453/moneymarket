<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
	<?= $this->alert->show($this->mod); ?>
	<div class="row">
          <div class="col-md-4">
            <div class="card card-user no-padding">
              <div class="image">
              	<div class="btn_edit_photo" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-camera"></i> <?=lang_line('edit_photo')?></div>
                <img src="<?=content_url('plugins/linggafx.com/img/bg1.jpg')?>" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                    <img class="avatar border-gray" src="<?=user_photo(data_login('member', 'photo'));?>" alt="...">
                    <h5 class="title"><?=$row['name'];?></h5>
                  <p class="">
                    <?=$row['email'];?>
                  </p>
                </div>
                <p class="text-center">
                  <?=$row['about'];?>
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-12 col-md-6 col-6 ml-auto">
                      <h5>Join date<br><small><?php echo date('m-Y'); ?></small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">My Profile</h5>
              </div>
              <ul class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-center" id="myTab" role="tablist">
				<li class="nav-item">
				    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><?=lang_line('account_title');?></a>
				</li>
				<li class="nav-item">
				    <a class="nav-link" id="id-tab" data-toggle="tab" href="#identitas" role="tab" aria-controls="identitas" aria-selected="false"><?=lang_line('account_title_id');?></a>
				</li>
				<li class="nav-item">
				    <a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="false"><?=lang_line('account_title_bank');?></a>
				 </li>
			</ul>
			<?= $this->session->flashdata('pesan') ?>
			<!-- start : content tab -->
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="card">
						<div class="card-body">
							<form class="form" action="<?= member_url('account/update_id') ?>" method="POST" id="form_profile">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title"><?=lang_line('account_title');?></h4>
									</div>
									<div class="card-body">
										<div class="row mb-3">
											<!-- email -->
											<div class="col-md-6">
												<div class="form-group">
													<label><?=lang_line('account_label_email');?> <small class="text-danger">*</small></label>
													<input type="text" name="email" class="form-control" disabled value="<?=$row['email'];?>" maxlength="50">
												</div>
											</div>
											<!--/ email -->
											<!-- username -->
											<div class="col-md-6">
												<div class="form-group">
													<label><?=lang_line('account_label_name');?> <small class="text-danger">*</small></label>
													<input type="text" name="name" class="form-control" value="<?=$row['name'];?>" maxlength="20">
													
												</div>
											</div>
											<!--/ username -->
										</div>
										<!-- Phone -->
										<div class="row mb-3">
											<div class="col-md-6">
												<div class="form-group">
													<label><?=lang_line('account_label_tlpn');?> <small class="text-danger">*</small></label>
													<div class="input-group">
														<input type="text" name="tlpn" class="form-control" value="<?=$row['tlpn'];?>">
														<div class="input-group-append">
															<span class="input-group-text"><i class="fa fa-phone"></i></span>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label><?=lang_line('account_label_birthday');?> <small class="text-danger">*</small></label>
													<div class="input-group">
														<input type="text" id="datepicker" name="birthday" class="form-control" value="<?=$row['birthday'];?>" required>
														<div class="input-group-append">
															<span class="input-group-text"><i class="fa fa-calendar"></i></span>
														</div>
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
													<!-- <textarea name="about" class="form-control" rows="3"><?=$row['about'];?></textarea> -->
													<input type="text" name="about" class="form-control" value="<?=$row['about'];?>" maxlength="50">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label><?=lang_line('account_label_gender');?></label>
													<div class="rows">
														<?php
															$gender = ( $row['gender'] == 'M' ? 'Male':'Female'  );
														?>
														<?php if ( $row['gender'] == 'M' ): ?>	
															<div class="pull-left" style="width:100px;">
																<input id="male" type="radio" name="gender" value="M" checked="">
																<label for="male">Laki-laki</label>
															</div>
															<div class="pull-left" style="width:100px;">
																<input id="female" type="radio" name="gender" value="F">
																<label for="female">Perempuan</label>
															</div>
														<?php else: ?>
															<div class="pull-left" style="width:100px;">
																<input id="male" type="radio" name="gender" value="M" >
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
													<label><?=lang_line('account_label_address');?></label>
													<textarea name="address" class="form-control" rows="3"><?=$row['address'];?></textarea>
												</div>
											</div>
										</div>
										<!-- Address -->
										<hr>
										<button type="submit" class="btn_submit_profile btn btn-success"><i class="fa fa-save mr-2"></i><?=lang_line('button_save')?></button>
										<div class="clearfix"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="identitas" role="tabpanel" aria-labelledby="identitas-tab">
					<div class="card">
						<div class="card-body">
							<form class="form" action="<?= member_url('account/update_id') ?>" method="POST" enctype="multipart/form-data">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title"><?=lang_line('account_title_id');?></h4>
									</div>
									<div class="card-body">
										<!-- KTP -->
										<div class="row mb-3">
											
											<div class="col-md-6">
												<div class="form-group">
													<label><?=lang_line('account_label_idtype');?></label>
													<select name="id_type" class="form-control">
														<option value="KTP" <?php if ($row['id_type']=="KTP") {
															echo "selected";
														} ?>>KTP</option>
														<option value="SIM" <?php if ($row['id_type']=="SIM") {
															echo "selected";
														} ?>>SIM</option>
														<option value="Passport" <?php if ($row['id_type']=="Passport") {
															echo "selected";
														} ?>>Passport</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
											<div class="form-group">
													<label><?=lang_line('account_label_idno');?></label>
													<input type="number" name="id_number" class="form-control" value="<?= $row['id_number'] ?>" maxlength="50">
												</div>
											</div>
										</div>
										<!--/ KTP -->

										<!-- Upload KTP -->
										<div class="row mb-3">
											
											<div class="col-md-12">
												<div class="form-group">
													<label><?=lang_line('account_label_idupload');?></label>
													<input type="file" name="foto" class="form-control" value="" maxlength="50">
													<?php if (!empty($row['id_photo'])) { ?>
														<img src="<?= site_url('content/uploads/user/'.$row['id_photo']) ?>">
													<?php } ?>
												</div>
											</div>
										</div>
										<hr>
										<button type="submit" class="btn_submit_profile btn btn-success"><i class="fa fa-save mr-2"></i><?=lang_line('button_save')?></button>
										<div class="clearfix"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
				  	<form class="form" action="<?= member_url('account/update_bank') ?>" method="POST">
						<div class="card">
							<div class="card-header ">
								<h4 class="card-title"><?=lang_line('account_title_bank');?></h4>
							</div>
							<div class="card-body">
								<form class="form" id="form_profile">
										<div class="card">
											<div class="card-header ">
												<h4 class="card-title">Your <?=lang_line('account_title');?>  </h4>
											</div>
											<div class="card-body">
												<div class="row mb-3">
													<!-- bank -->
													<div class="col-md-6">
														<div class="form-group">
															<label><?=lang_line('account_label_bank');?> Method<small class="text-danger">*</small></label>
															<input type="text" name="bank" class="form-control" value="<?php if(!empty($row_bank['bank_name'])){ echo $row_bank['bank_name']; }?>"  maxlength="50">
															<input type="hidden" name="idbank" value="<?php if(!empty($row_bank['id'])){ echo encrypt($row_bank['id']); }  ?>">
														</div>
													</div>
													<!--/ bank -->
													<!-- no rekening -->
													<div class="col-md-6">
														<div class="form-group">
															<label><?=lang_line('account_label_rekening');?><small class="text-danger">*</small></label>
															<input type="number" name="norekening" class="form-control" value="<?php if(!empty($row_bank['acc_number'])){ echo $row_bank['acc_number']; }?>" maxlength="20">
															
														</div>
													</div>
													<!--/ no rekening -->
												</div>
												<div class="row mb-3">
													<!-- nama pemilik rekening -->
													<div class="col-md-6">
														<div class="form-group">
															<label><?=lang_line('account_label_pemilik');?><small class="text-danger">*</small></label>
															<input type="text" name="pemilik" class="form-control" value="<?php if(!empty($row_bank['owner_name'])){ echo $row_bank['owner_name']; }?>" maxlength="150">
														</div>
													</div>
													<!--/ bank -->
													<!-- no rekening -->
													<div class="col-md-6">
														<div class="form-group">
															<label><?=lang_line('account_label_cabang');?><small class="text-danger">*</small></label>
															<input type="text" name="cabang" class="form-control" value="<?php if(!empty($row_bank['branch'])){ echo $row_bank['branch']; };?>" maxlength="50">
															
														</div>
													</div>
													<!--/ no rekening -->
												</div>
									
												<hr>
												<button type="submit" class="btn_submit_profile btn btn-success"><i class="fa fa-save mr-2"></i><?=lang_line('button_save')?></button>
												<div class="clearfix"></div>
											</div>
										</div>
								</form>
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
					<h5 class="modal-title"><i class="fa fa-camera mr-2"></i> <?=lang_line('edit_photo')?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php echo form_open_multipart(); ?>
					<div class="modal-body">
						<div class="form-group">
							<!-- Picture -->
							<div class="text-center mb-2">
								<img id="image-preview" src="<?=user_photo(data_login('member','photo'));?>" class="imgprv" style="max-width:200px;">
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
						<button type="submit" class="btn btn-primary upload"><i class="fa fa-upload mr-2"></i> <?=lang_line('button_upload')?></button>
						<button type="button" class="btn btn-danger delete_photo"><i class="fa fa-trash mr-2"></i> <?=lang_line('button_delete')?></button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-sign-out"></i>  <?=lang_line('button_cancel')?></button>
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
								<img id="image-preview" src="<?=user_photo(data_login('member','photo'));?>" class="imgprv" style="max-width:200px;">
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
						<button type="submit" class="btn btn-primary upload"><i class="fa fa-upload mr-2"></i> <?=lang_line('button_upload')?></button>
						<button type="button" class="btn btn-danger delete_photo"><i class="fa fa-trash mr-2"></i> <?=lang_line('button_delete')?></button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-sign-out"></i>  <?=lang_line('button_cancel')?></button>
					</div>
			<?php echo form_close(); ?>
    </div>
  </div>
</div>