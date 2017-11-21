 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gebruikers
            </h1>
            <br>
            <a href="<?= base_url("backend/user/createUser"); ?>" class="btn btn-primary btn-lg">
                Maak gebruiker
            </a>
        </section>

        <!-- Main content -->
        <?php if($_SESSION['userinfo']->name == 'programmeur') { ?>
            <style>
                th {
                    background-color: #dd4b39;
                    color: white;
                }
            </style>
       <?php } else { ?>
            <style>
                th {
                    background-color: #3c8dbc;
                    color: #f2f2f2;
                }
            </style>
        <?php } ?>
        <section class="content container-fluid">
            <?php
            if (isset($_SESSION['message']) ) {
                echo '<div class="alert alert-success alert-dismissable" id="alert-success-1"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Gelukt!</strong> <ul>';
                if ($_SESSION['message'] > 1 ) {
                    foreach ($_SESSION['message'] as $message) {
                        echo '<li>' . $message . '</li>';
                    }
                } else {
                    echo '<li>' . $_SESSION['message'] . '</li>';
                }
                echo '</ul></div>'; }?>
 <br>
 <div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Alle gebruikers</h3>
         <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Gebruikersnaam</th>
                <th>Emailadres</th>
                <th>Rol</th>
                <th>Status</th>
                <th>Bewerken</th>
                <th>Verwijderen</th>
              </tr>
              </thead>
              <tbody>
            <?php foreach ($users as $user) { ?>
              <tr>
                <td><?= $user->username ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->name ?></td>
                <?php if ($user->status == 0 || $user->status == '0') { ?>
                    <td><span class="label label-success">Actief</span></td>
                <?php } else { ?>
                    <td><span class="label label-danger">Geblokt</span></td>
                <?php } ?>
                <td><a class="mid" href="<?= base_url('backend/user/editUser/'. $user->id) ?>"><i class="fa fa-pencil"></i></a></td>
                <td><a href="<?php echo site_url('user/deleteUser/'.$user->id);?>" onClick="return confirm('weet je zeker dat je deze gebruiker wilt verwijderen?')">Verwijder</a></td>
              </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-footer -->
    </div>
 <script>
     new Tablesort(document.getElementById('sort'));
 </script>
 <footer class="main-footer">
     <!-- To the right -->
     <div class="pull-right hidden-xs">
         Alle rechten voorbehouden.
     </div>
     <!-- Default to the left -->
     <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
 </footer>