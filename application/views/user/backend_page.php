<div>
    <div id="fullBg" />

    <div class="login_container">
        <form class="form-signin">
            <?php foreach ($_POST as $info) {?>
            <p> <?php echo $info; ?></p>
            <?php }?>
        </form>
    </div>
</div>