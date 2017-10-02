    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create User
            </h1> <br>
        </section>


        <!-- Main content -->
        <section>
            <?php if(isset($_SESSION['error'])) {
                if ($_SESSION['error'] > 1) {
                    foreach ($_SESSION['error'] as $item) {
                        ?> <p class="errortext"><b> <?php echo $item; ?> </b></p> <?php
                        echo '<br /><br />';
                    }
                } else {
                    ?> <p class="errortext"><b> <?php echo $_SESSION['error']; ?> </b></p> <?php
                }
            } else {
            }
            unset($_SESSION['error']);
            ?>
            <div class="divform">
                <header>
                    <h1 class="headerform">Create User</h1>
                </header>
                <?php if ($_SESSION['userinfo']->name == 'programmeur') {?>
                <style>
                    .headerform {
                        background-color: #dd4b39;
                        color: white;
                    }
                </style> <?php } else { ?>
                <style>
                    .headerform {
                        background-color: #3c8dbc;
                        color: #f2f2f2;
                    }
                </style> <?php } ?>
            <form action="<?= base_url("backend/user/checkUserData"); ?>" method="post">
                <label>Username:</label>
                <input type="text" name="username" placeholder="John124"><br>
                <label>Password:</label>
                <input type="text" name="password" placeholder="******"><br>
                <label>Email:</label>
                <input type="text" name="email" placeholder="example@hotmail.com"><br>
                <label>Choose Role:</label>
                <select name="role">
                    <option value="1">programmeur</option>
                    <option value="2">beheerder</option>
                    <option value="3">gebruiker</option>
                </select> <br><br>
                <label></label><input type="submit" name="submit" value="submit">
            </form>
            </div>
        </section>
        <!-- /.content -->
    <!-- /.content-wrapper -->
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2017 <a href="#">SJP Company</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>