<!DOCTYPE html>

<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Developed By Evis Technology" />
        <link href="<?php echo base_url(); ?>assets/public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo base_url(); ?>assets/public/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <script src="<?php echo base_url(); ?>assets/public/js/jquery-1.11.1.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <!-- Banner -->
        <div class="banner">
            <div class="container">
                <!-- Header -->
                <div class="header">	
                    <div class="logo">
                        <a href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i>Evis Rehabilitation Center</a>
                    </div>
                    <div class="top-nav">
                        <span class="menu"><img src="<?php echo base_url(); ?>assets/public/images/menu.png" alt=" " /></span>
                        <ul class="nav">
                            <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>evis_web/about">About</a></li>
                            <li><a href="<?php echo base_url(); ?>">Admission</a></li>
                            <li><a href="<?php echo base_url(); ?>">Event</a></li>
                            <li><a href="<?php echo base_url(); ?>">Donate</a></li>
                            <li><a href="<?php echo base_url(); ?>">Contact Us</a></li>
                        </ul>
                        <!-- Script For Menu -->
                        <script>
                            $("span.menu").click(function () {
                                $("ul.nav").slideToggle(300, function () {
                                    // Animation complete.
                                });
                            });
                        </script>
                        <!-- Script For Menu -->
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <!-- End Header -->
                <div class="banner-info">
                    <form>
                        <input type="text" value="Enter Your Mail..." onfocus="this.value = '';" onblur="if (this.value === '') {this.value = 'Enter Your Mail...';}" required="">
                        <input type="submit" value="Subscribe" >
                    </form>
                </div>
                <div class="banner-info-grids">
                    <div class="col-md-4 banner-info-grid">
                        <div class="banner-info-grid1">
                            <div class="banner-info-grid-left">
                                <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            </div>
                            <div class="banner-info-grid-right">
                                <h4>Back in Your Life</h4>
                                <p>Say bye bye drugs</p>
                                <div class="more">
                                    <a href="<?php echo base_url(); ?>">More</a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-4 banner-info-grid">
                        <div class="banner-info-grid1">
                            <div class="banner-info-grid-left">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </div>
                            <div class="banner-info-grid-right">
                                <h4>Back in Your Family</h4>
                                <p>Pickup a chance to get back to your family</p>
                                <div class="more">
                                    <a href="<?php echo base_url(); ?>">More</a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-4 banner-info-grid">
                        <div class="banner-info-grid1">
                            <div class="banner-info-grid-left">
                                <span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
                            </div>
                            <div class="banner-info-grid-right">
                                <h4>Back in Your Job</h4>
                                <p>Being again productive</p>
                                <div class="more">
                                    <a href="<?php echo base_url(); ?>">More</a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->
        <!-- Banner Bottom -->
        <div class="banner-bottom">
            <div class="banner-bottom-grid">
                <div class="banner-bottom-left">
                    <div class="banner-bottom-left1">
                        <h3>01. Detoxification</h3>
                        <div class="more m1">
                            <a href="<?php echo base_url(); ?>">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="banner-bottom-right">
                    <div class="banner-bottom-right1">
                        <h3>02. Behavioral Counseling</h3>
                        <div class="more m1">
                            <a href="<?php echo base_url(); ?>">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="banner-bottom-grid">
                <div class="banner-bottom-left banner-bottom-lft1">
                    <div class="banner-bottom-left1">
                        <h3>03. Medication</h3>
                        <div class="more m1">
                            <a href="<?php echo base_url(); ?>">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="banner-bottom-right banner-bottom-rit1">
                    <div class="banner-bottom-right1">
                        <h3>04. Evaluation for mental health.</h3>
                        <div class="more m1">
                            <a href="<?php echo base_url(); ?>">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- End Banner Bottom -->
        <?php echo $content ?>
        <div class="footer">
            <div class="container">
                <div class="footer-grds">
                    <div class="footer-grds-left">
                        <p>Copyright © Evis Rehabilitation Center. All Rights Reserved</p>
                    </div>
                    <div class="footer-grds-right">
                        <ul>
                            <li><a href="#" class="fa"></a></li>
                            <li><a href="#" class="fb"></a></li>
                            <li><a href="#" class="fc"></a></li>
                            <li><a href="#" class="fd"></a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/public/js/bootstrap.js"></script>
        <script>
            $("span.menu").click(function () {
                $("ul.nav").slideToggle(300, function () {
                });
            });
        </script>
    </body>
</html>