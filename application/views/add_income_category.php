<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Income Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_income_category"> Manage Income Category</a></li>
            <li class="active">Add New Income Category</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_income_category');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_income_category');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_app/save_income_category" method="POST" name="income">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Income Category Name</label>
                                    <input type="text" name="income_category_name" class="form-control" placeholder="Enter Income Category Name">
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