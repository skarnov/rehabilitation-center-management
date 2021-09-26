<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <p><?php echo $total_income->total_income;?></p>
                        <p>Total Income</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>evis_app/manage_income" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-purple-gradient">
                    <div class="inner">
                        <p><?php echo $total_income_receivable->total_income_receivable;?></p>
                        <p>Total Income Receivable</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>evis_app/manage_income" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <p><?php echo $total_expense->total_expense;?></p>
                        <p>Total Expense</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>evis_app/manage_expense" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-yellow-gradient">
                    <div class="inner">
                        <p><?php echo $total_expense_payable->total_expense_payable;?></p>
                        <p>Total Expense Payable</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>evis_app/manage_expense" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-red-gradient">
                    <div class="inner">
                        <p><?php echo $total_patient_due->total_patient_due;?></p>
                        <p>Total Patient Dues</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>evis_patient/manage_patient" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <p><?php echo $total_patient->total_patient;?></p>
                        <p>Total Patients</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>evis_patient/manage_patient" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>
