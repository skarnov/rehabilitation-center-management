<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Expense
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_expense"> Manage Expense</a></li>
            <li class="active">Add New Expense</li>
        </ol>
    </section>
    <script type="text/javascript">
        function startCalc() {
            interval = setInterval("calc()", 1);
        }
        function calc() {
            expense_balance = document.expense.expense_balance.value;
            expense_received_amount = document.expense.expense_received_amount.value;
            document.expense.expense_due.value = (expense_balance * 1) - (expense_received_amount * 1);
        }
    </script>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_expense');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_expense');
                    }
                    ?>
                </h3>
                <div class="bg-red-gradient"><?php echo validation_errors(); ?></div>
                <form action="<?php echo base_url(); ?>evis_app/save_expense" method="POST" name="expense">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label">Expense Category</label>
                                    <div class="controls">
                                        <select name="expense_category" class="form-control" tabindex="1">
                                            <option value="">Select Expense Category</option>
                                            <?php
                                            foreach ($all_expense_category as $v_category) {
                                                ?>
                                                <option value="<?php echo $v_category->expense_category; ?>"><?php echo $v_category->expense_category_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Net Expense</label>
                                    <input type="text" name="net_expense" id="expense_balance" onmouseout="startCalc();" class="form-control" placeholder="Enter Net Expense">
                                </div>
                                <div class="form-group">
                                    <label>Expense Paid Amount</label>
                                    <input type="text" name="expense_paid_amount" id="expense_received_amount" onmouseout="startCalc();" class="form-control" placeholder="Expense Paid Amount">
                                </div>
                                <div class="form-group">
                                    <label>Expense Payable</label>
                                    <input type="text" name="expense_payable" id="expense_due" onmouseout="startCalc();" class="form-control">
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
