 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Bigrivers
                <small>Backend page</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-clock-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Huidige tijd</span>
                        <span class="info-box-number">
                            <?php
                            date_default_timezone_set('Europe/Amsterdam');
                            echo date("h:i");
                            ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Artiesten</span>
                        <span class="info-box-number">
                            <?php
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-calendar-check-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Volgende evenement</span>
                        <span class="info-box-number">
                            <?php
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-twitter"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Twitter volgers</span>
                        <span class="info-box-number">
                            <?php
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <!--------------------------
              | Your Page Content Here |
              -------------------------->

        </section>
        <!-- /.content -->
    </div>
 <!-- Main Footer -->
 <footer class="main-footer">
     <!-- To the right -->
     <div class="pull-right hidden-xs">
         All rights reserved.
     </div>
     <!-- Default to the left -->
     <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
 </footer>
