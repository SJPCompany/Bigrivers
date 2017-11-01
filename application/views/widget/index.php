<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Widgets
        </h1>
    </section>
<br>
    <!-- Main content -->
    <?php foreach($widgets as $widget) { ?>
    <div class="col-md-3">
        <?php
            if ($widget->active == 1 || $widget->active == '1') { ?>

        <div class="box box-success box-solid">
            <?php } else { ?>
            <div class="box box-danger box-solid">

        <?php } ?>

            <div class="box-header with-border">
                <h3 class="box-title"><?=$widget->title?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
                <div><img src="https://bigriversstorage.blob.core.windows.net/buttonlogo/File-68a06725-4c13-48f5-886f-d15c3e6aa24f.jpg" width="200px" height="200px"></div>
                <br>
                <div><b>Created:</b>&nbsp&nbsp&nbsp<?=$widget->created?></div>
                <div><b>Modified:</b> <?=$widget->modified?></div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.content -->
<?php } ?>
    <!-- /.col -->
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