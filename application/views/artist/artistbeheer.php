<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Beheer Artiesten
        </h1>
    </section>

    <!-- Main content -->

    <table id="sort" class="sort" role="grid" aria-describedby="example1_info">
        <thead>
        <tr>
            <th>naam</th>
            <th>beschrijving</th>
            <th>website</th>
            <th>youtube</th>
            <th>facebook</th>
            <th>twitter</th>
            <th>wijzig</th>
            <th>verwijder</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($artist as $artist_data) { ?>
            <tr>
                <td><?php echo $artist_data['name']?></td>
                <td><?php echo $artist_data['description']?></td>
                <td><?php echo $artist_data['website']?></td>
                <td><?php echo $artist_data['youtube'] ?></td>
                <td><?php echo $artist_data['facebook'] ?></td>
                <td><?php echo $artist_data['twitter'] ?></td>
                <td><a class="mid" href="<?php echo site_url('artist/artisteditdata/'.$artist_data['id']);?>"><i class="fa fa-pencil"></i></a></td>
                <td><a href="<?php echo site_url('artist/delete/'.$artist_data['id']);?>" onClick="return confirm('weet je zeker dat je deze artist wilt verwijderen?')">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <script>
        new Tablesort(document.getElementById('sort'));
    </script>

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