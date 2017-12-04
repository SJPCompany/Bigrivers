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
            Voeg Evenement toe
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <?php echo validation_errors(); ?>

        <?php echo form_open('event/createevent'); ?>

        <label for="title"><i class="fa fa-newspaper-o" aria-hidden="true"></i> naam</label><br/>
        <input type="text" name="name" value="<?php echo set_value('name'); ?>"/><br/>
        <label for="description"><i class="fa fa-comments" aria-hidden="true"></i> Beschrijving</label><br/>
        <textarea name="description" id="textbox" rows="10" cols="40"><?php echo set_value('description'); ?></textarea><br>
        <label class="form-check-label">
            <input name="youtube" class="form-check-input" type="checkbox" value="1">
            geef link naar Youtube kanaal weer
        </label>
        <label class="form-check-label">
            <input name="facebook" class="form-check-input" type="checkbox" value="1">
            geef link naar Facebookpagina weer
        </label>
        <label class="form-check-label">
            <input name="twitter" class="form-check-input" type="checkbox" value="1">
            geef link naar Twitterpagina weer
        </label><br>
        <label for="title"><i class="fa fa-check" aria-hidden="true"></i> starttijd</label><br/>
        <input type="datetime-local" name="starttime" value="<?php echo set_value('starttime'); ?>"/><br/>
        <label for="title"><i class="fa fa-check" aria-hidden="true"></i> eindtijd</label><br/>
        <input type="datetime-local" name="endtime" value="<?php echo set_value('endtime'); ?>"/><br/>
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" value="1" name="ticket">
            ticket verplicht
        </label><br>
        <label for="title"><i class="fa fa-newspaper-o" aria-hidden="true"></i> entreeprijs</label><br/>
        <input type="number" name="name" value="<?php echo set_value('price'); ?>"/><br/>
        <label for="title"><i class="fa fa-check" aria-hidden="true"></i> status</label><br/>
        <select name="status">
            <option value="actief">actief</option>
            <option value="nonactief">nonactief</option>
        </select><br/>
        <input type="submit" name="submit" value="publiceer"/><br>

        </form>
    </section>
    <!-- /.content -->
</div>
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Alle rechten voorbehouden.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>
</body>
</html>

