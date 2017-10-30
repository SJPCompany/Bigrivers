<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

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

            <h1>
          Voeg Nieuwsbericht toe
            </h1>
        </section>

    <!-- Main content -->
        <section class="content container-fluid">

            <?php echo validation_errors(); ?>

            <?php echo form_open('news/create'); ?>

            <label for="title">Title</label><br />
            <input type="text" name="title" /><br />

            <label for="inhoud">Inhoud</label><br />
            <textarea id="newstext" name="inhoud"></textarea><br>
<!--            <label for="newsimage">afbeelding</label><br />-->
<!--            <input type="file" name="newsimage"/>-->
            <input type="submit" name="submit" value="publiceer"/><br>
            </form>
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

</body>
</html>