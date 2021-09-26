<div class="content-wrapper">
    <section class="content-header">
        <h1>
            View Payment Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_patient/manage_payment"> Manage Payment</a></li>
            <li class="active">View Payment Details</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
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
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <p>
                                    <em>Date: <?php echo $payment_info->payment_date; ?></em>
                                </p>
                                <p>
                                    <em>Due Date: <?php echo $payment_info->payment_due_date; ?></em>
                                </p>
                                <p>
                                    <em>Receipt #: <?php echo $payment_info->payment_id; ?></em>
                                </p>
                            </div>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>