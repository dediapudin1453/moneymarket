<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
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
        <main id="main">
            <!-- Page title -->
            <section id="page-title">
                <div class="container">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="<?php echo  site_url(); ?>">Home</a></li>
                            <li><a href="#">Pages</a> </li>
                            <li class="active"><?php echo $res['title'];?> </li>
                        </ul>
                    </div>
                    <div class="page-title">
                        <h1><?php echo $res['title'];?></h1>
                    </div>
                </div>
            </section>
            <!-- end: Page title -->

            <!-- Content -->
            <section id="page-content">
                <div class="container">
                    <div class="grid-system-demo-live">
                        <div class="row">
                            <div class="col-lg-12 m-t-60"><?php echo html_entity_decode($res['content']);?></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: Content -->
        </main>
        <!-- end: main -->

<!-- End Content -->

<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php $this->CI->render_view('footer'); ?>
<!-- End Footer -->