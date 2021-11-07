<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center ">
                            <a href="<?php echo base_url(); ?>">
                                <span><img src="https://moneymarketint.com/content/uploads/mm-logo-green.jpg" alt="" height="60"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Log In</h4>
                                <p class="text-muted mb-4">Enter your email address and we'll send your password existing.</p>
                            </div>
                            <?= $this->session->flashdata('forgot'); ?>
                            <form method="POST" action="<?= member_url('forgot') ?>">
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" id="email" name="email" required type="email" placeholder="Enter your email">
                                </div>

                                <div class="mb-0 text-center">
                                    <div class="d-grid">
                                        <button class="btn btn-light" type="submit">Get Password</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <div class="col-12 text-center">
                                <div class="d-grid">
                                    <a href="<?php echo base_url('l-member') ?>" class="btn btn-warning">Back to LogIn</a>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->


                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->