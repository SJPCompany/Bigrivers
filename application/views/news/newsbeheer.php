<div class="content-wrapper">
    <section class="content-header">
        <h1>
            nieuwsberichten
        </h1>
        <br>
        <a type="button" class="btn btn-primary btn-lg" href="<?php echo base_url("news/newscreate")?>">Voeg Nieuws toe</a>
    </section>
    <br/>

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
                <h3 class="box-title">Beheer niewsberichten</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="sort" class="sort" role="grid" aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        style="width: 120px;"><i class="fa fa-text-height" aria-hidden="true"></i> title
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        style="width: 120px;"><i class="fa fa-newspaper-o" aria-hidden="true"></i> tekst
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        style="width: 120px;"><i class="fa fa-user" aria-hidden="true"></i> auteur
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        style="width: 120px;"><i class="fa fa-clock-o" aria-hidden="true"></i> aanmaakdatum
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        style="width: 120px;"><i class="fa fa-check-square-o" aria-hidden="true"></i> status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        style="width: 120px;"><i class="fa fa-pencil" aria-hidden="true"></i> wijzig
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        style="width: 120px;"><i class="fa fa-trash" aria-hidden="true"></i> verwijder
                                    </th>
                                </thead>
                                <tbody>
                                <?php foreach ($news as $news_data) { ?>
                                    <tr>
                                        <td><?php echo $news_data['title'] ?></td>
                                        <td><?php
                                            if (strlen($news_data['text']) > 0) echo $str = substr($news_data['text'], 0, 50) . "..."; ?></td>
                                        <td><?php echo $news_data['creator'] ?></td>
                                        <td><?php echo $news_data['creation_date'] ?></td>
                                        <?php if ($news_data['status'] == 'actief') { ?>
                                            <td><span class="label label-success">Actief</span></td>
                                        <?php } else { ?>
                                            <td><span class="label label-danger">inactief</span></td>
                                        <?php } ?>
                                        <td><a class="mid" href="<?php echo site_url('news/newseditpage/' . $news_data['id']); ?>"><i class="fa fa-pencil"></i></a></td>
                                        <td><a class="mid" href="<?php echo site_url('news/delete/' . $news_data['id']); ?>"
                                               onClick="return confirm('weet je zeker dat je dit arikel wilt verwijderen?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<!-- /.content-wrapper -->
<script>
    new Tablesort(document.getElementById('sort'));
</script>
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Alle rechten veoorbehouden.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>

</body>
</html>