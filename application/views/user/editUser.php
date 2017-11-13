<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bewerk gebruiker
        </h1> <br>
    </section>


    <!-- Main content -->
    <section>
        <div class="divform">
            <header>
                <h1 class="headerform">Bewerk gebruiker</h1>
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
            <form action="<?= base_url("backend/user/checkEditUserData"); ?>" method="post">
                <?php foreach ($checkUserInfo as $userinfo) { ?>
                <label>Gebruikersnaam:</label>
                <input type="text" name="username" value='<?= $userinfo->username ?>'><br>
                <label>Wachtwoord:</label>
                <input type="text" name="password" value="<?= $userinfo->password ?>"><br>
                <label>Emailadres:</label>
                <input type="text" name="email" value='<?= $userinfo->email ?>'><br>
                <label>Selecteer rol:</label>
                <select class="select" name="role">
                    <?php foreach ($checkRoles as $rolename) {
                        if ($rolename->name == $userinfo->name) {?>
                            <option selected="selected" value="<?= $rolename->id ?>"><?= $userinfo->name ?></option>
                       <?php } else {  ?>
                            <option value="<?= $rolename->id ?>"><?= $rolename->name ?></option>
                      <?php  }
                    } ?>
                </select> <br><br>
                <label></label><input type="submit" name="submit" value="submit">
                <?php } ?>
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
        Alles wat jij wilt
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">SJP Company</a>.</strong> Alle rechten voorbehouden.
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
            <h3 class="control-sidebar-heading">Recente Activiteit</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:;">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's verjaardag</h4>

                            <p>Wordt 23 jaar op 24 April</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Voortgang taken</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:;">
                        <h4 class="control-sidebar-subheading">
                            Aangepast sjabloonontwerp
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
        <div class="tab-pane" id="control-sidebar-stats-tab">Inhoud statistieken tabblad</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">Algemene instellingen</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Gebruik van het rapportpaneel
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Enige informatie over deze algemene instellingsoptie
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