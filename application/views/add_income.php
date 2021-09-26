<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Income
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_income"> Manage Incomes</a></li>
            <li class="active">Add New Income</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            income_balance = document.income.income_balance.value;
            income_received_amount = document.income.income_received_amount.value;
            document.income.income_due.value = (income_balance * 1) - (income_received_amount * 1);
        }
    </script>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_income');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_income');
                    }
                    ?>
                </h3>
                <div class="bg-red-gradient"><?php echo validation_errors(); ?></div>
                <form action="<?php echo base_url(); ?>evis_app/save_income" method="POST" name="income">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label">Income Category</label>
                                    <div class="controls">
                                        <select name="income_category" class="form-control" tabindex="1">
                                            <option value="">Select Income Category</option>
                                            <?php
                                            foreach ($all_income_category as $v_category) {
                                                ?>
                                                <option value="<?php echo $v_category->income_category; ?>"><?php echo $v_category->income_category_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Net Income</label>
                                    <input type="text" name="net_income" id="income_balance" onmouseout="startCalc();" class="form-control" placeholder="Enter Net Income">
                                </div>
                                <div class="form-group">
                                    <label>Income Received Amount</label>
                                    <input type="text" name="income_received_amount" id="income_received_amount" onmouseout="startCalc();" class="form-control" placeholder="Income Received Amount">
                                </div>
                                <div class="form-group">
                                    <label>Income Receivable</label>
                                    <input type="text" name="income_receivable" id="income_due" onmouseout="startCalc();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Comment</label>
                                    <input type="text" name="comment" class="form-control" placeholder="Comment (If Any)">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
