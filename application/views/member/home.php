<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <!-- <div class="page-title-right">
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
            </div> -->
            <h4 class="page-title"><span class="badge bg-success rounded-pill">Welcome' <?= data_login('member', 'name'); ?></h4>
        </div>
    </div>
</div>

<!-- <div class="row">
    <div class="col-xl-5">
        <div class="card">
            <div class="card-body">
                <?php if (empty($row_bank)) { ?>
                    <div class="alert alert-warning" role="alert">
                        Please update <a href="<?= member_url('account') ?>" class="alert-link">payment information</a>.
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <?php if (empty($data['id_type']) || empty($data['id_number']) || empty($data['id_photo'])) { ?>
                    <div class="alert alert-warning" role="alert">
                        Please update <a href="<?= member_url('account') ?>" class="alert-link">Identity Card</a>.
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div> -->



<div class="row">
    <div class="col-xl-5 col-lg-6">
        <?php if (empty($row_bank)) { ?>
            <div class="alert alert-warning" role="alert">
                Please update <a href="<?= member_url('account') ?>" class="alert-link">payment information</a>.
            </div>
        <?php } ?>
        <?php if (empty($data['id_type']) || empty($data['id_number']) || empty($data['id_photo'])) { ?>
            <div class="alert alert-warning" role="alert">
                Please update <a href="<?= member_url('account') ?>" class="alert-link">Identity Card</a>.
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="uil uil-money-insert widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Deposit</h5>
                        <h3 class="mt-3 mb-3">$ <?= number_format($deposit['amount'], 2, '.', ',') ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="uil uil-money-insert"></i> Your deposit</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="uil uil-money-withdrawal widget-icon bg-danger-lighten text-danger"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Withdrawal</h5>
                        <h3 class="mt-3 mb-3">$ <?= number_format($withdrawal['amount'], 2, '.', ',') ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><i class="uil uil-money-withdrawal"></i> Withdrawal</span>
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
                            <i class="uil uil-chart-line widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Trade Account</h5>
                        <h3 class="mt-3 mb-3"><?= $account['jml'] ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="uil uil-chart-line"></i> Account</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="uil uil-wallet widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Growth">Wallet</h5>
                        <h3 class="mt-3 mb-3">$ <?= number_format($wallet['amount'], 2, '.', ',') ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="uil uil-wallet"></i> Your wallet</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

    </div> <!-- end col -->

    <div class="col-xl-7 col-lg-6">
        <div class="card card-h-100">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div> -->
                    <h4 class="header-title mb-4">Recent Leads</h4>
                    <?php foreach ($downline as $key => $value) { ?>
                        <div class="d-flex align-items-start">
                            <img class="me-3 rounded-circle" src="<?= user_photo($value['photo']); ?>" width="40">
                            <div class="w-100 overflow-hidden">
                                <span class="badge badge-success-lighten float-end">Verify</span>
                                <h5 class="mt-0 mb-1"><?= $value['name'] ?></h5>
                                <span class="font-13"><?= $value['email'] ?></span>
                            </div>
                        </div>
                    <?php } ?>



                </div>
                <!-- end card-body -->
            </div>
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>