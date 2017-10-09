<!DOCTYPE html>
<html>
<head>
    <title>Errors</title>
</head>
<body>
<div class="container">
<h1>Iets ging fout kijk hieronder voor meer info</h1>
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
</div>
</body>
</html>