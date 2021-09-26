<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Expense Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_expense"> Manage Expense</a></li>
            <li class="active">Expense Details</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="col-xs-8">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Expense Date & Time</label>
                                <input type="text" class="form-control" value="<?php echo $expense_details->expense_time; ?>">
                            </div>
                            <div class="form-group">
                                <label>Expense Category</label>
                                <input type="text" class="form-control" value="<?php echo $expense_details->expense_category_name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Net Expense</label>
                                <input type="text" class="form-control" value="<?php echo $expense_details->net_expense; ?>">
                            </div>
                            <div class="form-group">
                                <label>Expense Paid Amount</label>
                                <input type="text" class="form-control" value="<?php echo $expense_details->expense_paid_amount; ?>">
                            </div>
                            <div class="form-group">
                                <label>Expense Payable</label>
                                <input type="text" class="form-control" value="<?php echo $expense_details->expense_payable; ?>">
                            </div>
                            <div class="form-group">
                                <label>Comment</label>
                                <input type="text" class="form-control" value="<?php echo $expense_details->comment; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </section>
</div>