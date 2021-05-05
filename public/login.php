<?php

require_once '../includes/models.php';

$message = (object) [];

if (isRequestType('POST'))
{
    $result     = authenticate_user();
    $message    = getMessage($result);
}

guest("dashboard.php");

$title = "Login | BloodBank";
require_once 'layouts/header.inc';

?>
<body class="login-img3-body">
    <div class="container">
        <form class="login-form" action="" method="POST">
            <div class="login-wrap">
                <p class="login-img">
                    <a href="/" target="_blank" title="Website"><i class="icon_lock_alt"></i></a>
                </p>
                <?php message($message); ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email:" autofocus required />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                </div>
                <label class="checkbox">
                    <span class="pull-right">New user? <a href="register.php">register</a></span>
                </label>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
