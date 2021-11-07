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
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                                <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>
                            </div>
                            <?= $this->session->flashdata('register'); ?>
                            <?= form_open('', 'class="" autocomplete="on"'); ?>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input class="form-control" type="text" id="name" name="name" pattern="[a-zA-Z'-'\s]*" placeholder="Enter your name" required>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">User Name</label>
                                <input class="form-control" type="text" id="username" name="username" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90" placeholder="Enter your username without spacing" required>
                            </div>

                            <div class="mb-3">
                                <label for="phonenumber" class="form-label">Phone Number</label>
                                <input class="form-control" type="text" id="phone" name="phone" maxlength="14" placeholder="Enter your phone number" required>
                                <span class="font-13 text-muted">e.g "(+xx) xxx-xxxx"</span>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="email" name="email" required placeholder="Enter your email">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control" onclick="viewPassword()" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password2" class="form-label">Confirm your Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password2" name="password2" class="form-control" onclick="viewPassword2()" placeholder="Confirm your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Referral</label>
                                <input class="form-control" type="text" name="referral" id="referral" value="<?= $this->session->userdata('nama_referral') ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                    <label class="form-check-label" for="checkbox-signup">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                </div>
                            </div>

                            <div class="mb-3 text-center">
                                <div class="d-grid">
                                    <button class="btn btn-light" type="submit"> Sign Up </button>
                                </div>
                            </div>
                            <?= form_close(); ?>
                            <div class="col-12 text-center">
                                <p class="">Already have an account?</p>
                                <div class="d-grid">
                                    <a href="<?php echo base_url('l-member') ?>" class="btn btn-warning">Login your account</a>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->