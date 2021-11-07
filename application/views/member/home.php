<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" id="dash-daterange">
                        <span class="input-group-text bg-primary border-primary text-white">
                            <i class="mdi mdi-calendar-range font-13"></i>
                        </span>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                    <a href="javascript: void(0);" class="btn btn-primary ms-1">
                        <i class="mdi mdi-filter-variant"></i>
                    </a>
                </form>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-5 col-lg-6">

        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Wallet</h5>
                        <h3 class="mt-3 mb-3">36,254</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Withdrawal</h5>
                        <h3 class="mt-3 mb-3">5,543</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                            <span class="text-nowrap">Total your withdrawal</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Account</h5>
                        <h3 class="mt-3 mb-3">$6,254</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                            <span class="text-nowrap">Total your account trading</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-pulse widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Growth">Deposit</h5>
                        <h3 class="mt-3 mb-3">+ 30.56%</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                            <span class="text-nowrap">Total your deposit</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

    </div> <!-- end col -->

    <div class="col-xl-7 col-lg-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title mb-3">Feeds (Daily Activity) </h4>



            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>



<?php if (empty($row_bank)) { ?>
    <div class="col-md-12 text-center">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <a href="<?= member_url('account') ?>"><button type="button" class="btn btn-lg btn-danger"><span data-notify="icon" class="nc-icon nc-bell-55"></span> <span data-notify="message">Please fill in
                            your Pyment Information Data!</span></button></a>
            </div>
        </div>
    </div>
    <br>
<?php } ?>
<?php if (empty($data['id_type']) || empty($data['id_number']) || empty($data['id_photo'])) { ?>
    <div class="col-md-12 text-center">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <a href="<?= member_url('account') ?>"><button type="button" class="btn btn-lg btn-danger"><span data-notify="icon" class="nc-icon nc-bell-55"></span> <span data-notify="message">Please fill in
                            your Identity Data!</span></button></a>
            </div>
        </div>
    </div>
    <br>
<?php } ?>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-money-coins text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category"></p>

                            <p class="card-title">$ <?= number_format($wallet['amount'], 2, '.', ',') ?></p>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    Total wallet
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-money-coins text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category"></p>
                            <p class="card-title">$ <?= number_format($withdrawal['amount'], 2, '.', ',') ?></p>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    Total withdrawal
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-circle-10 text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category"></p>
                            <p class="card-title"><?= $account['jml'] ?></p>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    Total account
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-credit-card text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category"></p>
                            <p class="card-title">$ <?= number_format($deposit['amount'], 2, '.', ',') ?></p>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    Total deposit
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="card  card-tasks">
            <div class="card-header ">
                <h4 class="card-title">Feeds</h4>
                <h5 class="card-category">history activity</h5>
            </div>
            <div class="card-body ">
                <div class="table-full-width table-responsive">
                    <table class="table table-bordered table-hover" id="table_acct">
                        <thead>
                            <tr>
                                <th class="no-sort text-center">

                                </th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activity as $key => $value) { ?>
                                <tr>
                                    <td class="td-actions">
                                        <i class="nc-icon nc-alert-circle-i"></i>
                                        </button>
                                    </td>
                                    <td class="text-left"><?= $value['activity'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">My Followers</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled team-members">
                    <?php foreach ($downline as $key => $value) { ?>
                        <li>
                            <div class="row">
                                <div class="col-md-2 col-2">
                                    <div class="avatar">
                                        <img src="<?= user_photo($value['photo']); ?>">
                                    </div>
                                </div>
                                <div class="col-md-7 col-7">
                                    <?= $value['name'] ?>
                                </div>
                            </div>
                        </li>
                    <?php } ?>


                </ul>
            </div>
        </div>
    </div>
</div>