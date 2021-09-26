<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Admin
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_admin"> Manage Admins</a></li>
            <li class="active">Add New Admin</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_admin');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_admin');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_app/save_admin" method="POST">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" required name="admin_name" class="form-control" placeholder="Enter Your Name">
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" required name="admin_email" class="form-control" placeholder="Enter Your Email Address">
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="required">*</span></label>
                                    <input type="password" required name="admin_password" data-toggle="tooltip" title="Password must be at least six characters" class="form-control" placeholder="Enter Your Password">
                                </div>
                                <div class="form-group">
                                    <label>Conform Password <span class="required">*</span></label>
                                    <input type="password" required name="conform_password" class="form-control" placeholder="Conform The Password">
                                </div>
                                <div class="bg-red-gradient"><?php echo validation_errors(); ?></div>
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
