<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- 
*******************************************************
	Include Header Template
******************************************************* 
-->
<?php $this->CI->render_view('header'); ?>
<!-- End Header -->

<!-- 
*******************************************************
	Insert Content
******************************************************* 
-->
<!-- Main wrapper -->
<main>

    <?php echo html_entity_decode($res['content']); ?>

</main>



<!-- End Content -->

<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php $this->CI->render_view('footer'); ?>
<!-- End Footer -->