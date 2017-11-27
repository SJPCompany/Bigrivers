<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Artiesten/Bands
        </h1>
        <br>
        <a type="button" class="btn btn-primary btn-lg" href="<?php echo base_url("artist/createartist")?>">Voeg artiest/band toe</a>
    </section>

    <!-- Main content -->
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
    <section class="content container-fluid">
        <?php
        if (isset($_SESSION['message']) ) {
            echo '<div class="alert alert-success alert-dismissable" id="alert-success-1"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Gelukt!</strong> <ul>';
            if ($_SESSION['message'] > 1 ) {
                foreach ($_SESSION['message'] as $message) {
                    echo '<li>' . $message . '</li>';
                }
            } else {
                echo '<li>' . $_SESSION['message'] . '</li>';
            }
            echo '</ul></div>'; }?>
        <br>
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Alle Artiesten/Bands</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="sort" class="sort" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;"><i class="fa fa-user" aria-hidden="true"></i> naam</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;"><i class="fa fa-comments" aria-hidden="true"></i> beschrijving</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;"><i class="fa fa-globe" aria-hidden="true"></i> website</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;"><i class="fa fa-youtube" aria-hidden="true"></i> youtube</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;"><i class="fa fa-facebook" aria-hidden="true"></i> facebook</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;"><i class="fa fa-twitter" aria-hidden="true"></i> twitter</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;"><i class="fa fa-pencil" aria-hidden="true"></i> wijzig</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;"><i class="fa fa-trash" aria-hidden="true"></i> verwijder</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($artist as $artist_data) { ?>
                                        <tr>
                                            <td><?php echo $artist_data['name'] ?></td>
                                            <td><?php
                                                if (strlen($artist_data['description']) > 0) echo $str = substr($artist_data['description'], 0, 50) . "...";?></td>
                                            <td><?php echo $artist_data['website'] ?></td>
                                            <td><?php echo $artist_data['youtube'] ?></td>
                                            <td><?php echo $artist_data['facebook'] ?></td>
                                            <td><?php echo $artist_data['twitter'] ?></td>
                                            <td><a class="mid"
                                                   href="<?php echo site_url('artist/artisteditdata/' . $artist_data['id']); ?>"><i class="fa fa-pencil"></i></a></td>
                                            <td><a class="mid" href="<?php echo site_url('artist/delete/' . $artist_data['id']); ?>"
                                                   onClick="return confirm('weet je zeker dat je deze artist wilt verwijderen?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
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
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        All rights reserved.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>