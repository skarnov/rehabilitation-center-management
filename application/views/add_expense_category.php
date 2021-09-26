<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Expense Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_expense_category"> Manage Expense Category</a></li>
            <li class="active">Add New Expense Category</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_expense_category');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_expense_category');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_app/save_expense_category" method="POST" name="expense">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Expense Category Name</label>
                                    <input type="text" name="expense_category_name" class="form-control" placeholder="Enter Expense Category Name">
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