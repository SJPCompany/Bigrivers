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

            pas artiest aan
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-info">

        <?php echo validation_errors(); ?>

        <?php echo form_open('artist/edit'); ?>
        <input type="hidden" name="id" value="<?= $artist_data['id']?>">
        <label for="name"><i class="fa fa-user" aria-hidden="true"></i> Naam</label><br/>
        <input type="text" name="name"  value="<?= $artist_data['name']?>"/><br />
        <label for="website"><i class="fa fa-globe" aria-hidden="true"></i> Website</label><br/>
        <input type="text" name="website" value="<?= $artist_data['website']?>" /><br />
        <label for="youtube"><i class="fa fa-youtube" aria-hidden="true"></i> Youtube</label><br/>
        <input type="text" name="youtube" value="<?= $artist_data['youtube']?>" /><br />
        <label for="facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</label><br/>
        <input type="text" name="facebook" value= "<?= $artist_data['facebook']?>" /><br />
        <label for="twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</label><br/>
        <input type="text" name="twitter" value="<?= $artist_data['twitter']?>" /><br />
        <label for="description"><i class="fa fa-comments" aria-hidden="true"></i> Beschrijving</label><br/>
        <textarea name="description" id="textbox" rows="10" cols="40"><?php echo $artist_data['description']?></textarea><br>


        <input type="submit" name="submit" value="pas aan"/><br>
        </form>

       <div class="box-body">

<h1>Optredens</h1>
<a type="button" class="btn btn-primary btn-lg" href="<?php echo base_url("performances/create_performance/" . $artist_data['id'])?>">Voeg optreden toe</a>
<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-12">
        <table id="sort" class="sort" role="grid" aria-describedby="example1_info">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Podia</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Evenement</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Dag</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Start optreden</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Eind optreden</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Acties</th>
                </tr>
            </thead>
            <tbody>
                    <?php if(isset($performances)): ?>
                            <?php foreach ($performances as $performance): ?>
                                <tr>
                                    <td>
                                        <?= $performance['p_name']?>
                                    </td>
                                    <td>
                                        <?= $performance['e_name']?>
                                    </td>
                                    <td>
                                        <?= $performance['day']?>
                                    </td>
                                    <td><?php echo date('H:i', strtotime($performance['start_time'])); ?></td>
                                    <td><?php echo date('H:i', strtotime($performance['end_time'])); ?></td>
                                    <td>
                                        <a class="mid"
                                        href="<?php echo site_url('performances/edit_performance/' . $performance['p_id']); ?>"><i class="fa fa-pencil"></i></a>
                                        <a class="mid" href="<?php echo site_url('performances/delete_performance/' . $performance['p_id']); ?>"
                                                   onClick="return confirm('weet je zeker dat je deze optreden van artiest wilt verwijderen?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
            </tbody>
        </table>
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