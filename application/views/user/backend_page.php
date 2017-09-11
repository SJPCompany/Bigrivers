<div>
    <div id="fullBg" />

    <div class="login_container">
        <form class="form-signin">
            <?php foreach ($_POST as $info) {?>
            <p> <?php echo $info; ?></p>
            <?php } var_dump($_POST);?>
        </form>
    </div>
</div>