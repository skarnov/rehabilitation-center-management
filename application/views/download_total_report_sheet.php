<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Download Total Report Sheet
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/total_report"> Search Total Report</a></li>
            <li class="active">Download Total Report Sheet</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="col-xs-12">
                        <div class="box-body">
                            <div class="col-xs-1">
                                <a href="<?php echo base_url(); ?>evis_app/download_total_report/<?php echo $start ?>/<?php echo $end ?>" class="btn btn-success">Download PDF</a>
                            </div>
                            <div class="col-xs-12">
                                <table class="table">
                                    <div class="text-center">
                                        <h3 text-center>Total Report</h3>
                                        <h4>(Total Report From <?php echo $start ?> To <?php echo $end ?>)</h4><hr/>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>Income Description</th>
                                            <th>Income Amount</th>
                                            <th>Income Receivable</th>
                                            <th>Expense Description</th>
                                            <th>Expense Amount</th>
                                            <th>Expense Payable</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($income_report_info as $v_info) {
                                            ?>
                                            <tr>
                                                <td><?php
                                                    echo '(';
                                                    echo $v_info->income_category_name;
                                                    echo ')';
                                                    ?>
                                                </td>
                                                <td><?php echo $v_info->income_received_amount ?></td>
                                                <td><?php echo $v_info->income_receivable ?></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        foreach ($expense_report_info as $v_info) {
                                            ?>
                                            <tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td><?php
                                                    echo '(';
                                                    echo $v_info->expense_category_name;
                                                    echo ')';
                                                    ?>
                                                </td>
                                                 <td><?php echo $v_info->expense_paid_amount ?></td>
                                                <td><?php echo $v_info->expense_payable ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table><br/>
                                <h4 style="text-align: center;">Total Income : <?php echo $total_income->total; ?></h4>
                                <h4 style="text-align: center;">Total Receivable : <?php echo $total_income->due; ?></h4>
                                <br/>
                                <h4 style="text-align: center;">Total Expense : <?php echo $total_expense->total; ?></h4>
                                <h4 style="text-align: center;">Total Payable : <?php echo $total_expense->due; ?></h4>
                            </div> 
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </section>
</div>
