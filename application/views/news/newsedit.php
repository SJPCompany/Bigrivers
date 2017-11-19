<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

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

            pas nieuwsbericht aan
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <?php echo validation_errors(); ?>
        <?php echo form_open('news/edit'); ?>
        <input name="id" type="hidden" value="<?= $news_item['id']?>">
        <label for="title"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Titel</label><br/>
        <input type="text" name="title" value="<?= $news_item['title'] ?>" /><br />
        <label for="title"><i class="fa fa-check" aria-hidden="true"></i> status</label><br/>
        <select name="status">
            <option value="actief">actief</option>
            <option value="nonactief">non-actief</option>
        </select><br>
        <label for="inhoud"><i class="fa fa-comments" aria-hidden="true"></i> inhoud</label><br/>
        <textarea name="inhoud" id="textbox" rows="10" cols="40"><?php echo $news_item['text'] ?></textarea><br>
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
        Alle rechten voorbehouden.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>

</body>
</html>