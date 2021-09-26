<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Download Expense Report Sheet
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/expense_report"> Search Expense Report</a></li>
            <li class="active">Download Expense Report Sheet</li>
        </ol>
    </section>
    <section class="content">
        <?php
        if ($expense_report_info == !NULL) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="col-xs-12">
                            <div class="box-body">
                                <div class="col-xs-1">
                                    <a href="<?php echo base_url(); ?>evis_app/download_expense_report/<?php echo $start ?>/<?php echo $end ?>" class="btn btn-success">Download PDF</a>
                                </div>
                                <div class="col-xs-12">
                                    <table class="table">
                                        <div class="text-center">
                                            <h3 text-center>Expense Report</h3>
                                            <h4>(Expense Report From <?php echo $start ?> To <?php echo $end ?>)</h4><hr/>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Net Amount</th>
                                                <th>Paid Amount</th>
                                                <th>Payable Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($expense_report_info as $v_info) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $v_info->expense_category_name; ?></td>
                                                    <td><?php echo $v_info->net_expense; ?></td>
                                                    <td><?php echo $v_info->expense_paid_amount; ?></td>
                                                    <td><?php echo $v_info->expense_payable; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr/>
                                    <h4 style="text-align: center;">Total Expense : <?php echo $total_expense->total; ?></h4>
                                    <h4 style="text-align: center;">Total Payable : <?php echo $total_expense->due; ?></h4>
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
