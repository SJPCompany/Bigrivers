<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Beheer niewsberichten
        </h1>
    </section>

    <!-- Main content -->


    <table id="sort" class="sort" role="grid" aria-describedby="example1_info">
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
                <td><?php echo $news_data['title']?></td>
                <td><?php echo $news_data['text']?></td>
                <td><?php echo $news_data['creator']?></td>
                <td><?php echo $news_data['creation_date'] ?></td>
                <td><?php echo $news_data['status'] ?></td>
                <td><a class="mid" href="<?php echo site_url('news/newseditpage/'.$news_data['id']);?>"><i class="fa fa-pencil"></i></a></td>
                <td><a href="<?php echo site_url('news/delete/'.$news_data['id']);?>" onClick="return confirm('weet je zeker dat je dit arikel wilt verwijderen?')">Delete</a></td>
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
        Alle rechten veoorbehouden.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>

</body>
</html>