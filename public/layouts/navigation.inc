<?php $user = auth(); ?>
<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">
            <i class="icon_menu"></i>
        </div>
    </div>
    <!--logo start-->
    <a target="_blank" href="/" class="logo">Blood<span class="lite">Bank</span></a>
    <div class="top-nav notification-row">
        <ul class="nav pull-right top-menu">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="profile-ava">
                        <img alt="" width="30" src="assets/frontend/img/testimonials/testimonials3.gif" />
                    </span>
                    <span class="username"><?= $user->name; ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
