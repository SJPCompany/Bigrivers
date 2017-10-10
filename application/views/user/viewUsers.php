 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All users
            </h1>
            <br>
            <a href="<?= base_url("backend/user/createUser"); ?>" style="font-size: 140%;">
                Create user
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
        <table>
            <thead>
            <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Block/Unblock</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                <td><?= $user->username ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->name ?></td>
                <?php if ($user->status == 0 || $user->status == '0') { ?>
                    <td>Actief</td>
                <?php } else { ?>
                    <td>Geblokt</td>
                <?php } ?>
                <td><a class="mid" href="<?= base_url('backend/user/editUser/'. $user->id) ?>"><i class="fa fa-pencil"></i></a></td>
                <td><a href="#">Block/Unblock</a></td>
                <td><a href="#">Delete</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>