<?php

require_once '../includes/models.php';

$message = (object) [];

if (isRequestType('POST'))
{
    $result     = register_user();
    $message    = getMessage($result);
}

$title = "Register | BloodBank";
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
                    <input type="text" name="name" class="form-control" placeholder="Name:" autofocus required />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email:" required />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password:" required />
                </div>
                <label class="checkbox">
                    <?php if (isUserLoggedIn()): ?>
                    <span style="margin-left: -20px;"><a href="dashboard.php">Dashboard</a></span>
                    <?php endif; ?>
                    <span class="pull-right">Existing user? <a href="login.php">login</a></span>
                </label>
                <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>
            </div>
        </form>
    </div>
</body>
</html>
