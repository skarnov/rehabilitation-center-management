<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Income Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_income_category"> Manage Income Category</a></li>
            <li class="active">Edit Income Category</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>evis_app/update_income_category" method="POST" name="income">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Income Category Name</label>
                                    <input type="text" name="income_category_name" value="<?php echo $income_category_info->income_category_name;?>" class="form-control">
                                    <input type="hidden" name="income_category" value="<?php echo $income_category_info->income_category;?>" class="form-control">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Edit</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
			</div>
        </div>
    </section>
</div>
