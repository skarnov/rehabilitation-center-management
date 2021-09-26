<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Download Income Report Sheet
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/income_report"> Search Income Report</a></li>
            <li class="active">Download Income Report Sheet</li>
        </ol>
    </section>
    <section class="content">
        <?php
        if ($income_report_info == !NULL) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="col-xs-12">
                            <div class="box-body">
                                <div class="col-xs-1">
                                    <a href="<?php echo base_url(); ?>evis_app/download_income_report/<?php echo $start ?>/<?php echo $end ?>" class="btn btn-success">Download PDF</a>
                                </div>
                                <div class="col-xs-12">
                                    <table class="table">
                                        <div class="text-center">
                                            <h3 text-center>Income Report</h3>
                                            <h4>(Income Report From <?php echo $start ?> To <?php echo $end ?>)</h4><hr/>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Net Amount</th>
                                                <th>Received Amount</th>
                                                <th>Receivable Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($income_report_info as $v_info) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $v_info->income_category_name; ?></td>
                                                    <td><?php echo $v_info->net_income; ?></td>
                                                    <td><?php echo $v_info->income_received_amount; ?></td>
                                                    <td><?php echo $v_info->income_receivable; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr/>
                                    <h4 style="text-align: center;">Total Income : <?php echo $total_income->total; ?></h4>
                                    <h4 style="text-align: center;">Total Receivable : <?php echo $total_income->due; ?></h4>
                                </div> 
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <h3 style="color:red">No Record Found in This Date</h3>
        <?php } ?>
    </section>
</div>
