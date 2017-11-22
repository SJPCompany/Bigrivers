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
            Voeg Podia toe
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <?php echo validation_errors(); ?>

        <?php echo form_open('podia/create'); ?>

        <label for="podianame"><i class="fa fa-music" aria-hidden="true"></i> podia naam</label><br/>
        <input type="text" name="podianame" value="<?php echo set_value('podianame'); ?>"/><br/>
        <label for="name"><i class="fa fa-road" aria-hidden="true"></i> straat</label><br/>
        <input type="text" name="street" value="<?php echo set_value('street'); ?>"/><br/>
        <label for="name"><i class="fa fa-home" aria-hidden="true"></i> huisnummer</label><br/>
        <input type="text" name="housenumber" value="<?php echo set_value('housenumber'); ?>"/><br/>
        <label for="name"><i class="fa fa-home" aria-hidden="true"></i> postcode</label><br/>
        <input type="text" name="zip" value="<?php echo set_value('zip'); ?>"/><br/>
        <label for="name"><i class="fa fa-building" aria-hidden="true"></i> stad</label><br/>
        <input type="text" name="city" value="<?php echo set_value('city'); ?>"/><br/>
        <label for="name"><i class="fa fa-check-square-o" aria-hidden="true"></i> status</label><br/>
        <select name="status">
            <option value="actief">actief</option>
            <option value="nonactief">non-actief</option>
        </select><br><br>
        <input class="btn primary #3c8dbc" type="submit" name="submit" value="maak aan"/><br>
        </form>
    </section>
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