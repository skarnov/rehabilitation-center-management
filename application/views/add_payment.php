<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Payment
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_patient/manage_payment"> Manage Payment</a></li>
            <li class="active">Add New Payment</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            var due_amount = document.payment.due_amount.value;
            var balance = document.payment.balance.value;
            var paid = document.payment.paid.value;
            document.payment.due.value = (balance * 1) + (due_amount * 1) - (paid * 1);
        }
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
        function patientInformation(patientId)
        {
            if (patientId) {
                serverPage = '<?php echo base_url(); ?>evis_patient/show_patient_information/' + patientId;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('patient_information').innerHTML = xmlhttp.responseText;
                };
                xmlhttp.send(null);
            }
        }
    </script>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_patient/save_payment" method="POST" name="payment">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_payment');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_payment');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Receipt No <span class="required">*</span></label>
                                    <input type="text" required name="payment_receipt_no" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Payment Date <span class="required">*</span></label>
                                    <input type="text" required name="payment_date" class="form-control" value="<?php echo " " . date("d-m-Y") . " "; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Next Due Date </label>
                                    <input type="text" name="payment_due_date" class="form-control" value="<?php echo " " . date("d-m-Y", strtotime("+31 days")) . " "; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Monthly Installment</label>
                                    <input type="text" name="payment_balance" id="balance" onmouseout="startCalc();" class="form-control" placeholder="Enter Monthly Installment">
                                </div>
                                <div class="form-group">
                                    <label>Paid Amount</label>
                                    <input type="text" name="payment_paid" id="paid" onmouseout="startCalc();" class="form-control" placeholder="Enter Paid Amount">
                                </div>
                                <div class="form-group">
                                    <label>Due Amount</label>
                                    <input type="text" name="payment_due" id="due" class="form-control btn-danger" onmouseout="startCalc();" placeholder="Due Amount" >
                                </div>
                                <div class="form-group">
                                    <label>Comment</label>
                                    <input type="text" name="payment_comment" class="form-control" placeholder="Comment (If Any)">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="btn-danger"><?php echo validation_errors(); ?></div>
                                <div class="form-group">
                                    <label class="control-label">Select Patient <span class="required">*</span></label>
                                    <select name="patient_id" id="patient_id" onchange="patientInformation(this.value)" class="form-control">
                                        <option value="">Select Patient</option>
                                        <?php
                                        foreach ($all_patient as $v_patient) {
                                            ?>
                                            <option value="<?php echo $v_patient->patient_id; ?>"><?php echo $v_patient->patient_name; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" id="patient_information"></div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>