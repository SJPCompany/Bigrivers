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

