<!DOCTYPE html>
<html>
<head>
    <title>Errors</title>
</head>
<body>
<div class="container">
<h1>Something went wrong look below for more info</h1>
<?php if(isset($_SESSION['error'])) {
    if ($_SESSION['error'] > 1) {
        foreach ($_SESSION['error'] as $item) {
        ?> <p> <?php echo $item; ?> </p> <?php
            echo '<br /><br />';
        }
    } else {
        ?> <p> <?php echo $_SESSION['error']; ?> </p> <?php
    }
} else {
    ?> <p> <?php echo 'No problems'; ?> </p> <?php
    }
?>
</div>
</body>
</html>