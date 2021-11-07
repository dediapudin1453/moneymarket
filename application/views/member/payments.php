<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $this->alert->show($this->mod); ?>	
<?php if ($type===null) { ?>
	<!-- new payment -->
	<div class="row">
	  <div class="col-md-6">
	    <div class="row">
	      <div class="col-lg-6">
	        <div class="card card-pricing">
	          <div class="card-body">
	            <a href="<?=member_url('payments/?type=bank')?>"> <img src="<?php echo base_url() ?>/content/uploads/banktransfer.png" class="card-img-top"> </a>
	            <ul>
	              <li>Easy to deposit</li>
	              <li>Make sure your account bank already exist</li>
	            </ul>
	          </div>
	        </div>
	      </div>
	      <div class="col-lg-6">
	        <div class="card card-pricing ">
	          <div class="card-body">
	            <a href="https://www.fasapay.com/login/"> <img src="<?php echo base_url() ?>/content/uploads/fpay.png" class="card-img-top"> </a>
	            <ul>
	              <li>Easy to deposit</li>
	              <li>Undermaintenance payment method</li>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="col-md-6">
	     <div class="row">
	      <div class="col-lg-6">
	        <div class="card card-pricing">
	          <div class="card-body">
	            <a href="#"> <img src="<?php echo base_url() ?>/content/uploads/skrill.png" class="card-img-top"> </a>
	            <ul>
	              <li>Easy to deposit</li>
	              <li>Undermaintenance payment method</li>
	            </ul>
	          </div>
	        </div>
	      </div>
	      <div class="col-lg-6">
	        <div class="card card-pricing ">
	          <div class="card-body">
	            <a href="#"> <img src="<?php echo base_url() ?>/content/uploads/bitcoin.png" class="card-img-top"> </a>
	            <ul>
	              <li>Easy to deposit</li>
	              <li>Undermaintenance payment method</li>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- end new payment -->
<?php } else { ?>

	<!-- new bank -->
	<div class="row">
		<div class="col-md-12">
		    <div class="row">
		      <div class="col-lg-4">
		        <div class="card card-pricing">
		          <div class="card-body">
		            <a href="<?= member_url('deposit/?bank=bca') ?>"> <img src="<?php echo content_url() ?>uploads/bank-bca-oke.jpg" class="card-img-top"> </a>
		            <ul>
		              <li>BCA - Bank Central Asia</li>
		            </ul>
		          </div>
		        </div>
		      </div>
		      <!--<div class="col-lg-4">
		        <div class="card card-pricing ">
		          <div class="card-body">
		            <a href="<?=member_url('deposit/?bank=mandiri')?>"> <img src="<?php echo base_url() ?>/content/uploads/bank-mandiri-oke.jpg" class="card-img-top"> </a>
		            <ul>
		              <li>Bank Mandiri</li>
		            </ul>
		          </div>
		        </div>
		      </div>-->
		    </div>
		</div>
	</div>
	<!--  -->
	<!-- <div class="col mb-4">
    	<div class="card">
      		<a href="<?= member_url('deposit/?bank=bca') ?>"> <img src="<?php echo content_url() ?>uploads/bank-bca-oke.jpg" class="card-img-top"> </a>
     		<div class="card-body">
		      	<p class="card-text text-center">Bank Central Asia </p>
		    </div>
	    </div>
  	</div>
  	<div class="col mb-4">
    	<div class="card">
       		<a href="<?=member_url('deposit/?bank=mandiri')?>"> <img src="<?php echo content_url() ?>uploads/bank-mandiri-oke.jpg" class="card-img-top"> </a>
     		<div class="card-body">
	      		<p class="card-text text-center">Mandiri Bank</p>
	    	</div>
    	</div>
  	</div>
  	<div class="col mb-4">
    	<div class="card">
       		<a href="<?=member_url('deposit/?bank=mandiri')?>"> <img src="<?php echo content_url() ?>uploads/international-bank-oke.jpg" class="card-img-top"> </a>
     		<div class="card-body">
	      		<p class="card-text text-center">International Bank</p>
	    	</div>
    	</div>
  	</div> -->
<?php } ?>
		
	


<script type="text/javascript">
	function convertToRupiah(objek) {
    	separator = ".";
    	a = objek.value;
    	b = a.replace(/[^\d]/g,"");
    	c = "";
    	panjang = b.length; 
    	j = 0; 
	    for (i = panjang; i > 0; i--) {
	      	j = j + 1;
	      	if (((j % 3) == 1) && (j != 1)) {
	        	c = b.substr(i-1,1) + separator + c;
	      	} else {
	        	c = b.substr(i-1,1) + c;
	      	}
	    }
	    objek.value = c;
  	}   
</script>