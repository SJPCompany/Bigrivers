<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bigrivers backend</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url(); ?>application/views/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>application/views/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>application/views/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>application/views/backend//dist/css/AdminLTE.min.css">
    <!-- Favicon -->
    <link rel="icon" href="<?=base_url()?>img/favicon.ico" type="image/x-icon">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <?php if($_SESSION['userinfo']->name == 'programmeur') { ?>
    <link rel="stylesheet" href="<?= base_url(); ?>application/views/backend/dist/css/skins/skin-red.min.css">
    <?php } else { ?>
    <link rel="stylesheet" href="<?= base_url(); ?>application/views/backend/dist/css/skins/skin-blue.min.css">
    <?php } ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
    </script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<?php if($_SESSION['userinfo']->name == 'programmeur') { ?>
    <body class="hold-transition skin-red sidebar-mini">
<?php } else { ?>
    <body class="hold-transition skin-blue sidebar-mini">
<?php } ?>
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="../backend/index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>RVS</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Big</b>rivers</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <?php if ($_SESSION['userinfo']->name == 'programmeur') {?>
                <span class="Role"><b class="roletext">Developer</b></span>
            <?php } else { ?>
                <span class="Role"><b class="roletext">Admin</b></span>
            <?php } ?>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="http://www.digitspeak.com/wp-content/uploads/2016/02/4-1-300x295.png" class="img-circle" alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="http://www.digitspeak.com/wp-content/uploads/2016/02/4-1-300x295.png" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?= $_SESSION['username'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="http://www.digitspeak.com/wp-content/uploads/2016/02/4-1-300x295.png" class="img-circle" alt="User Image">

                                <p>
                                    <?= $_SESSION['username'] ?> - Web Developer
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Empty button</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url("user/profile") ?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= base_url("user/index"); ?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="#" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= $_SESSION['username'] ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu</li>
                <!-- Homepage -->
                <li class="active"><a href="<?= base_url("user/backend"); ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>

                <!-- Bekijk gebruikers -->
                <li><a href="<?= base_url("user/viewUsers"); ?>"><i class="fa fa-users"></i> <span>Bekijk gebruikers</span></a></li>

                <!-- Bekijk evenemten -->
                <li><a href="#"><i class="fa fa-address-book"></i> <span>Bekijk evenementen</span></a></li>

                <!-- Nieuws -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-newspaper-o"></i> <span>Nieuws</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Voeg nieuwsbericht toe</a></li>
                        <li><a href="#">Beheer nieuwsberichten</a></li>
                    </ul>
                </li>

                <!-- Artiesten -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-user-circle-o"></i> <span>Artiesten</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Beheer artiesten</a></li>
                        <li><a href="#">Voeg artiest / band toe</a></li>
                        <li><a href="#">Beheer optredens</a></li>
                        <li><a href="#">Voeg optredens toe</a></li>
                    </ul>
                </li>

                <!-- Evenementen en sponsors -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-calendar"></i> <span>Evenementen & sponsoren</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Beheer evenementen</a></li>
                        <li><a href="#">Voeg evenement toe</a></li>
                        <li><a href="#">Beheer sponsoren</a></li>
                        <li><a href="#">Voeg sponsor toe</a></li>
                    </ul>
                </li>

                <!-- Genre's en podia -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-music"></i> <span>Genre's & Podia</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Beheer genres</a></li>
                        <li><a href="#">Voeg genres toe</a></li>
                        <li><a href="#">Beheer podia</a></li>
                        <li><a href="#">Voeg podium toe</a></li>
                    </ul>
                </li>

                <!-- Menu's -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-bars"></i> <span>Menu's</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Beheer menubalk</a></li>
                        <li><a href="#">Voeg toe aan menubalk</a></li>
                    </ul>
                </li>

                <!-- Frontpage knoppen -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-ellipsis-h"></i> <span>Frontpage knoppen</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">Beheer knoppen</a></li>
                        <li><a href="#">Voeg knoppen toe</a></li>
                        <li><a href="#">Beheer widget</a></li>
                    </ul>
                </li>

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

