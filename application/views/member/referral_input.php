<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
	<div class="card-header">
		<h5 class="card-title">INPUT ID Downline</h5>
		<div class="pull-right">
			<a href="<?=member_url($this->mod)?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-o-left mr-2"></i>Referral</a>
		</div>
	</div>
	<div class="card-body">
		<form action="<?= site_url() ?>l-member/referral/submit_input/<?= $this->uri->segment(4) ?>" enctype="multipart/form-data" method="post">
			<div class="row post">
				<!-- Left -->
				<div class="col-lg-9">
					<div class="form-group">
						<label class="mb-1">Nama</label>
						<div class="form-control post-title-input" readonly><?=!empty(set_value('name')) ? set_value('name') : $row['name'];?></div>
					</div>
					<br>
					<div class="form-group">
						<label class="mb-1">Username</label>
						<div class="form-control post-title-input" readonly><?=!empty(set_value('username')) ? set_value('username') : $row['username'];?></div>
						<input type="hidden" name="pk" id="pk" class="form-control post-title-input" value="<?=!empty(set_value('id')) ? set_value('id') : $row['id'];?>" readonly>
					</div>
					<div class="form-group">
						<label class="mb-1">Tipe Asuransi</label>
						<div class="form-control post-title-input" readonly><?=!empty(set_value('type_asuransi')) ? set_value('tipe_asuransi') : $asuransi['type_asuransi'];?></div>
					</div>
				</div>
				<!--/ Left -->
				<!-- Right -->
				<div class="col-lg-3" style="min-width:120px;">
					<div id="sticky">
						<div class="accordion post-setting" id="accordionPostX">
							<!-- Picture -->
							<div class="card">
								<div class="card-header" id="collapse-publish">
									<button class="btn btn-link" type="button" data-toggle="collapse" aria-expanded="true" data-target="#collapsePublish" aria-controls="collapsePublish">ID</button>
								</div>
								<div id="collapsePublish" class="collapse show" aria-labelledby="collapse-publish" data-parent="#accordionPost">
									<div class="card-body">
										<!-- Picture -->
										<div class="text-center mb-2">
											<img id="image-preview" src="<?php if(empty($row['bukti_input'])) { echo post_images('' ,'', TRUE); } else { echo site_url()."content/uploads/".$row['bukti_input']; } ?>" class="imgprv">
										</div>
										<div class="custom-file">
											<input id="picture" type="file" accept="image/*" name="fupload" class="custom-file-input" required>
											<label class="custom-file-label" for="picture">
												<span class="d-inline-block text-truncate w-75">Chose image...</span>
											</label>
										</div>
										<!--/ Picture -->
										<!-- Image descrption -->
										<div class="mt-3 form-groupX">
											<label class="mb-1">ID</label>
											<input type="text" name="id" id="id" class="form-control post-title-input" value="<?=!empty(set_value('member_id')) ? set_value('member_id') : $row['member_id'];?>" required>
										</div>
										<div class="mb-1">
											<button type="submit" class="btn btn-sm btn-primary mr-2"><i class="fa fa-check"></i> <?=lang_line('button_submit')?></button>
											<button type="button" class="btn btn-sm btn-danger" onclick="location=href='<?=member_url($this->mod)?>'"><i class="fa fa-times"></i> <?=lang_line('button_cancel')?></button>
										</div>
										<!--/ Image descrption -->
									</div>
								</div>
							</div>
							<!--/ Picture -->
						</div>
					</div>
				</div>
				<!--/ Right -->
			</div>
		</form>
	</div>
</div>