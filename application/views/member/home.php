<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (empty($row_bank)) { ?>
<div class="col-md-12 text-center">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <a href="<?= member_url('account') ?>"><button type="button" class="btn btn-lg btn-danger"><span
                        data-notify="icon" class="nc-icon nc-bell-55"></span> <span data-notify="message">Please fill in
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
            <a href="<?= member_url('account') ?>"><button type="button" class="btn btn-lg btn-danger"><span
                        data-notify="icon" class="nc-icon nc-bell-55"></span> <span data-notify="message">Please fill in
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

                            <p class="card-title">$ <?= number_format($wallet['amount'],2,'.',',') ?></p>
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
                            <p class="card-title">$ <?= number_format($withdrawal['amount'],2,'.',',') ?></p>
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
                            <p class="card-title">$ <?= number_format($deposit['amount'],2,'.',',') ?></p>
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
                                    <img src="<?=user_photo($value['photo']);?>">
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