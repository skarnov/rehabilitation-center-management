<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/skin-green.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/bootstrap3-wysihtml5.min.css">
        <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script>
            function check_delete()
            {
                var chk = confirm('Are You Want To Delete This');
                if (chk)
                {
                    return true;
                } else
                {
                    return false;
                }
            }
            function startTime()
            {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('txt').innerHTML =
                        h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
            }
            function checkTime(i)
            {
                if (i < 10) {
                    i = "0" + i;
                }
                
                return i;
            }
        </script>        
    </head>

    <body class="hold-transition skin-green sidebar-mini" onload="startTime()">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url(); ?>evis_app" class="logo">
                    <span class="logo-mini"><b>Evis</b></span>
                    <span class="logo-lg"><b>Evis Application</b></span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span><?php echo $this->session->userdata('admin_name'); ?> <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header bg-light-blue">
                                        <img src="<?php echo base_url(); ?>public/logo.png" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $this->session->userdata('admin_name'); ?>
                                            <small><div id="txt"></div></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>evis_app/edit_admin/<?php echo $this->session->userdata('admin_id'); ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>evis_app/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>" target="_blank">
                                <i class="fa fa-home"></i> <span>Home</span>
                            </a>
                        </li>
                        <li class="active treeview">
                            <a href="<?php echo base_url(); ?>evis_app">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Admin Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_app/add_admin"> Add Admin</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/manage_admin"> Manage Admins</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bed"></i> <span>Patient Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_patient/add_patient"> Add New Patient</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_patient/manage_patient"> Manage Patients</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i> <span>Payment Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_patient/add_payment"> Add New Payment</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_patient/manage_payment"> Manage Payments</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-arrow-down"></i> <span>Income Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_app/add_income"> Add New Income</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/manage_income"> Manage Incomes</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/add_income_category"> Add New Income Category</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/manage_income_category"> Manage Income Categories</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-arrow-up"></i> <span>Expense Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_app/add_expense"> Add New Expense</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/manage_expense"> Manage Expense</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/add_expense_category"> Add New Expense Category</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/manage_expense_category"> Manage Expense Categories</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-renren"></i> <span>Total Report</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>evis_app/income_report"> Income Report</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/expense_report"> Expense Report</a></li>
                                <li><a href="<?php echo base_url(); ?>evis_app/total_report"> Total Report</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="http://evistechnology.com" target="_blank">
                                <i class="fa fa-adjust"></i> <span>About</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <?php echo $dashboard; ?>
            <footer class="main-footer">
                <strong>Copyright &copy; 2016 <a href="http://evistechnology.com">Evis Technology</a>.</strong> All rights reserved.
            </footer>
        </div>
        <script src="<?php echo base_url(); ?>public/js/jQuery-2.1.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
            $(".chatbox").scrollTop(100000);
        </script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/jquery.knob.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>public/plugins/fastclick.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/app.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/dashboard.js"></script>
    </body>
</html>
