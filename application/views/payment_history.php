<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Payments
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_patient/manage_patient">Manage Patients</a></li>
            <li class="active">Manage Payments</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <?php
                if($payment_history==NULL)
                {
            ?>
            <div class="box-body bg-red-gradient">
                Not Found
            </div>
            <?php
                }
                else
                {
            ?>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-1">
                        <a href="<?php echo base_url(); ?>evis_patient/download_patient_payment_history/<?php echo $patient_id ?>" class="btn btn-success">Download PDF</a>
                    </div>    
                </div><br>
                <table id="example1" class="table table-bordered table-striped">
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
                        foreach ($payment_history as $v_payment) {
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
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>
</div>