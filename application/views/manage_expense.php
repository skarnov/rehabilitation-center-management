<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Expense
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/add_expense">Add New Expense</a></li>
            <li class="active">Manage Expense</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Expense Category</th>
                            <th>Net Expense</th>
                            <th>Paid Amount</th>
                            <th>Expense Payable</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_expense as $v_expense) {
                            ?>
                            <tr>
                                <td><?php echo $v_expense->expense_time; ?></td>
                                <td><?php echo $v_expense->expense_category_name; ?></td>
                                <td><?php echo $v_expense->net_expense; ?></td>
                                <td><?php echo $v_expense->expense_paid_amount; ?></td>
                                <td><?php echo $v_expense->expense_payable; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_app/expense_details/<?php echo $v_expense->expense_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Expense Details"><i class="fa fa-shield"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_app/delete_expense/<?php echo $v_expense->expense_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Expense" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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