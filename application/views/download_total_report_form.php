<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                height: 842px;
                width: 595px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>

    <body>
        <div>
            <center>
                <table>
                    <tr>
                        <td><img src="<?php echo base_url(); ?>public/logo.png" style="width:100px; height:80px;"/></td>
                        <td style="width:400px;">
                            <div>
                                <h3 style="margin:0; text-align: center">Total Report</h3>
                                <h4 style="margin:0; text-align: center">(Total Report From <?php echo $start ?> To <?php echo $end ?>)</h4>
                            </div>
                        </td><br/>
                    </tr>
                </table>
                <br/>
                <table align="center" style="width:595px;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black;">Income Description</th>
                            <th style="border:1px solid black;">Income Amount</th>
                            <th style="border:1px solid black;">Income Receivable</th>
                            <th style="border:1px solid black;">Expense Description</th>
                            <th style="border:1px solid black;">Expense Amount</th>
                            <th style="border:1px solid black;">Expense Payable</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($income_report_info as $v_info) {
                            ?>
                            <tr>
                                <td style="border:1px solid black;"><?php
                                    echo '(';
                                    echo $v_info->income_category_name;
                                    echo ')';
                                    ?>
                                </td>
                                <td style="border:1px solid black;"><?php echo $v_info->income_received_amount ?></td>
                                <td style="border:1px solid black;"><?php echo $v_info->income_receivable ?></td>
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
                                <td style="border:1px solid black;"><?php
                                    echo '(';
                                    echo $v_info->expense_category_name;
                                    echo ')';
                                    ?>
                                </td>
                                <td style="border:1px solid black;"><?php echo $v_info->expense_paid_amount ?></td>
                                <td style="border:1px solid black;"><?php echo $v_info->expense_payable ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table><br/><br/>
                <p style="margin:0;">Total Income : <?php echo $total_income->total; ?></p>
                <p style="margin:0;">Total Receivable : <?php echo $total_income->due; ?></p>
                <br/><br/>
                <p style="margin:0;">Total Expense : <?php echo $total_expense->total; ?></p>
                <p style="margin:0;">Total Payable : <?php echo $total_expense->due; ?></p>
            </center>
        </div>       
    </body>
</html>
