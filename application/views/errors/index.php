<!DOCTYPE html>
<html>
<head>
    <title>Errors</title>
</head>
<body>

<p>Something went wrong look below for more info</p>
<?php if(isset($_SESSION['error'])) {
    if ($_SESSION['error'] > 1) {
        foreach ($_SESSION['error'] as $item) {
            echo $item;
            echo '<br /><br />';
        }
    } else {
        echo $_SESSION['error'];
    }
} else {
        echo 'No errors orcured';
    }
?>

</body>
</html>