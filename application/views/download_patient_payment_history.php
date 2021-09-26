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
                        <?php
                        $image = $patient_info->patient_image;
                        if ($image) {
                            ?>
                            <td><img src="<?php echo base_url() . $patient_info->patient_image; ?>" style="height: 100px; width: 80px;" /></td><br/>
                        <?php
                        } else {
                            ?>
                            <td><img src="<?php echo base_url(); ?>img/no_image_thumb.gif" style="height: 100px; width: 80px;" /></td><br/>
                            <?php
                        }
                        ?>
                        <td style="width:400px;">
                            <div>
                                <h3 style="margin:0; text-align: center">Payment History</h3>
                            </div>
                        </td>
                    </tr>
                </table>
                <br/>
                <table align="center" style="width:595px;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black;">Patient Name</th>
                            <th style="border:1px solid black;">Total Due</th>
                            <th style="border:1px solid black;">Monthly Installment</th>
                            <th style="border:1px solid black;">Admission Date</th>
                            <th style="border:1px solid black;">Contact Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border:1px solid black;"><?php echo $patient_info->patient_name; ?></td>
                            <td style="border:1px solid black;"><?php echo $patient_info->patient_due; ?></td>
                            <td style="border:1px solid black;"><?php echo $patient_info->patient_monthly_installment; ?></td> 
                            <td style="border:1px solid black;"><?php echo $patient_info->patient_admission_date; ?></td>
                            <td style="border:1px solid black;"><?php echo $patient_info->patient_contact_mobile_1; ?></td>
                        </tr>
                    </tbody>
                </table>
                <br/><br/>
                <table align="center" style="width:595px;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black;">Payment Date</th>
                            <th style="border:1px solid black;">Money Receipt No</th>
                            <th style="border:1px solid black;">Paid Amount</th>
                            <th style="border:1px solid black;">Due Amount</th>
                            <th style="border:1px solid black;">Next Due Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($payment_history as $v_payment) {
                            ?>
                            <tr>
                                <td style="border:1px solid black;"><?php echo $v_payment->payment_date; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_payment->payment_receipt_no; ?></td> 
                                <td style="border:1px solid black;"><?php echo $v_payment->payment_paid; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_payment->payment_due; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_payment->payment_due_date; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <br/><br/>
            </center>
        </div>       
    </body>
</html>