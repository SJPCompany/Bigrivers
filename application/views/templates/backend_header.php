<?php
/*    if (!isset($_SESSION['userinfo'])) {
        $_SESSION['error'] = [];
        $error = "Geen toegang tot deze pagina";
        array_push($_SESSION['error'], $error);
        return redirect("errors/index");
    }
*/
?>
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
    <!-- Bootstrap 2.3.2 or unknown -->
    <link rel="stylesheet" href="<?= base_url(); ?>application/views/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>application/views/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>application/views/backend/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>application/views/backend/dist/css/style.css">
    <!-- Favicon -->
    <link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon">
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

    <!-- Tablesorter Script -->
    <script src='<?= base_url(); ?>js/tablesort.min.js'></script>

    <!-- Include sort types you need -->
    <script src='<?= base_url(); ?>js/tablesort.number.js'></script>
    <script src='<?= base_url(); ?>js/tablesort.date.js'></script>
    <script src="<?=base_url()?>/ckeditor/ckeditor.js"></script>
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
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>RVS</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Big</b>rivers</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Navigatie omschakelen</span>
            </a>
            <?php if ($_SESSION['userinfo']->name == 'programmeur') {?>
                <span class="Role"><b class="roletext">Programmeur</b></span>
            <?php } else { ?>
                <span class="Role"><b class="roletext">Beheerder</b></span>
            <?php } ?>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <ul class="dropdown-menu">
                            <li class="header">U hebt 4 berichten</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="https://i1.sndcdn.com/artworks-000198306615-0csi21-t500x500.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 minuten</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Waarom geen nieuw geweldig thema kopen?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>
                            <li class="footer"><a href="#">Zie alle berichten</a></li>
                        </ul>
                    </li>

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="http://localhost/bigrivers2017/backend/image/checkImage/profile_image.png/50/50" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?= $_SESSION['username'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="http://localhost/bigrivers2017/backend/image/checkImage/profile_image.png/150/150" class="img-circle" alt="User Image">

                                <p>
                                    <?= $_SESSION['username'] ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url("backend/user/profile") ?>" class="btn btn-default btn-flat">Profiel</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= base_url("backend/user/logout"); ?>" class="btn btn-default btn-flat">Uitloggen</a>
                                </div>
                            </li>
                        </ul>
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
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu</li>
                <!-- Homepage -->
                <li class=""><a href="<?= base_url("backend/user/index"); ?>"><i class="fa fa-home"></i> <span>Hoofdpagina</span></a></li>

                <!-- Bekijk gebruikers -->
                <li><a href="<?= base_url("backend/user/viewUsers"); ?>"><i class="fa fa-users"></i> <span>Gebruikers</span></a></li>

                <!-- Bekijk evenemten -->
                <li><a href="#"><i class="fa fa-address-book"></i> <span>Kalender</span></a></li>

                <!-- Nieuws -->
                <li><a href="<?= base_url("backend/newsbeheer")?>"><i class="fa fa-newspaper-o"></i> <span>Nieuwsberichten</span></a></li>

                <!-- Artiesten -->
                <li><a href="<?= base_url("artist/beheerartist")?>"><i class="fa fa-user-circle-o"></i> <span>Artiesten/bands</span></a></li>

                <!-- Evenementen en sponsors -->
                <li><a href="<?= base_url("event/eventbeheerpage")?>"><i class="fa fa-calendar"></i> <span>Evenementen</span></a></li>

                <li><a href="#"><i class="fa fa-money"></i> <span>Sponsoren</span></a></li>


                <!-- Genre's en podia -->
                <li><a href="<?= base_url("podia/podiabeheerpage")?>"><i class="fa fa-music"></i> <span>Podiums</span></a></li>

<!--                <li><a href="#"><i class="fa fa-tags"></i> <span>genres</span></a></li>-->

                <!-- Menu's -->
                <li><a href="#"><i class="fa fa-bars"></i> <span>Menu's</span></a></li>

                <!-- Frontpage knoppen -->
                <li><a href="<?= base_url("backend/widget/index")?>"><i class="fa fa-ellipsis-h"></i> <span>Widgets</span></a></li>

                <!-- Images -->
                <li><a href="<?= base_url("backend/image")?>"><i class="fa fa-picture-o"></i> <span>Plaatjes</span></a></li>

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
