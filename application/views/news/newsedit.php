<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            pas nieuwsbericht aan
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <?php echo validation_errors(); ?>
        <?php echo form_open('news/edit'); ?>
        <input name="id" type="hidden" value="<?= $news_item['id']?>">
        <label for="title">Title</label><br />
        <input type="text" name="title" value="<?= $news_item['title'] ?>" /><br />
        <label for="inhoud">Inhoud</label><br />
        <textarea id="newstext" name="inhoud" ></textarea>
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