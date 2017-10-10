<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bigrivers
            <small>Plaatjes overview</small>
        </h1>
    </section>

    <?php if($_SESSION['userinfo']->name == 'programmeur') { ?>
        <style>
            th {
                background-color: #dd4b39;
                color: white;
            }
        </style>
    <?php } else { ?>
        <style>
            th {
                background-color: #3c8dbc;
                color: #f2f2f2;
            }
        </style>
    <?php } ?>
    <br>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="sort" class="sort" role="grid" aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Datum aangemaakt/aangepast</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">ipadress aanvrager</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Oorspronlijke bestandnaam</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;;">Oorspronlijke KB`s</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">breedte</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">hoogte</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Herseizen nodig</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">gechachete bestandnaam</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">gechachete KB`s</th>
                                </thead>
                                <tbody>
                                <?php foreach ($imagesinfo as $imageinfo) { ?>
                                    <tr>
                                        <td><?= $imageinfo->datetime ?></td>
                                        <td><?= $imageinfo->ip_adres_aanvrager ?></td>
                                        <td><?= $imageinfo->orginal_filename ?></td>
                                        <td><?= $imageinfo->orginal_KB ?></td>
                                        <td><?= $imageinfo->width ?></td>
                                        <td><?= $imageinfo->height?></td>
                                        <td><?= $imageinfo->resize_necessary?></td>
                                        <td><?= $imageinfo->cached_filename?></td>
                                        <td><?= $imageinfo->cached_KB?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    new Tablesort(document.getElementById('sort'));
</script>

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        All rights reserved.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>
