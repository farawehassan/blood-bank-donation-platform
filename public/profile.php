<?php

require_once '../includes/models.php';

protected_page("login.php");

$title = "Profile | BloodBank";
require_once 'layouts/header.inc';

?>
<body>
    <section id="container" class="">
        <!-- Navigation -->
        <?php require_once 'layouts/navigation.inc'; ?>
        <!-- Sidebar -->
        <?php require_once 'layouts/sidebar.inc'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                            <li><i class="icon_documents_alt"></i>Pages</li>
                            <li><i class="fa fa-user-md"></i>Profile</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile-widget profile-widget-info">
                            <div class="panel-body">
                                <div class="col-lg-2 col-sm-2">
                                    <h4><?= $user->name; ?></h4>
                                    <div class="follow-ava">
                                        <img
                                            width="30"
                                            src="assets/frontend/img/testimonials/testimonials3.gif"
                                            alt="<?= $user->name; ?>"
                                        />
                                    </div>
                                    <h6>Administrator</h6>
                                </div>
                                <div class="col-lg-4 col-sm-4 follow-info">
                                    <p>Hello I’m <?= $user->name; ?>, a leading expert in interactive and creative design.</p>
                                    <p>@<?= getUserName($user); ?></p>
                                    <p><i class="fa fa-twitter"><?= getUserName($user); ?></i></p>
                                    <h6>
                                        <span><i class="icon_clock_alt"></i><?= getDateTime($user, 'time'); ?></span>
                                        <span><i class="icon_calendar"></i><?= getDateTime($user, 'customdate'); ?></span>
                                        <span><i class="icon_pin_alt"></i>LOS</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading tab-bg-info">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#profile">
                                            <i class="icon-user"></i> Profile
                                        </a>
                                    </li>
                                    <li class="">
                                        <a data-toggle="tab" href="#edit-profile">
                                            <i class="icon-envelope"></i> Edit Profile
                                        </a>
                                    </li>
                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <!-- profile -->
                                    <div id="profile" class="tab-pane active">
                                        <section class="panel">
                                            <div class="bio-graph-heading">Hello I’m <?= $user->name; ?>, a leading expert in interactive and creative design. My graduation from University of Lagos with a Bachelors Degree in Computer Science.</div>
                                            <div class="panel-body bio-graph-info">
                                                <h1>Bio Graph</h1>
                                                <div class="row">
                                                    <div class="bio-row">
                                                        <p><span>Name:</span><b> <?= $user->name; ?></b></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>Email:</span><b> <?= $user->email; ?></b></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>Date Joined:</span><b> <?= getDateTime($user, 'customdate'); ?></b></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>Country:</span><b> Nigeria</b></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>Occupation:</span><b> Computer Scientist</b></p>
                                                    </div>
                                                    <div class="bio-row">
                                                        <p><span>Account Type:</span><b> Administrator</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <!-- edit-profile -->
                                    <div id="edit-profile" class="tab-pane">
                                        <section class="panel">
                                            <div class="panel-body bio-graph-info">
                                                <h1> Profile Info</h1>
                                                <form action="" class="form-horizontal" role="form" method="POST">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Name:</label>
                                                        <div class="col-lg-6">
                                                            <input
                                                                type="text"
                                                                name='name'
                                                                class="form-control"
                                                                id="f-name"
                                                                value="<?= $user->name; ?>"
                                                                required
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Email:</label>
                                                        <div class="col-lg-6">
                                                            <input
                                                                type="email"
                                                                name='email'
                                                                class="form-control"
                                                                id="email"
                                                                value="<?= $user->email; ?>"
                                                                required
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">New Password:</label>
                                                        <div class="col-lg-6">
                                                            <input
                                                                type="password"
                                                                name='password'
                                                                class="form-control"
                                                                id="email"
                                                                placeholder="Enter new password or leave empty to use old password"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <!-- Footer -->
    <?php require_once 'layouts/footer.inc'; ?>
    <script>
        //knob
        $(".knob").knob();
    </script>
</body>
</html>
