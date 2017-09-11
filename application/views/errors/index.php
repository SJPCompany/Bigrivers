<!DOCTYPE html>
<html>
<head>
    <title>Errors</title>
</head>
<body>

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
        echo 'No errors orcured';
    }
?>

</body>
</html>