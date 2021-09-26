<thead>
    <tr>
        <th>Patient Name</th>
        <th>Money Receipt No</th>
        <th>Paid Amount</th>
        <th>Due Amount</th>
        <th>Payment Date</th>
        <th>Next Due Date</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
    foreach ($search_payment as $v_payment) {
        ?>
        <tr>
            <td><?php echo $v_payment->patient_name; ?></td>
            <td><?php echo $v_payment->payment_receipt_no; ?></td>
            <td><?php echo $v_payment->payment_paid; ?></td>
            <td><?php echo $v_payment->payment_due; ?></td>
            <td><?php echo $v_payment->payment_date; ?></td>
            <td><?php echo $v_payment->payment_due_date; ?></td>
            <td>
                <a href="<?php echo base_url(); ?>evis_patient/payment_details/<?php echo $v_payment->payment_id; ?>" class="btn btn-success" data-toggle="tooltip" title="View Payment Details"><i class="fa fa-stop"></i></a>
                <a href="<?php echo base_url(); ?>evis_patient/delete_payment/<?php echo $v_payment->payment_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Payment" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
    }
    ?>
</tbody>