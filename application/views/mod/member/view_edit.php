<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h3>
				<span class="font-weight-semibold"><?php echo lang_line('mod_title'); ?></span>
			</h3>
		</div>
	</div>
	<div class="breadcrumb-line breadcrumb-line-light">
		<div class="breadcrumb">
			<a href="<?php echo admin_url('home'); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> <?php echo lang_line('admin_link_home') ?></a>
			<span class="breadcrumb-item"><?php echo lang_line('mod_title'); ?></span>
			<span class="breadcrumb-item"><?php echo lang_line('mod_title_edit'); ?></span>
		</div>
	</div>
</div>

<div class="content">

	<?php echo $this->alert->show($this->mod);?>
	
	<div class="block">
		<div class="block-header">
			<h2><?php echo lang_line('mod_title_edit');?></h2>
			<div class="pull-right">
				<a href="<?php echo admin_url($this->mod);?>" class="button btn-sm btn-default"><i class="fa fa-arrow-circle-o-left"></i> Member</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?= $this->session->flashdata('msg'); ?>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
					    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" id="id-tab" data-toggle="tab" href="#identitas" role="tab" aria-controls="identitas" aria-selected="false"><?php echo lang_line('form_label_photo');?></a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="false">Bank</a>
					 </li>
					<li class="nav-item">
					    <a class="nav-link" id="level-tab" data-toggle="tab" href="#level" role="tab" aria-controls="level" aria-selected="false">Level & Status Data</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="card">
							<div class="card-body">
								<?php 
									echo form_open_multipart(admin_url($this->mod.'/submit_update_user'),'id="" autocomplete="off"');
									echo form_hidden('act','update');
									echo form_hidden('pk',encrypt($res_user['user_id']));
									echo form_hidden('formtype','profile'); ?>
									<!-- username -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_username');?></label>
										<div class="col-md-4">
											<input type="text" class="form-control" value="<?php echo $res_user['user_username'];?>" disabled>
											<p class="text-danger"><i><small>* <?php echo lang_line('form_label_username_note');?></small></i></p>
										</div>
									</div>
									<!--/ username -->

									<!-- email -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_email');?></label>
										<div class="col-md-4">
											<input type="text" name="email" class="form-control" value="<?php echo $res_user['user_email'];?>"/>
										</div>
									</div>
									<!--/ email -->

									<!-- password -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_password');?></label>
										<div class="col-md-4">
											<input type="password" name="input_password" class="form-control" placeholder="<?php echo lang_line('form_label_pass_placholder');?>">
											<input type="hidden" name="input_password2" value="<?php echo $res_user['user_password'];?>">
											<p><span class="text-danger">*</span> <small class="text-muted"> <?php echo lang_line('form_label_pass_placholder');?></small></p>
										</div>
									</div>
									<!--/ password -->

									<!-- fullname -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_fullname');?></label>
										<div class="col-md-4">
											<input type="text" name="name" value="<?php echo trim(set_value('name')) != "" ? trim(set_value('name')) : $res_user['user_name'];?>" placeholder="ex: Your Name" class="form-control">
										</div>
									</div>
									<!--/ fullname -->

									<!-- birthday -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_birthday');?></label>
										<div class="col-md-4">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-date"><i class="fa fa-calendar"></i></span>
												</div>
												<input type="text" id="input-datepicker" name="birthday" class="form-control" aria-label="Date" aria-describedby="basic-date" value="<?php echo $res_user['user_birthday'];?>" required>
											</div>
										</div>
									</div>
									<!--/ birthday -->

									<!-- gender -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_gender');?></label>
										<div class="col-md-10">
											<div class="form-group pl-0">
												<div class="form-group mb-3 mb-md-2">
													<div class="form-check form-check-inline">
														<label class="form-check-label">
															<input type="radio" class="form-check-input-styled" name="gender" value="M" <?php echo ( $res_user['user_gender'] == 'M' ? 'checked' : '');?> data-fouc>
															Male
														</label>
													</div>
													<div class="form-check form-check-inline">
														<label class="form-check-label">
															<input type="radio" class="form-check-input-styled" name="gender" value="F" <?php echo ( $res_user['user_gender'] == 'F' ? 'checked' : '');?> data-fouc>
															Female
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--/ gender -->

									<!-- Telephone -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_tlpn');?></label>
										<div class="col-md-4">
											<input type="text" name="tlpn" value="<?php echo trim(set_value('tlpn')) != "" ? trim(set_value('tlpn')) : $res_user['user_tlpn'];?>" placeholder="+62 000-0000-0000" class="form-control">
										</div>
									</div>
									<!--/ Telephone -->

									<!-- address -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_address');?></label>
										<div class="col-md-10">
											<textarea name="address" class="form-control"><?php echo trim(set_value('address')) != "" ? trim(set_value('address')) : $res_user['user_address'];?></textarea>
										</div>
									</div>
									<!--/ address -->

									<!-- about -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_about');?></label>
										<div class="col-md-10">
											<input type="text" name="about" value="<?php echo trim(set_value('about')) != "" ? trim(set_value('about')) : $res_user['user_about'];?>" placeholder="ex: Kryawan" class="form-control">
										</div>
									</div>
									<!--/ about -->

									<!-- photo -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_photo');?></label>
										<div class="col-md-3">
											<div class="mb-2"><img id="image-preview" src="<?php echo user_photo($res_user['user_photo']);?>" class="thumbnail us-avatar" style="width:100px;"></div>
											<input id="upload-image" class="file_input form-control" type="file" name="fupload" accept="image/png, image/jpeg, image/gif" />

										</div>
									</div>
									<!--/ photo -->

									<!-- active -->
									<div class="form-group row">
										<label class="col-form-label col-md-2">Status</label>
										<div class="col-md-10">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" id="cActiveb" name="active" value="1" <?php echo ( $res_user['user_active'] == 'Y' ? 'checked' : '' )?>>
												<label class="form-check-label" for="cActiveb"><?php echo lang_line('form_label_active');?></label>
											</div>
										</div>
									</div>
									<!--/ active -->
									<hr>
									<div class="block-actions">
										<button type="submit" class="submit_update button btn-primary mr-2"><i class="fa fa-save mr-2"></i><?php echo lang_line('button_save');?></button>
										<a href="<?php echo admin_url($this->mod);?>" class="button btn-default pull-right"><i class="fa fa-times mr-2"></i><?php echo lang_line('button_cancel');?></a>
									</div>
								<?php echo form_close();?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade show" id="identitas" role="tabpanel" aria-labelledby="identitas-tab">
						<div class="card">
							<div class="card-body">
								<?php 
									echo form_open_multipart(admin_url($this->mod.'/submit_update_user'),'id="" autocomplete="off"');
									echo form_hidden('act','update');
									echo form_hidden('pk',encrypt($res_user['user_id']));
									echo form_hidden('formtype','identitas'); ?>

									<!-- about -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_idtype');?></label>
										<div class="col-md-10">
											<select name="idtype" class="form-control">
												<option value="KTP" <?php if ($res_user['user_idtype']==='KTP') {
													echo "selected";
												} ?>>KTP</option>
												<option value="SIM" <?php if ($res_user['user_idtype']==='SIM') {
													echo "selected";
												} ?>>SIM</option>
												<option value="Passport" <?php if ($res_user['user_idtype']==='Passport') {
													echo "selected";
												} ?>>Passport</option>
											</select>
										</div>
									</div>
									<!--/ about -->

									<!-- about -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_idnumber');?></label>
										<div class="col-md-10">
											<input type="text" name="idnumber" value="<?php echo trim(set_value('idnumber')) != "" ? trim(set_value('idnumber')) : $res_user['user_idnumber'];?>" placeholder="ex: 12345678909876" class="form-control">
										</div>
									</div>
									<!--/ about -->

									<!-- about -->
									<div class="form-group row">
										<label class="col-form-label col-md-2"><?php echo lang_line('form_label_idphoto');?></label>
										<div class="col-md-3">
											<div class="mb-2"><img id="image-preview2" src="<?php echo user_photo($res_user['user_idphoto']);?>" class="thumbnail us-avatar" style="width:100px;"></div>
											<input id="upload-image2" class="file_input form-control" type="file" name="fuploadid" accept="image/png, image/jpeg, image/gif" />
										</div>
									</div>
									<!--/ about -->
									<hr>
									<div class="block-actions">
										<button type="submit" class="submit_update_identity button btn-primary mr-2"><i class="fa fa-save mr-2"></i><?php echo lang_line('button_save');?></button>
										<a href="<?php echo admin_url($this->mod);?>" class="button btn-default pull-right"><i class="fa fa-times mr-2"></i><?php echo lang_line('button_cancel');?></a>
									</div>
								<?php echo form_close();?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade show" id="bank" role="tabpanel" aria-labelledby="bank-tab">
						<div class="card">
							<div class="card-body">
								<?php if ($bank_user!=null) { ?>
									<?php 
										echo form_open_multipart(admin_url($this->mod.'/submit_update_user'),'id="" autocomplete="off"');
										echo form_hidden('act','update');
										echo form_hidden('pk',encrypt($bank_user['user_id']));
										echo form_hidden('bi',encrypt($bank_user['id']));
										echo form_hidden('formtype','bank'); ?>

										<!-- about -->
										<div class="form-group row">
											<label class="col-form-label col-md-2"><?php echo lang_line('form_label_bank');?></label>
											<div class="col-md-10">
												<input type="text" name="bank" value="<?php echo trim(set_value('bank')) != "" ? trim(set_value('bank')) : $bank_user['bank_name'];?>" placeholder="ex: BCA" class="form-control">
											</div>
										</div>
										<!--/ about -->

										<!-- about -->
										<div class="form-group row">
											<label class="col-form-label col-md-2"><?php echo lang_line('form_label_bank_owner');?></label>
											<div class="col-md-10">
												<input type="text" name="owner" value="<?php echo trim(set_value('owner')) != "" ? trim(set_value('owner')) : $bank_user['owner_name'];?>" placeholder="ex: Owner Name" class="form-control">
											</div>
										</div>
										<!--/ about -->

										<!-- about -->
										<div class="form-group row">
											<label class="col-form-label col-md-2"><?php echo lang_line('form_label_bank_cabang');?></label>
											<div class="col-md-10">
												<input type="text" name="cabang" value="<?php echo trim(set_value('cabang')) != "" ? trim(set_value('cabang')) : $bank_user['branch'];?>" placeholder="ex: Jakarta" class="form-control">
											</div>
										</div>
										<!--/ about -->

										<div class="form-group row">
											<label class="col-form-label col-md-2"><?php echo lang_line('form_label_bank_acc');?></label>
											<div class="col-md-10">
												<input type="text" name="norek" value="<?php echo trim(set_value('norek')) != "" ? trim(set_value('norek')) : $bank_user['acc_number'];?>" placeholder="ex: 12345678909876" class="form-control">
											</div>
										</div>
										<hr>
										<div class="block-actions">
											<button type="submit" class="submit_update_identity button btn-primary mr-2"><i class="fa fa-save mr-2"></i><?php echo lang_line('button_save');?></button>
											<a href="<?php echo admin_url($this->mod);?>" class="button btn-default pull-right"><i class="fa fa-times mr-2"></i><?php echo lang_line('button_cancel');?></a>
										</div>
									<?php echo form_close();?>
								<?php } else {
									echo '<div class="alert alert-danger">User belum mengisi bank</div>';
								} ?>
								
							</div>
						</div>
					</div>
					<div class="tab-pane fade show" id="level" role="tabpanel" aria-labelledby="level-tab">
						<div class="card">
							<div class="card-body">
								<?php 
									echo form_open_multipart(admin_url($this->mod.'/submit_update_user'),'id="" autocomplete="off"');
									echo form_hidden('act','update');
									echo form_hidden('pk',encrypt($res_user['user_id']));
									echo form_hidden('formtype','level'); ?>
									<div class="form-group row">
										<label class="col-form-label col-md-2">Status Data</label>
										<div class="col-md-10">
											<select class="form-control" name="status_data">
												<option value="Incomplete" <?php if ($res_user['user_status_data']==='Incomplete') {
													echo "selected";
												} ?>>Incomplete</option>
												<option value="Complete" <?php if ($res_user['user_status_data']==='Complete') {
													echo "selected";
												} ?>>Complete</option>
											</select>
										</div>
									</div>
									<hr>
									<div class="block-actions">
										<button type="submit" class="submit_update_identity button btn-primary mr-2"><i class="fa fa-save mr-2"></i><?php echo lang_line('button_save');?></button>
										<a href="<?php echo admin_url($this->mod);?>" class="button btn-default pull-right"><i class="fa fa-times mr-2"></i><?php echo lang_line('button_cancel');?></a>
									</div>
								<?php echo form_close();?>
							</div>
						</div>
					</div>
				</div>		
			</div>
		</div>					
	</div>
</div>