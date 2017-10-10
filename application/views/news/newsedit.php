<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Beheer niewsberichten
        </h1>
    </section>

    <!-- Main content -->


    <table>
        <thead>
        <tr>
            <th>titel</th>
            <th>tekst</th>
            <th>gemaakt door</th>
            <th>aanmaak datum</th>
            <th>status</th>
            <th>wijzig</th>
            <th>verwijder</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($news as $news_data) { ?>
            <tr>
                <td><?= $news_data->title ?></td>
                <td><?= $news_data->text ?></td>
                <td><?= $news_data->creator ?></td>
                <td><?= $news_data->creation_date ?></td>
<!--                --><?php //if ($news_data->status == 0 || $news_data->status == '0') { ?>
<!--                    <td>Actief</td>-->
<!--                --><?php //} else { ?>
<!--                    <td>Geblokt</td>-->
<!--                --><?php //} ?>
                <td><a class="mid" href="<?= base_url('backend/user/editUser/'. $news_data->id) ?>"><i class="fa fa-pencil"></i></a></td>
                <td><a href="#">Block/Unblock</a></td>
                <td><a href="#">Delete</a></td>
            </tr>
        <?php } ?>
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
        All rights reserved.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>

</body>
</html>