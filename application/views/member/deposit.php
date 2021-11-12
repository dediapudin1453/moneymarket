<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php echo $this->alert->show($this->mod); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Deposit bank transfer</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card ribbon-box">
            <div class="card-body">
                <div class="ribbon ribbon-primary float-start"><i class="mdi mdi-access-point me-1"></i> Account number</div>
                <div class="ribbon-content">
                    <?php if ($bank_type === 'bca') { ?>
                        <div class="card-body">
                            <img src="<?php echo base_url(); ?>/content/uploads/bank-bca-oke.jpg" class="card-img" alt="...">
                            <ul class="list-group">
                                <li class="list-group-item"><i class="uil uil-suitcase-alt"></i> Bank Central Asia</li>
                                <li class="list-group-item"><i class="uil uil-user-check"></i> Windy Hapsari</li>
                                <li class="list-group-item"><i class="uil uil-receipt me-1"></i> 7880980828</li>
                            </ul>
                        </div>

                    <?php } elseif ($bank_type === 'mandiri') { ?>
                        <!-- <div class="mb-3">
					  	<div class="row no-gutters">
						    <div class="col-md-4">
						      	<img src="<?php echo base_url(); ?>/content/uploads/bank-mandiri-oke.jpg" class="card-img" alt="...">
						    </div>
						    <div class="col-md-8">
						      	<div class="card-body">
						        	<h5 class="card-title">John Doe</h5>
						        	<p class="card-text">Nomor Rekening : XXX.XXX.XXX </p>
						      	</div>
						    </div>
				  		</div>
					</div> -->
                    <?php } ?>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>

    <div class="col-md-8">
        <div class="card">
            <?= $this->session->flashdata('pesan') ?>
            <?php if (empty($bank)) { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>opps! - </strong> you must be completed bank account
                </div>
            <?php } ?>
            <form action="<?= member_url('deposit/submit_deposit') ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?= lang_line('deposit_label_bank') ?><span class="text-danger">*</span></label>
                                <select name="bank_name" class="form-control">
                                    <?php foreach ($bank as $key => $value) { ?>
                                        <option value="<?= encrypt($value['id']) ?>"><?= $value['bank_name'] ?> - <?= $value['acc_number'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?= lang_line('deposit_label_tujuan') ?></label>
                                <select name="destination" class="form-control">
                                    <option value="Wallet">Wallet</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?= lang_line('deposit_label_jumlah') ?> <span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">IDR</div>
                                    </div>
                                    <input type="text" onkeyup="convertToRupiah(this);" name="amount" id="amount" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?= lang_line('deposit_label_rate') ?></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">IDR</div>
                                    </div>
                                    <input type="text" name="rate_tampil" value="<?= number_format($rate['amount'], 0, ',', '.') ?>" class="form-control" id="rate_tampil" readonly>
                                    <input type="hidden" name="rate" id="rate" value="<?= $rate['amount'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?= lang_line('deposit_label_usd') ?> <span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">USD</div>
                                    </div>
                                    <input type="text" name="amount_get" class="form-control" id="amount_get" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label><?= lang_line('deposit_label_upload') ?> <span class="text-danger">*</span> </label>
                                <div class="input-group mb-2">
                                    <div class="picture">
                                        <input type="file" name="foto" id="foto" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- harus di tambahkan class ini untuk muncul browse nya -->
                            <!-- <div class="picture-container">
                                <div class="picture">
                                    <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="">
                                    <input type="file" name="foto" class="form-control" id="wizard-picture">
                                </div>
                            </div> -->
                        </div>

                    </div>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i><?= lang_line('button_save') ?></button>
                </div>
            </form>
        </div>
    </div>

</div>