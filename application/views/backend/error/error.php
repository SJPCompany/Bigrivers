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
        <?php if (isset($_SESSION['error'])) {
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
        ?>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        All rights reserved.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>

