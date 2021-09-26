<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Incomes
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/add_income">Add New Income</a></li>
            <li class="active">Manage Incomes</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Income Category</th>
                            <th>Net Income</th>
                            <th>Received Amount</th>
                            <th>Income Receivable</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_income as $v_income) {
                            ?>
                            <tr>
                                <td><?php echo $v_income->income_time; ?></td>
                                <td><?php echo $v_income->income_category_name; ?></td>
                                <td><?php echo $v_income->net_income; ?></td>
                                <td><?php echo $v_income->income_received_amount; ?></td>
                                <td><?php echo $v_income->income_receivable; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_app/income_details/<?php echo $v_income->income_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Income Details"><i class="fa fa-shield"></i></a>
                                    
                                    
                                <?php 
									
									$payment_id=$v_income->payment_id;
									if($payment_id==NULL)
									{
                                ?>
                                
									 <a href="<?php echo base_url(); ?>evis_app/delete_income/<?php echo $v_income->income_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Income" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
									
                                <?php
								}
								else
								{
                                ?>
                                    
                                    <a href="<?php echo base_url(); ?>evis_app/delete_income_payment/<?php echo $v_income->income_id; ?>/<?php echo $v_income->payment_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Income" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                
                                
                                <?php
								}
                                ?>
                                
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
