<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Widgets
        </h1>
        <a href="<?= base_url('backend/widget/createWidget')?>" role="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Maak widget</a>
    </section>
<br>

    <!-- Main content -->
    <?php foreach($widgets as $widget) { ?>
    <div class="col-md-3">
        <?php
            if ($widget->active == 1 || $widget->active == 'yes') { ?>

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
                <div><b>Aangemaakt:</b>&nbsp&nbsp&nbsp<?=$widget->created?></div>
                <div><b>Gewijzigd:</b> <?=$widget->modified?></div>
                <div><a href="<?=$widget->link?>">Link</a></div>
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">URL's
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="<?= base_url('backend/widget/editWidget/'. $widget->id) ?>">Bewerken</a></li>
                    <li><a href="<?= base_url('backend/widget/deleteWidget/'. $widget->id) ?>" onClick="return confirm('weet je zeker dat je deze widget wilt verwijderen?')">Verwijderen</a></li>
                  </ul>
                </div>
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
        Alle rechten voorbehouden.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>