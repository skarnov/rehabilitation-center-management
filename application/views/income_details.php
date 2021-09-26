<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Income Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_income"> Manage Incomes</a></li>
            <li class="active">Income Details</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="col-xs-8">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Income Date & Time</label>
                                <input type="text" class="form-control" value="<?php echo $income_details->income_time; ?>">
                            </div>
                            <div class="form-group">
                                <label>Income Category</label>
                                <input type="text" class="form-control" value="<?php echo $income_details->income_category_name; ?>">
                            </div>
                            <div class="form-group">
                                <label>Net Income</label>
                                <input type="text" class="form-control" value="<?php echo $income_details->net_income; ?>">
                            </div>
                            <div class="form-group">
                                <label>Income Received Amount</label>
                                <input type="text" class="form-control" value="<?php echo $income_details->income_received_amount; ?>">
                            </div>
                            <div class="form-group">
                                <label>Income Receivable</label>
                                <input type="text" class="form-control" value="<?php echo $income_details->income_receivable; ?>">
                            </div>
                            <div class="form-group">
                                <label>Comment</label>
                                <input type="text" class="form-control" value="<?php echo $income_details->comment; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </section>
</div>