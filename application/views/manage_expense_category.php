<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Expense Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/add_expense_category">Add New Expense Category</a></li>
            <li class="active">Manage Expense Category</li>
        </ol>
    </section>
    <section class="content">
		<h3 style="color:green">
			<?php
			$msg = $this->session->userdata('edit_expense_category');
			if (isset($msg)) {
				echo $msg;
				$this->session->unset_userdata('edit_expense_category');
			}
			?>
		</h3>
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Expense Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_expense_category as $v_expense) {
                            ?>
                            <tr>
                                <td><?php echo $v_expense->expense_category_name; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_app/edit_expense_category/<?php echo $v_expense->expense_category; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Category"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_app/delete_expense_category/<?php echo $v_expense->expense_category; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Category" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
