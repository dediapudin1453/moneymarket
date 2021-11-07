<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $this->alert->show($this->mod); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<h5 class="card-title"><?=lang_line('post_title_all_post')?></h5>
				<div class="pull-right">
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="DataTable" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th></th>
								<th>Judul</th>
								<th>Content</th>
								<th>Gambar</th>
								<th>Tanggal</th>
								<th>Aktif</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>