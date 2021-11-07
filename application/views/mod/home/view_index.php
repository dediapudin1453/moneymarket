<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-inline">
        <div class="page-title">
            <h3>
                <span class="font-weight-semibold"><?php echo lang_line('mod_welcome'); ?> -
                    <?php echo data_login('admin', 'name'); ?> </span>
            </h3>
        </div>
    </div>
    <div class="breadcrumb-line breadcrumb-line-light">
        <div class="breadcrumb">
            <a href="<?php echo admin_url('home'); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                <?php echo lang_line('admin_link_home'); ?></a>
        </div>
    </div>
</div>

<div class="content">

    <?php $level = data_login('admin', 'level'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-left">
                    <h3>Notification</h3>
                    <?php
                    $query = $this->db->select('name');
                    $query = $this->db->from('t_user');
                    $query = $this->db->join('t_bank', 't_bank.user_id=t_user.id');
                    $query = $this->db->where('id_type !=', null);
                    $query = $this->db->where('id_number !=', null);
                    $query = $this->db->where('status_data', 'Incomplete');
                    $users = $query->get()->result_array();

                    if (!empty($users)) { ?>
                        <p>
                            <i class="fa fa-bell mr-2"></i>
                            <a href="<?php echo admin_url('member'); ?>">
                                <?php foreach ($users as $key => $value) {
                                    echo $value['name'] . ", ";
                                } ?>
                                Telah melengkapi biodata! Silakan cek untuk verifikasi.
                            </a>
                        </p>
                    <?php }

                    $data = $this->db->get_where('t_deposit', array('status' => 'Pending'))->num_rows();
                    if ($data > 0) { ?>
                        <p>
                            <i class="fa fa-bell mr-2"></i>
                            <a href="<?php echo admin_url('deposit'); ?>">
                                <?= $data ?> pending deposit requests
                            </a>
                        </p>
                    <?php }

                    $data = $this->db->get_where('t_account_trading', array('status_request' => 'Pending'))->num_rows();
                    if ($data > 0) { ?>
                        <p>
                            <i class="fa fa-bell mr-2"></i>
                            <a href="<?php echo admin_url('account_trading'); ?>">
                                <?= $data ?> pending trading account opening requests
                            </a>
                        </p>
                    <?php }

                    $data = $this->db->get_where('t_internal_transfer', array('status' => 'Pending'))->num_rows();
                    if ($data > 0) { ?>
                        <p>
                            <i class="fa fa-bell mr-2"></i>
                            <a href="<?php echo admin_url('internal_transfer'); ?>">
                                <?= $data ?> pending internal transfer requests
                            </a>
                        </p>
                    <?php }


                    $data = $this->db->get_where('t_withdraw', array('status' => 'Pending'))->num_rows();
                    if ($data > 0) { ?>
                        <p>
                            <i class="fa fa-bell mr-2"></i>
                            <a href="<?php echo admin_url('withdrawal'); ?>">
                                <?= $data ?> pending withdrawal requests
                            </a>
                        </p>
                    <?php }
                    ?>
                    <?php if ($notif_comment[0] > 0 ||  $notif_mail[0] > 0) : ?>
                        <?php if ($notif_comment[0] > 0) : ?>
                            <p>
                                <i class="fa fa-commenting-o mr-2"></i>
                                <a href="<?php echo admin_url('comment'); ?>"><?php echo $notif_comment[1]; ?></a>
                            </p>
                        <?php endif ?>
                        <?php if ($notif_mail[0] > 0) : ?>
                            <!-- <p class="mb-0">
                                <i class="fa fa-bell mr-2"></i>
                                <a href="<?php echo admin_url('internal_transfer'); ?>"><?php echo $notif_mail[1]; ?></a>
                            </p> -->
                        <?php endif ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if ($level != 5) { ?>
            <div class="col-lg-3 home-widget primary">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="<?php echo admin_url('deposit'); ?>" class="home-widget-icon">
                                <i class="fa fa-credit-card"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0">Deposit</h6>
                            <span class="text-muted">$ <?php echo number_format($h_deposit['amount'], 2, '.', ','); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 home-widget success">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="<?php echo admin_url('withdrawal'); ?>" class="home-widget-icon">
                                <i class="fa fa-archive"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0">Withdrawal</h6>
                            <span class="text-muted">$ <?php echo number_format($h_withdraw['amount'], 2, '.', ','); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 home-widget info">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="<?php echo admin_url('internal_transfer'); ?>" class="home-widget-icon">
                                <i class="fa fa-exchange"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0">Internal Transfer</h6>
                            <span class="text-muted">$ <?php echo number_format($h_internaltf['amount'], 2, '.', ','); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ($level == 1 || $level == 2) { ?>
            <div class="col-lg-3 home-widget success">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3">
                            <a href="<?php echo admin_url('member'); ?>" class="home-widget-icon">
                                <i class="icon-users4"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0">Members</h6>
                            <span class="text-muted"><?php echo $h_users; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <?php if ($level != 5) { ?>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-white header-elements-inline">
                        <h5 class="card-title"><i class="fa fa-user text-danger  mr-2"></i> Latest Member</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table-scrollable">
                        <table class="table">
                            <tbody>
                                <?php
                                $popular_posts = $this->db
                                    ->select('id,username,join_date,photo')
                                    ->order_by('join_date', 'DESC')
                                    ->limit(10)
                                    ->get('t_user')
                                    ->result_array();
                                foreach ($popular_posts as $res) {
                                ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo admin_url('member/edit/' . $res['username']); ?>" target="_blank" title="<?php echo $res['username']; ?>">
                                                <img src="<?php echo user_photo($res['photo'], 'thumb', TRUE); ?>" alt="<?php echo $res['username']; ?>" class="" width="70" />
                                            </a>
                                        </td>
                                        <td>
                                            <div class="text-muted mb-1">
                                                <small><i class="fa fa-calendar"></i>
                                                    <?php echo date('d M Y', strtotime($res['join_date'])); ?></small>
                                            </div>
                                            <a href="<?php echo admin_url('member/edit/' . $res['username']); ?>" target="_blank" title="<?php echo $res['username']; ?>"><small class="text-strong"><?php echo $res['username']; ?></small></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-white header-elements-inline">
                        <h5 class="card-title"><i class="icon-chart text-primary mr-2"></i>
                            <?php echo lang_line('mod_box_title_3'); ?></h5>
                        <div class="header-elements">
                            <a href="<?php echo admin_url('home/visitors'); ?>" class="button btn-xs btn-default" title="Detail"><i class="fa fa-line-chart"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="stats-desc">
                            <div class="text-center">
                                <i class="fa fa-stop" style="color:#97BBCD;"></i> visitors
                                <i class="fa fa-stop" style="color:#DCDCDC; margin-left:15px;"></i> hits
                            </div>
                            <canvas id="canvas-stats"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white header-elements-inline">
                        <h5 class="card-title"><i class="icon-chart text-primary mr-2"></i>
                            <?php echo lang_line('mod_box_title_3'); ?></h5>
                        <div class="header-elements">
                            <a href="<?php echo admin_url('home/visitors'); ?>" class="button btn-xs btn-default" title="Detail"><i class="fa fa-line-chart"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="stats-desc">
                            <div class="text-center">
                                <i class="fa fa-stop" style="color:#97BBCD;"></i> visitors
                                <i class="fa fa-stop" style="color:#DCDCDC; margin-left:15px;"></i> hits
                            </div>
                            <canvas id="canvas-stats"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>

<script type="text/javascript">
    <?php
    $rrhari = implode($arrhari, ",");
    $rrvisitors = implode(array_reverse($rvisitors), ",");
    $rrhits = implode(array_reverse($rhits), ",");
    ?>
    var datastats = {
        labels: [<?php echo implode($arrhari, ","); ?>],
        datasets: [{
                label: "Visitor",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [
                    <?php echo implode(array_reverse($rvisitors), ","); ?>
                ]
            },
            {
                label: "Hits",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [
                    <?php echo implode(array_reverse($rhits), ","); ?>
                ]
            }
        ]
    };
</script>