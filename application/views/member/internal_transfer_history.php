<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Internal transfer history</h4>
        </div>
    </div>
</div>
<a href="<?= member_url('internal_transfer/?t=request') ?>" class="btn btn-warning rounded-pill mb-3"><i class="mdi mdi-sync-alert"></i> Internal Transfer</a>

<?php echo $this->alert->show($this->mod); ?>
<?= $this->session->flashdata('pesan') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card ribbon-box">
            <div class="card-body">
                <div class="ribbon-content">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="buttons-table-preview">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="no-sort text-center">
                                            No
                                        </th>
                                        <th>Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($internal as $key => $value) { ?>
                                        <tr>
                                            <td class="table-user"><?= $no ?></td>
                                            <td><?= date('d-m-Y', strtotime($value['date'])) ?></td>
                                            <td><?= $value['from_tf'] ?></td>
                                            <td><?= $value['to_tf'] ?></td>
                                            <td>USD <?= number_format($value['amount'], 2, '.', ',') ?></td>
                                            <td>
                                                <?php if ($value['status'] == "Approved") {
                                                    echo '<span class="badge badge-success-lighten rounded-pill">Approved</span>';
                                                } elseif ($value['status'] == "Pending") {
                                                    echo '<span class="badge badge-warning-lighten rounded-pill">Pending</span>';
                                                } else {
                                                    echo '<span class="badge badge-danger-lighten rounded-pill">Rejected</span>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- end preview-->

                        <div class="tab-pane" id="buttons-table-code">
                            <p>Please include following css file at <code>head</code> element</p>

                            <pre>
                                                    <span class="html escape">
                                                        &lt;!-- Datatables css --&gt;
                                                        &lt;link href=&quot;assets/css/vendor/buttons.bootstrap5.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; /&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->

                            <p>Make sure to include following js files at end of <code>body</code> element</p>

                            <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;!-- Datatables js --&gt;
                                                        &lt;script src=&quot;assets/js/vendor/dataTables.buttons.min.js&quot;&gt;&lt;/script&gt;
                                                        &lt;script src=&quot;assets/js/vendor/buttons.bootstrap5.min.js&quot;&gt;&lt;/script&gt;
                                                        &lt;script src=&quot;assets/js/vendor/buttons.html5.min.js&quot;&gt;&lt;/script&gt;
                                                        &lt;script src=&quot;assets/js/vendor/buttons.flash.min.js&quot;&gt;&lt;/script&gt;
                                                        &lt;script src=&quot;assets/js/vendor/buttons.print.min.js&quot;&gt;&lt;/script&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->

                            <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;table id=&quot;datatable-buttons&quot; class=&quot;table table-striped dt-responsive nowrap w-100&quot;&gt;
                                                            &lt;thead&gt;
                                                                &lt;tr&gt;
                                                                    &lt;th&gt;Name&lt;/th&gt;
                                                                    &lt;th&gt;Position&lt;/th&gt;
                                                                    &lt;th&gt;Office&lt;/th&gt;
                                                                    &lt;th&gt;Age&lt;/th&gt;
                                                                    &lt;th&gt;Start date&lt;/th&gt;
                                                                    &lt;th&gt;Salary&lt;/th&gt;
                                                                &lt;/tr&gt;
                                                            &lt;/thead&gt;
                                                        
                                                        
                                                            &lt;tbody&gt;
                                                                &lt;tr&gt;
                                                                    &lt;td&gt;Tiger Nixon&lt;/td&gt;
                                                                    &lt;td&gt;System Architect&lt;/td&gt;
                                                                    &lt;td&gt;Edinburgh&lt;/td&gt;
                                                                    &lt;td&gt;61&lt;/td&gt;
                                                                    &lt;td&gt;2011/04/25&lt;/td&gt;
                                                                    &lt;td&gt;$320,800&lt;/td&gt;
                                                                &lt;/tr&gt;
                                                                &lt;tr&gt;
                                                                    &lt;td&gt;Garrett Winters&lt;/td&gt;
                                                                    &lt;td&gt;Accountant&lt;/td&gt;
                                                                    &lt;td&gt;Tokyo&lt;/td&gt;
                                                                    &lt;td&gt;63&lt;/td&gt;
                                                                    &lt;td&gt;2011/07/25&lt;/td&gt;
                                                                    &lt;td&gt;$170,750&lt;/td&gt;
                                                                &lt;/tr&gt;
                                                            &lt;/tbody&gt;
                                                        &lt;/table&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                        </div> <!-- end preview code-->
                    </div> <!-- end tab-content-->

                    <table class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th class="no-sort text-center">
                                    No
                                </th>
                                <th>Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($internal as $key => $value) { ?>
                                <tr>
                                    <td class="table-user"><?= $no ?></td>
                                    <td><?= date('d-m-Y', strtotime($value['date'])) ?></td>
                                    <td><?= $value['from_tf'] ?></td>
                                    <td><?= $value['to_tf'] ?></td>
                                    <td>USD <?= number_format($value['amount'], 2, '.', ',') ?></td>
                                    <td>
                                        <?php if ($value['status'] == "Approved") {
                                            echo '<span class="badge badge-success-lighten rounded-pill">Approved</span>';
                                        } elseif ($value['status'] == "Pending") {
                                            echo '<span class="badge badge-warning-lighten rounded-pill">Pending</span>';
                                        } else {
                                            echo '<span class="badge badge-danger-lighten rounded-pill">Rejected</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>