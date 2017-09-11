<div class="wrapper">
    <div class="container">
        <h1>Welcome</h1>

        <form class="form" autocomplete="off" method="post" action="<?php echo base_url("user/doLogin") ?>">
            <input type="text" name='username' placeholder="Username" placeholder="Email Address" required="" autofocus="" >
            <input type="password" name="password" placeholder="Password" required="">
            <button type="submit" id="login-button">Login</button>
        </form>
    </div>
</div>