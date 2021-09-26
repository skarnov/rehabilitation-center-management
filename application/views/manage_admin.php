<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Admins
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/add_admin">Add New Admin</a></li>
            <li class="active">Manage Admins</li>
        </ol>
    </section>
    <script type="text/javascript">
        var xmlhttp = false;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        function adminSearch(adminName)
        {
            if (adminName) {
                serverPage = '<?php echo base_url(); ?>evis_app/search_admin/' + adminName;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('admin_search').innerHTML = xmlhttp.responseText;
                };
                xmlhttp.send(null);
            }
        }
    </script>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-4">
                    <input type="text" onkeyup="adminSearch(this.value)" class="form-control input-lg" placeholder="Search Admin Name" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_admin');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_admin');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="admin_search" class="table table-bordered table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_admin as $v_admin) {
                            ?>
                            <tr>
                                <td><?php echo $v_admin->admin_name; ?></td>
                                <td><?php echo $v_admin->admin_email; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_app/edit_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Admin"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_app/delete_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Admin" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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