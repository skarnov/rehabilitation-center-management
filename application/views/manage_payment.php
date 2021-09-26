<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Payments
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_patient/add_payment">Add New Payment</a></li>
            <li class="active">Manage Payments</li>
        </ol>
    </section>
    <script type="text/javascript">
        var xmlhttp = false;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        function paymentSearch(paymentInfo)
        {
            if (paymentInfo) {
                serverPage = '<?php echo base_url(); ?>evis_patient/search_payment/' + paymentInfo;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('payment_search').innerHTML = xmlhttp.responseText;
                };
                xmlhttp.send(null);
            }
        }
    </script>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-6">
                    <input type="text" onkeyup="paymentSearch(this.value)" class="form-control input-lg" placeholder="Search Money Receipt No Or Patient Name" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
            <div class="box-body">
                <table id="payment_search" class="table table-bordered table-striped">
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
                        foreach ($all_payment as $v_payment) {
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
        </div>
    </section>
</div>