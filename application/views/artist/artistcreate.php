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
            echo '</ul></div>';
        }
        ?>

        <h1>
            Voeg Artiest toe
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <?php echo validation_errors(); ?>

        <?php echo form_open('artist/create'); ?>

        <label for="name"><i class="fa fa-user" aria-hidden="true"></i> Naam</label><br/>
        <input type="text" name="name" value="<?php echo set_value('name'); ?>"/><br/>
        <label for="website"><i class="fa fa-globe" aria-hidden="true"></i> Website</label><br/>
        <input type="text" name="website" value="<?php echo set_value('website'); ?>"/><br/>
        <label for="youtube"><i class="fa fa-youtube" aria-hidden="true"></i> Youtube</label><br/>
        <input type="text" name="youtube" value="<?php echo set_value('youtube'); ?>"/><br/>
        <label for="facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</label><br/>
        <input type="text" name="facebook" value="<?php echo set_value('facebook'); ?>"/><br/>
        <label for="twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</label><br/>
        <input type="text" name="twitter" value="<?php echo set_value('twitter'); ?>"/><br/>
        <label for="description"><i class="fa fa-comments" aria-hidden="true"></i> Beschrijving</label><br/>
        <textarea name="description" id="textbox" rows="10" cols="40"><?php echo set_value('description'); ?></textarea><br>
        <input class="btn primary #3c8dbc" type="submit" name="submit" value="maak aan"/><br>
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