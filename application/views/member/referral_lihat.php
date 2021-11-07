<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h3>
				<span class="font-weight-semibold">Referral</span>
			</h3>
		</div>
	</div>
	<div class="breadcrumb-line breadcrumb-line-light">
		<div class="breadcrumb">
			<a href="<?php echo member_url('home'); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
			<a href="<?php echo member_url('referral'); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Referral</a>
			<span class="breadcrumb-item">Data Downline</span>
		</div>
	</div>
</div>

<div class="content">
	<div id="alert-notif" style="display:none;"></div>
	<div class="block">
		<div class="block-header">
		</div>
		<div class="box-content">
			<div class="col-md-12">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
					    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" id="tipe_asuransi-tab" data-toggle="tab" href="#tipe_asuransi" role="tab" aria-controls="tipe_asuransi" aria-selected="false">Tipe Asuransi</a>
					 </li>
					 <li class="nav-item">
					    <a class="nav-link" id="nama_tertanggung-tab" data-toggle="tab" href="#nama_tertanggung" role="tab" aria-controls="nama_tertanggung" aria-selected="false">Nama Tertanggung</a>
					 </li>
					<li class="nav-item">
					    <a class="nav-link" id="rekam_medis-tab" data-toggle="tab" href="#rekam_medisform" role="tab" aria-controls="rekam_medis" aria-selected="false">Rekam Medis</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" id="formulir-tab" data-toggle="tab" href="#formulir" role="tab" aria-controls="formulir" aria-selected="false">Other</a>
					</li>
				</ul>
				<!-- start : content tab -->
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="card">
							<div class="card-header ">
								<h4 class="card-title">Biodata Member</h4>
							</div>
							<div class="card-body">
								<!-- name -->
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nama Lengkap</label>
											<input type="text" onclick="copyData(this)" class="form-control" value="<?= $row['name'] ?>" id="name" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Email</label>
											<input type="text" onclick="copyData(this)" class="form-control" value="<?= $row['email'] ?>" id="email" readonly>
										</div>
									</div>
								</div>
								<!--/ name -->
								<!-- Gender -->
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Jenis Kelamin *</label>
											<input type="text" onclick="copyData(this)" class="form-control" value="<?php if($row['gender']=='M'){ echo "Laki-laki"; }else{ echo "Laki-laki"; } ?>" id="gender" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Agama *</label>
						                    <input type="text" onclick="copyData(this)" class="form-control" value="<?= $row['religion'] ?>" id="agama" readonly>
										</div>
									</div>
								</div>
								<!--/ Gender -->
								<!-- birthday -->
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Tempat Lahir *</label>
				                    		<input maxlength="150" onclick="copyData(this)" type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $row['birthplace'] ?>" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Tanggal Lahir *</label>
				                    		<input maxlength="100" onclick="copyData(this)" type="text" name="tgl_lahir" id="tgl_lahir" value="<?= date('d-M-Y', strtotime($row['birthday'])) ?>" class="form-control" readonly />
										</div>
									</div>
								</div>
								<!--/ birthday -->
								<!-- Phone -->
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nomor Telephone / Handphone / WA *</label>
				                    		<input maxlength="150" onclick="copyData(this)" type="text" name="hp" id="hp" class="form-control" value="<?= $row['tlpn'] ?>" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nomor e KTP (NIK) *</label>
				                    		<input maxlength="30" type="text" onclick="copyData(this)" name="ktp" id="ktp" value="<?= $row['no_ktp'] ?>" class="form-control" readonly />
										</div>
									</div>
								</div>
								<!--/ Phone -->
								<!-- provinsi & kota -->
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Provinsi *</label>
											<input maxlength="30" type="text" onclick="copyData(this)" name="provinsi_id" id="provinsi_id" value="<?= $row['provinsi'] ?>" class="form-control" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kabupaten/Kota *</label>
									   		<input type="hidden" name="kota" id="kota" value="<?= $row['kota'] ?>">
											<input maxlength="30" type="text" onclick="copyData(this)" name="kota_id" id="kota_id" value="<?= $row['kota'] ?>" class="form-control" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-5">
										<div class="form-group">
											<label class="control-label">Kecamatan *</label>
											<input maxlength="30" type="text" onclick="copyData(this)" name="kecamatan_id" id="kecamatan_id" value="<?= $row['kecamatan'] ?>" class="form-control" readonly />
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label class="control-label">Kelurahan/Desa *</label>
										    <input type="text" onclick="copyData(this)" name="kelurahan" id="kelurahan" class="form-control" value="<?= $row['kelurahan'] ?>" readonly >
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Kode POS *</label>
			                    			<input maxlength="6" type="text" name="kode_pos" id="kode_pos" onclick="copyData(this)" class="form-control" value="<?= $row['kode_pos'] ?>"  readonly  />
										</div>
									</div>
								</div>
								<!--/ provinsi & kota -->
								<!-- Address -->
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Alamat Lengkap *</label>
				                    		<textarea class="form-control" onclick="copyData(this)" name="alamat" id="alamat" readonly><?= $row['address'] ?></textarea>
										</div>
									</div>
								</div>
								<!-- Address -->
								<!-- npwp & pajak -->
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">RT *</label>
				                    		<input maxlength="3" type="text" name="rt" id="rt" onclick="copyData(this)" value="<?= $row['rt'] ?>" class="form-control" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">RW *</label>
				                    		<input maxlength="3" type="text" name="rw" id="rw" onclick="copyData(this)" value="<?= $row['rw'] ?>" class="form-control" readonly />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tipe_asuransi" role="tabpanel" aria-labelledby="tipe_asuransi-tab">
						<div class="card">
							<div class="card-header ">
								<h4 class="card-title"><?=lang_line('account_title');?></h4>
							</div>
							<div class="card-body">
								<!-- tipe asuransi -->
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Type Asuransi yang dipilih (Standard Unit Link)</label>
			                    			<input maxlength="3" type="text" name="type_asuransi" id="type_asuransi" onclick="copyData(this)" value="<?= $asuransi['type_asuransi'] ?>" class="form-control" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Premi yang dipilih *</label>
											<input maxlength="3" type="text" name="premi" id="premi" value="<?= $asuransi['premi'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Bank untuk transfer bonus *</label>
			                   	 			<input maxlength="100" type="text" name="bank" id="bank" value="<?= $asuransi['bank'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Nomor Rekening Bank  *</label>
				                    		<input maxlength="100" type="text" name="norek" id="norek" value="<?= $asuransi['no_rekening'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Nama di Rekening Bank *</label>
				                   			<input maxlength="100" type="text" name="atas_nama" id="atas_nama" value="<?= $asuransi['atas_nama'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nomor NPWP </label>
				                   			<input maxlength="25" type="text" name="npwp" id="npwp" value="<?= $asuransi['npwp'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Status Pajak *</label>
											<input maxlength="25" type="text" name="status_pajak" id="status_pajak" value="<?= $asuransi['status_pajak'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Jumlah Tanggungan * </label>
				                   			<input maxlength="3" type="text" name="jml_tanggungan" id="jml_tanggungan" value="<?= $asuransi['jml_tanggungan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Nama ahli waris bisnis 3i-Network *</label>
				                    		<input maxlength="150" type="text" name="ahli_waris" id="ahli_waris" value="<?= $asuransi['ahli_waris'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Hubungan * </label>
											<input maxlength="150" type="text" name="hubungan" id="hubungan" value="<?= $asuransi['hubungan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<!--/ provinsi & kota -->
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Data peserta 3i-Networks wajib sama dengan data pemegang polis (orang yang sama) *</label>
											<input maxlength="150" type="text" name="data_peserta_wajib_sama_pemegang_polis" id="data_peserta_wajib_sama_pemegang_polis" value="<?= $asuransi['data_peserta_wajib_sama_pemegang_polis'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Calon pemegang polis sama dengan calon tertanggung?</label>
											<input maxlength="150" type="text" name="pemegang_sama_dengan_tertanggung" id="pemegang_sama_dengan_tertanggung" value="<?= $asuransi['pemegang_sama_dengan_tertanggung'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Nama Calon Tertanggung</label>
											<input maxlength="150" type="text" name="nama_calon" id="nama_calon" value="<?= $calon['nama'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Alamat Lengkap</label>
				                    		<textarea class="form-control" id="alamat_calon" name="alamat_calon" onclick="copyData(this)" readonly><?= $calon['alamat'] ?></textarea>
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
					                	<div class="form-group">
						                    <label class="control-label">RT *</label>
						                    <input maxlength="3" minlength="1" type="text" class="form-control" id="rt_calon" name="rt_calon" value="<?= $calon['rt'] ?>" onclick="copyData(this)" readonly/>
					                	</div>
					            	</div>
					            	<div class="col-md-6">
						                <div class="form-group">
						                    <label class="control-label">RW *</label>
						                    <input maxlength="3" minlength="1" type="text" class="form-control" onkeyup="validAngka(this)" id="rw_calon" name="rw_calon" value="<?= $calon['rw'] ?>" onclick="copyData(this)" readonly/>
						                </div>
					            	</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
					                	<div class="form-group">
						                    <label class="control-label">Provinsi *</label>
						                    <input type="text" class="form-control" id="provinsi_id_calon" name="provinsi_id_calon" value="<?= $calon['provinsi'] ?>" onclick="copyData(this)" readonly/>
					                	</div>
					            	</div>
					            	<div class="col-md-6">
						                <div class="form-group">
						                    <label class="control-label">Kota *</label>
						                    <input type="text" class="form-control" id="kota_id_calon" name="kota_id_calon" value="<?= $calon['kota_kabupaten'] ?>" onclick="copyData(this)" readonly/>
						                </div>
					            	</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-5">
					                	<div class="form-group">
						                    <label class="control-label">Kecamatan *</label>
						                    <input type="text" class="form-control" id="kecamatan_id_calon" name="kecamatan_id_calon" value="<?= $calon['kecamatan'] ?>" onclick="copyData(this)" readonly/>
					                	</div>
					            	</div>
					            	<div class="col-md-5">
						                <div class="form-group">
						                    <label class="control-label">Kelurahan *</label>
						                    <input type="text" class="form-control" id="kelurahan_id_calon" name="kelurahan_id_calon" value="<?= $calon['kelurahan'] ?>" onclick="copyData(this)" readonly/>
						                </div>
					            	</div>
					            	<div class="col-md-2">
					                	<div class="form-group">
						                    <label class="control-label">Kode POS *</label>
						                    <input type="text" class="form-control" id="kodepos_calon" name="kodepos_calon" value="<?= $calon['kode_pos'] ?>" onclick="copyData(this)" readonly/>
					                	</div>
					            	</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
					                	<div class="form-group">
						                    <label class="control-label">Agama *</label>
						                    <input type="text" class="form-control" id="agama_calon" name="agama_calon" value="<?= $calon['agama'] ?>" onclick="copyData(this)" readonly/>
					                	</div>
					            	</div>
					            	<div class="col-md-6">
						                <div class="form-group">
						                    <label class="control-label">Jenis Kelamin *</label>
						                    <input type="text" class="form-control" id="gender_calon" name="gender_calon" value="<?= $calon['gender'] ?>" onclick="copyData(this)" readonly/>
						                </div>
					            	</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
					                	<div class="form-group">
						                    <label class="control-label">Nomor Telephone / Handphone / WA *</label>
						                    <input type="text" class="form-control" id="no_hp_calon" name="no_hp_calon" value="<?= $calon['no_hp'] ?>" onclick="copyData(this)" readonly/>
					                	</div>
					            	</div>
					            	<div class="col-md-6">
						                <div class="form-group">
						                    <label class="control-label">Nomor e KTP (NIK) *</label>
						                    <input type="text" class="form-control" id="ktp_calon" name="ktp_calon" value="<?= $calon['ktp'] ?>" onclick="copyData(this)" readonly/>
						                </div>
					            	</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Pengiriman Polis (standard e-Polis)</label>
											<input maxlength="150" type="text" name="pengiriman_eplois" id="pengiriman_eplois" value="<?= $asuransi['pengiriman_eplois'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Pengiriman Polis Fisik</label>
											<input maxlength="150" type="text" name="pengiriman_polis_fisik" id="pengiriman_polis_fisik" value="<?= $asuransi['pengiriman_polis_fisik'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Alamat korespondensi sama dengan alamat di KTP? *</label>
											<input maxlength="150" type="text" name="alamat_korespondensi_sama_dengan_ktp" id="alamat_korespondensi_sama_dengan_ktp" value="<?= $asuransi['alamat_korespondensi_sama_dengan_ktp'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Alamat Korespondensi</label>
				                			<textarea class="form-control" name="alamat_korespondensi" id="alamat_korespondensi" onclick="copyData(this)" readonly><?= $asuransi['alamat_korespondensi'] ?></textarea>
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
					                	<div class="form-group">
						                    <label class="control-label">RT *</label>
						                    <input maxlength="3" minlength="1" type="text" class="form-control" onkeyup="validAngka(this)" id="rt_korespondensi" name="rt_korespondensi" value="<?= $asuransi['rt_korespondensi'] ?>" onclick="copyData(this)" readonly/>
					                	</div>
					            	</div>
					            	<div class="col-md-6">
						                <div class="form-group">
						                    <label class="control-label">RW *</label>
						                    <input maxlength="3" minlength="1" type="text" class="form-control" onkeyup="validAngka(this)" id="rw_korespondensi" name="rw_korespondensi" value="<?= $asuransi['rw_korespondensi'] ?>" onclick="copyData(this)" readonly/>
						                </div>
					            	</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
					                	<div class="form-group">
						                    <label class="control-label">Provinsi *</label>
						                    <input type="text" class="form-control" id="provinsi_korespondensi" name="provinsi_korespondensi" value="<?= $asuransi['provinsi_korespondensi'] ?>" onclick="copyData(this)" readonly/>
					                	</div>
					            	</div>
					            	<div class="col-md-6">
						                <div class="form-group">
						                    <label class="control-label">Kota *</label>
						                    <input type="text" class="form-control" id="kota_korespondensi" name="kota_korespondensi" value="<?= $asuransi['kota_korespondensi'] ?>" onclick="copyData(this)" readonly/>
						                </div>
					            	</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-5">
					                	<div class="form-group">
						                    <label class="control-label">Kecamatan *</label>
						                    <input type="text" class="form-control" id="kecamatan_korespondensi" name="kecamatan_korespondensi" value="<?= $asuransi['kecamatan_korespondensi'] ?>" onclick="copyData(this)" readonly/>
					                	</div>
					            	</div>
					            	<div class="col-md-5">
						                <div class="form-group">
						                    <label class="control-label">Kelurahan *</label>
						                    <input type="text" class="form-control" id="kelurahan_korespondensi" name="kelurahan_korespondensi" value="<?= $asuransi['kelurahan_korespondensi'] ?>" onclick="copyData(this)" readonly/>
						                </div>
					            	</div>
					            	<div class="col-md-2">
					                	<div class="form-group">
						                    <label class="control-label">Kode POS *</label>
						                    <input type="text" class="form-control" id="kodepos_korespondensi" name="kodepos_korespondensi" value="<?= $asuransi['kodepos_korespondensi'] ?>" onclick="copyData(this)" readonly/>
					                	</div>
					            	</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Pekerjaan *</label>
								    		<input maxlength="150" type="text" name="pekerjaan" id="pekerjaan" value="<?= $asuransi['pekerjaan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Jabatan *</label>
			                   				<input maxlength="150" type="text" name="jabatan" id="jabatan" value="<?= $asuransi['jabatan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Penghasilan rata-rata per tahun *</label>
											<input type="text" name="penghasilan_rata_rata" id="penghasilan_rata_rata" value="<?= $asuransi['penghasilan_rata_rata'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Sumber Penghasilan</label>
											<input type="text" name="sumber_penghasilan" id="sumber_penghasilan" value="<?= $asuransi['sumber_penghasilan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Tinggi Badan (cm) *</label>
			                   				<input maxlength="150" type="text" name="tinggi_badan" id="tinggi_badan" value="<?= $asuransi['tinggi_badan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Berat Badan (Kg) *</label>
			                   				<input maxlength="150" type="text" name="berat_badan" id="berat_badan" value="<?= $asuransi['berat_badan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Frekwensi pembayaran premi *</label>
											<input maxlength="150" type="text" name="frekwensi_pembayaran" id="frekwensi_pembayaran" value="<?= $asuransi['frekwensi_pembayaran'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Cara pembayaran premi selanjutnya *</label>
											<input maxlength="150" type="text" name="cara_pembayaran_premi" id="cara_pembayaran_premi" value="<?= $asuransi['cara_pembayaran_premi'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<hr>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="nama_tertanggung" role="tabpanel" aria-labelledby="nama_tertanggung-tab">
						<div class="card">
							<div class="card-header ">
								<h4 class="card-title">Nama Tertanggung Jika Pemegang Polis Meninggal Dunia</h4>
							</div>
							<div class="card-body">
								<!-- nama ke 1 -->
								<p>Biodata Penerima Ke 1 (satu)</p>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nama Penerima ke satu manfaat asuransi jika tertanggung meninggal dunia *</label>
				                    		<input maxlength="150" type="text" name="nama_1" id="nama_1" value="<?= $pm1['nama'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Jenis kelamin Penerima kesatu manfaat asuransi jika tertanggung meninggal dunia *</label>
											<input maxlength="150" type="text" name="gender_1" id="gender_1" value="<?= $pm1['gender'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Tanggal lahir penerima kesatu manfaat asuransi jika tertanggung meninggal dunia *</label>
				                    		<input type="text" name="birthdate_1" id="birthdate_1" class="form-control" value="<?= date('d-M-Y', strtotime($pm1['birthdate'])) ?>" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Hubungan Penerima kesatu dengan tertanggung *</label>
											<input type="text" name="hubungan_1" id="hubungan_1" class="form-control" value="<?= $pm1['hubungan'] ?>" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Besarnya bagian penerima ke satu (persentase) *</label>
				                    		<input type="text" name="presentasi_bagian_1" id="presentasi_bagian_1" pattern="\d{1,2}(?!\d)|100" value="<?= $pm1['presentasi_bagian'] ?>%" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<!--/ nama ke 1 -->
								<hr>
								<!-- nama ke 2 -->
								<p>Biodata Penerima Ke 2 (dua)</p>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nama Penerima kedua manfaat asuransi jika tertanggung meninggal dunia</label>
				                    		<input maxlength="150" type="text" name="nama_2" id="nama_2" value="<?= $pm2['nama'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Jenis kelamin Penerima kedua manfaat asuransi jika tertanggung meninggal dunia</label>
											<input maxlength="150" type="text" name="gender_2" id="gender_2" value="<?= $pm2['gender'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Tanggal lahir penerima kedua manfaat asuransi jika tertanggung meninggal dunia</label>
				                    		<input type="text" name="birthdate_2" id="birthdate_2" class="form-control" value="<?= date('d-M-Y', strtotime($pm2['birthdate']))  ?>" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Hubungan Penerima kedua dengan tertanggung</label>
											<input maxlength="150" type="text" name="hubungan_2" id="hubungan_2" value="<?= $pm2['hubungan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Besarnya bagian penerima kedua (persentase)</label>
				                    		<input type="text" name="presentasi_bagian_2" id="presentasi_bagian_2" pattern="\d{1,2}(?!\d)|100" onkeyup="validAngka(this)" value="<?= $pm2['presentasi_bagian'] ?>%" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
								</div>
								<!--/ nama ke 2 -->
								<hr>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				  	<div class="tab-pane fade" id="rekam_medisform" role="tabpanel" aria-labelledby="rekam_medis-tab">
						<div class="card">
							<div class="card-header ">
								<h4 class="card-title">Pernyataan Kesehatan & Rekam Medis</h4>
							</div>
							<div class="card-body">
								<!-- tipe asuransi -->
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Pertanyaan kesehatan: Apakah dalam 5 tahun terakhir Anda pernah direncanakan atau dianjurkan melakukan pemeriksaan kesehatan, pengobatan rutin dalam pengawasan dokter atau menjalani perawatan rumah sakit atau operasi atau pembedahan? *</label>
											<input maxlength="150" type="text" name="dianjurkan_periksa_kesehatan" id="dianjurkan_periksa_kesehatan" value="<?= $rekam['dianjurkan_periksa_kesehatan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Berdasarkan pengetahuan, keyakinan dan informasi yang Anda ketahui, apakah ada anggota keluarga kandung (Ayah/Ibu/Kakak/Adik) yang pernah menderita penyakit jantung, kanker dan stroke sebelum mencapai usia 60 tahun? *</label>
											<input maxlength="150" type="text" name="keluarga_kandung_pernah_sakit" id="keluarga_kandung_pernah_sakit" value="<?= $rekam['keluarga_kandung_pernah_sakit'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Apakah Anda sedang atau pernah menjalani pengobatan/perawatan atau pernah diberitahu dalam konsultasi/pengawasan medis sehubungan dengan salah satu atau beberapa keadaan/gejala gangguan. *</label>
											<input maxlength="150" type="text" name="sedang_pernah_menjalani_pengobatan" id="sedang_pernah_menjalani_pengobatan" value="<?= $rekam['sedang_pernah_menjalani_pengobatan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Penyakit Jantung</label>
											<input maxlength="150" type="text" name="penyakit_jantung" id="penyakit_jantung" value="<?= $rekam['penyakit_jantung'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Darah Tinggi *</label>
											<input maxlength="150" type="text" name="darah_tinggi" id="darah_tinggi" value="<?= $rekam['darah_tinggi'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kencing manis *</label>
											<input maxlength="150" type="text" name="kencing_manis" id="kencing_manis" value="<?= $rekam['kencing_manis'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Epilepsi *</label>
											<input maxlength="150" type="text" name="epilepsi" id="epilepsi" value="<?= $rekam['epilepsi'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kanker / Tumor *</label>
											<input maxlength="150" type="text" name="kanker" id="kanker" value="<?= $rekam['kanker'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Stroke/kelainan pembuluh darah otak *</label>
											<input maxlength="150" type="text" name="stroke" id="stroke" value="<?= $rekam['stroke'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Gangguan hati/empedu/hepatitis *</label>
											<input maxlength="150" type="text" name="gangguan_hati" id="gangguan_hati" value="<?= $rekam['gangguan_hati'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kelainan ginjal dan / saluran kemih </label>
											<input maxlength="150" type="text" name="kelainan_ginjal" id="kelainan_ginjal" value="<?= $rekam['kelainan_ginjal'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kelainan tulang dan / sendi *</label>
											<input maxlength="150" type="text" name="kelainan_tulang" id="kelainan_tulang" value="<?= $rekam['kelainan_tulang'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kelainan darah dan / pembuluh darah * </label>
											<input maxlength="150" type="text" name="kelainan_darah" id="kelainan_darah" value="<?= $rekam['kelainan_darah'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kelainan hormonal *</label>
											<input maxlength="150" type="text" name="kelainan_hormonal" id="kelainan_hormonal" value="<?= $rekam['kelainan_hormonal'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Asma * </label>
											<input maxlength="150" type="text" name="ashma" id="ashma" value="<?= $rekam['ashma'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">TBC *</label>
											<input maxlength="150" type="text" name="tbc" id="tbc" value="<?= $rekam['tbc'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">AIDS dan HIV * </label>
											<input maxlength="150" type="text" name="hiv" id="hiv" value="<?= $rekam['hiv'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Kelainan bawaan *</label>
											<input maxlength="150" type="text" name="kelainan_bawaan" id="kelainan_bawaan" value="<?= $rekam['kelainan_bawaan'] ?>" class="form-control" onclick="copyData(this)" readonly />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Hamil ..... bulan </label>
				                    		<input  type="text" name="usia_kandungan" id="usia_kandungan" onkeyup="validAngka(this)" class="form-control" value="<?= $rekam['usia_kandungan'] ?>" onclick="copyData(this)" readonly/>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Apakah Anda mempunyai kebiasaan merokok atau minum beralkohol atau menggunakan narkotika / obat terlarang atau obat penenang? *</label>
											<input  type="text" name="merokok_alkohol_narkoba" id="merokok_alkohol_narkoba" onkeyup="validAngka(this)" class="form-control" value="<?= $rekam['merokok_alkohol_narkoba'] ?>" onclick="copyData(this)" readonly/>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Apakah Anda melakukan atau mempunyai kegemaran olahraga yang penuh resiko (misalnya mendaki gunung, layang gantung, olahraga bermotor, menyelam dll) atau melakukan penerbangan selain sebagai penumpang pesawat komersial yang berjadwal? *</label>
											<input  type="text" name="olahraga_penuh_resiko_berjadwal" id="olahraga_penuh_resiko_berjadwal" onkeyup="validAngka(this)" class="form-control" value="<?= $rekam['olahraga_penuh_resiko_berjadwal'] ?>" onclick="copyData(this)" readonly/>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Apakah permohonan Anda untuk menutup atau memulihkan asuransi jiwa, penyakit kritis, kecelakaan, kecacatan atau asuransi kesehatan pernah ditolak, ditangguhkan atau dibatalkan atau pernahkah polis Anda diubah persyaratannya, dikenakan premi tambahan, dibatalkan atau ditolak pembaharuannya atau selama 3 tahun terakhir pernah mengajukan klaim pada asuransi manapun? *</label>
											<input  type="text" name="thn_trakhir_klaim_asuransi_lain" id="thn_trakhir_klaim_asuransi_lain" onkeyup="validAngka(this)" class="form-control" value="<?= $rekam['thn_trakhir_klaim_asuransi_lain'] ?>" onclick="copyData(this)" readonly/>
										</div>
									</div>
									<!-- end : -->
								</div>
								<hr>
								<div class="clearfix"></div>
							</div>
						</div>
				  	</div>
					<div class="tab-pane fade" id="formulir" role="tabpanel" aria-labelledby="formulir-tab">
						<div class="card">
							<div class="card-header ">
								<h4 class="card-title">Formulir yang telah Diupload Oleh Member</h4>
							</div>
							<div class="card-body">
								<table class="table table-striped">
								  	<thead>
									    <tr>
									      	<th scope="col">No</th>
									      	<th scope="col">Nama File</th>
									      	<th scope="col">Link Download</th>
									    </tr>
								  	</thead>
								  	<tbody>
								  		<?php if (!empty($row['surat_kuasa'])) { ?>
								  			<tr>
										      	<th scope="row">1</th>
										      	<td>Surat Pernyataan Pemegang Polis</td>
										      	<td><a href="<?php echo site_url();?>content/uploads/user/<?= $row['surat_kuasa'] ?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-eye mr-2"></i>Lihat</a></td>
										    </tr>
								  		<?php } ?>
										<?php if (!empty($row['form_auto_debit'])) { ?>
								  			<tr>
										      	<th scope="row">1</th>
										      	<td>Surat Kuasa Auto Debit</td>
										      	<td><a href="<?php echo site_url();?>content/uploads/user/<?= $row['form_auto_debit'] ?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-eye mr-2"></i>Lihat</a></td>
										    </tr>
								  		<?php } ?>
								  	</tbody>
								</table>
								<hr>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

				</div>
				<!-- end : content tab -->
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function copyData(a) {
    /* Get the text field */
    var copyText = a;

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/
    // alert(copyText);
    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Copied the text: " + copyText.value);
}
</script>