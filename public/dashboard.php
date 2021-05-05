<?php

require_once '../includes/models.php';

protected_page("login.php");

$admin_users    = find_all('admin');
$title          = "Dashboard | BloodBank";
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
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                            <li><i class="fa fa-laptop"></i>Dashboard</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box blue-bg">
                            <i class="fa fa-envelope-open"></i>
                            <div class="count"><?= count_where('donors', 'validated', 'no'); ?></div>
                            <div class="title">Donor Requests</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <i class="fa fa-user-md"></i>
                            <div class="count"><?= count_where('donors', 'validated', 'yes'); ?></div>
                            <div class="title">Approved Donors</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <i class="fa fa-user-md"></i>
                            <div class="count"><?= count_all('donations'); ?></div>
                            <div class="title">Donations</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <i class="fa fa-user-md"></i>
                            <div class="count"><?= count_all('patients'); ?></div>
                            <div class="title">Patients</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box dark-bg">
                            <i class="fa fa-user"></i>
                            <div class="count"><?= count_all('admin'); ?></div>
                            <div class="title">Admin Users</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box green-bg">
                            <i class="fa fa-envelope"></i>
                            <div class="count"><?= count_all('messages'); ?></div>
                            <div class="title">Messages</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2><i class="fa fa-flag-o red"></i><strong>Admin Users</strong></h2>
                                <div class="panel-actions">
                                    <a href="dashboard.php#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                                    <a href="dashboard.php#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                                    <a href="dashboard.php#" class="btn-close"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table bootstrap-datatable countries">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Country</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th class='text-center'>Status</th>
                                            <th class='text-center'>Last Updated</th>
                                            <th class='text-center'>Last Login</th>
                                            <th class='text-center'>Date Joined</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($admin_users as $key => $admin_user): ?>
                                        <tr>
                                            <td><img src="assets/backend/img/nigeria.jpeg" style="height:18px; margin-top:-2px;"></td>
                                            <td>Nigeria</td>
                                            <td><?= $admin_user['name']; ?></td>
                                            <td><?= $admin_user['email']; ?></td>
                                            <td class='text-center'>Active</td>
                                            <td class='text-center'>
                                                <?= getDateTime((object) $admin_user, 'customdate', 'last_updated'); ?>
                                            </td>
                                            <td class='text-center'>
                                                <?= getDateTime((object) $admin_user, 'customdate', 'last_login'); ?>
                                            </td>
                                            <td class='text-center'>
                                                <?= getDateTime((object) $admin_user, 'customdate'); ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php if (empty($admin_users)): ?>
                                        <tr>
                                            <td class='text-center' colspan="8">No records</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
            </section>
        </section>
    </section>
    <!-- Footer -->
    <?php require_once 'layouts/footer.inc'; ?>
    <script>
        //knob
        $(function() {
            $(".knob").knob({
                'draw': function() {
                    $(this.i).val(this.cv + '%')
                }
            })
        });
        //carousel
        $(document).ready(function() {
            $("#owl-slider").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true
            });
        });
        //custom select box
        $(function() {
            $('select.styled').customSelect();
        });
    </script>
</body>
</html>
