<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Admin
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
                <form action="<?php echo base_url(); ?>evis_app/update_admin" method="POST" name="admin">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" required name="admin_name" class="form-control" value="<?php echo $admin_info->admin_name; ?>">
                                    <input type="hidden" required name="admin_id" class="form-control" value="<?php echo $admin_info->admin_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="admin_email" class="form-control" value="<?php echo $admin_info->admin_email; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Updated Password</label>
                                    <input type="password" name="admin_password" class="form-control" placeholder="Enter Your Password">
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