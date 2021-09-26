<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Forgot Password</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/skin-green.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/bootstrap3-wysihtml5.min.css">
        <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url(); ?>"><b>Evis</b> ERP</a>
            </div>
            <div class="login-box-body">
                <form action="<?php echo base_url(); ?>evis_login/reset_password" method="POST">
                    <div style="background-color:wheat;"><?php echo validation_errors(); ?></div>
                    <h3 style="color:red">
                        <?php
                        $exc = $this->session->userdata('exception');
                        if (isset($exc)) {
                            echo $exc;
                            $this->session->unset_userdata('exception');
                        }
                        ?>
                    </h3>
                    <div class="form-group has-feedback">
                        <input type="email" name="admin_email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-danger btn-block btn-flat">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>public/js/jQuery-2.1.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
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