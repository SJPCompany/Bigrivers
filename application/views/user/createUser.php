<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Creër gebruiker
        </h1> <br>
    </section>
    <!-- New User Form -->
    <div class="box box-info" style="width: 30%;">
        <div class="box-header with-border">
            <h3 class="box-title">Horizontale Formulier</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Emailadres</label>

                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Wachtwoord</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Herinner mij
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Annuleren</button>
                <button type="submit" class="btn btn-info pull-right">Registreer</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>
<!--
        <section>
            <?php /*if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Fout!</strong> <ul>';
                if ($_SESSION['error'] > 1) {
                    foreach ($_SESSION['error'] as $error) {
                        echo '<li>' . $error . '</li>';
                    }
                } else {
                    echo '<li>' . $_SESSION['error'] . '</li>';
                }
                echo '</ul></div>'; }
            */ ?>
            <div class="divform">
                <header>
                    <h1 class="headerform">Create User</h1>
                </header>
                <?php /*if ($_SESSION['userinfo']->name == 'programmeur') {*/ ?>
                <style>
                    .headerform {
                        background-color: #dd4b39;
                        color: white;
                    }
                </style> <?php /*} else { */ ?>
                <style>
                    .headerform {
                        background-color: #3c8dbc;
                        color: #f2f2f2;
                    }
                </style> <?php /*} */ ?>
            <form action="<? /*= base_url("backend/user/checkUserData"); */ ?>" method="post">
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
        </section>-->
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        All rights reserved.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>
