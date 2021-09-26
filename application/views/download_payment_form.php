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

    <center>


        <table style="height:120px; width:110px;">
            <address>
                <strong><?php echo $payment_info->patient_name; ?></strong>
                <br>
                <?php echo $payment_info->patient_present_address; ?>
                <br>
                <abbr title="Phone">
                    Contact Number 1:
                </abbr> <?php echo $payment_info->patient_contact_mobile_1; ?>
                <br>
                <abbr title="Phone">
                    Contact Number 2:
                </abbr> <?php echo $payment_info->patient_contact_mobile_2; ?>
            </address>
        </table>



        <table style="height:120px; width:110px;">
            <p>
                <em>Date: <?php echo $payment_info->payment_date; ?></em>
            </p>
            <p>
                <em>Due Date: <?php echo $payment_info->payment_due_date; ?></em>
            </p>
            <p>
                <em>Receipt #: <?php echo $payment_info->payment_id; ?></em>
            </p>
        </table>


        <div class="row">
            <div class="text-center">
                <h1>Money Receipt</h1>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Monthly Installment</th>
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $payment_info->payment_balance; ?></td>
                        <td><?php echo $payment_info->payment_paid; ?></td>
                        <td><?php echo $payment_info->payment_due; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br/>
    </div>
</center>

</body>
</html>