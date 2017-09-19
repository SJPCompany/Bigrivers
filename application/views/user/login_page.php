<div class="wrapper">
    <div class="container">
        <h1>Welcome</h1>

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
        }
        unset($_SESSION['error']);
        ?>

        <form class="form" autocomplete="off" method="post" action="<?php echo base_url("user/doLogin") ?>">
            <input type="text" name='username' placeholder="Username" placeholder="Email Address" required="" autofocus="" >
            <input type="password" name="password" placeholder="Password" required="">
            <button type="submit" id="login-button">Login</button>
        </form>
    </div>
</div>