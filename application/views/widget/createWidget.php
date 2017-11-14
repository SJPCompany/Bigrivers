<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Creër widget
        </h1> <br>
    </section>
    <!-- New User Form -->
    <div class="box box-info" style="width: 30%;">
        <div class="box-header with-border">
            <h3 class="box-title">Horizontale Formulier</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
    <?php echo form_open('widget/checkWidgetData'); ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="title1" class="col-sm-2 control-label">Titel</label>

                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title2" placeholder="title">
                    </div>

                    <label for="title1" class="col-sm-2 control-label">Actief?</label>

                    <div class="col-sm-10">
                        <label class="radio-inline"><input type="radio" name="active" value="1">Ja</label>
                        <label class="radio-inline"><input type="radio" name="active" value="0">Nee</label>
                    </div>

                    <label for="intern_URL" class="col-sm-2 control-label">Interne URL</label>
                    <div class="col-sm-10">
                        <input type="url" name="intern_URL" class="form-control">
                    </div>
                    <label for="extern_URL" class="col-sm-2 control-label">Externe URL</label>
                    <div class="col-sm-10">
                        <input type="url" name="extern_URL" class="form-control">
                    </div>
                    <label for="document_URL" class="col-sm-2 control-label">Document URL</label>
                    <div class="col-sm-10">
                        <input type="url" name="document_URL" class="form-control">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Annuleren</button>
                <button type="submit" class="btn btn-info pull-right">Maak aan</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        All rights reserved.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>
