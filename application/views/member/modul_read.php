<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- 
*******************************************************
	Include Header Template
******************************************************* 
-->
<!-- End Header -->
<section class="section section-default section-footer section-color-custom mt-0 pt-2 pb-5">
	<div class="container py-4">
		<div class="row mt-2 mb-4 align-items-center">
			<div class="col-12">
				<div class="col text-center">
				<h2 class="mb-0 mt-3 font-weight-bold text-6"><?php echo $data['title'];?></h2>
				<div class="divider divider-primary divider-small divider-small-center mb-3">
					<hr>
				</div>
			</div>
				<?php if (!empty($data['picture'])) { ?>
					<img src="<?= site_url() ?>content/uploads/<?= $data['picture'] ?>">
				<?php } ?>
				
				<p>
					<?php echo html_entity_decode($data['content']);?>
				</p>
			</div>
		</div>
	</div>
</section>