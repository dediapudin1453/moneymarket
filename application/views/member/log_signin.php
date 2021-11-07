<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center ">
                            <a href="<?= base_url(''); ?>">
                                <span><img src="https://moneymarketint.com/content/uploads/mm-logo-green.jpg" alt="" height="60"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Log In</h4>
                                <p class="text-muted mb-4">Enter your email address and password to access your dashboard.</p>
                            </div>
                            <?= $this->session->flashdata('login'); ?>
                            <?php if (!empty($this->session->flashdata('reg_success'))) { ?>
                                <div class="alert alert-success" role="alert">
                                    <strong> Registration success - </strong>Please check your email to verification!
                                </div>
                            <?php } ?>
                            <form method="POST" action="<?= member_url('login'); ?> ">

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="text" id="useremail" name="useremail" required="" placeholder="Enter your email" value="<?= $email ?>">
                                </div>

                                <div class="mb-3">
                                    <a href="<?= member_url('forgot') ?>" class="text-muted float-end"><small>Forgot your password?</small></a>

                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="userpass" name="userpass" onclick="viewPassword3()" class="form-control" placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" value="TRUE" <?php if (!empty($this->input->cookie('remember_me', true))) { ?> checked <?php } ?>>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <div class="d-grid">
                                        <button class="btn btn-light btn-block" name="submit" type="submit"> <i class="mdi mdi-rocket me-1"></i> Log In your account </button>
                                    </div>
                                </div>


                            </form>
                            <div class="col-12 text-center">
                                <p class="">Don't have an account?</p>
                                <div class="d-grid">
                                    <a href="<?php echo base_url('l-member/register') ?>" class="btn btn-warning">Register Now</a>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <!-- <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="">Don't have an account?</p>
                            <div class="d-grid">
                                <a href="<?= member_url('register'); ?>" class="btn btn-warning" role="button" data-bs-toggle="button">Register Now</a>
                            </div>
                        </div> 
                    </div> -->
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->