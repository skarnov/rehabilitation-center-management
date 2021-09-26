<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Income Report
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_income"> Manage Income</a></li>
            <li class="active">Income Report</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="panel-body">
                        <form action="<?php echo base_url() ?>evis_app/search_income_report" method="POST">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" required name="start" class="form-control">
                                </div> 
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" required name="end" class="form-control">
                                </div>
                            </div><br/><br/><br/><br/>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Search Report</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>