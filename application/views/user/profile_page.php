<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bigrivers
            <small> Profiel pagina</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <?php echo form_open_multipart('upload/do_upload');?>

        <input type="file" name="userfile" size="20" />

        <br/><br/>

        <input type="submit" value="upload" />

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
