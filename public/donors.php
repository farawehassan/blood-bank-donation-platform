<?php

require_once '../includes/models.php';

$message = (object) [];
if (isRequestType('GET') && !empty($_GET['id']))
{
    $result     = change_donor_status();
    $message    = getMessage($result);
}

$donor_text     = (($_GET['validated'] ?? '') == 'no') ? "Donor Requests" : "Approved Donors";
$link           = (($_GET['validated'] ?? '') == 'no') ? "?validated=no" : "?validated=yes";
$validated      = (($_GET['validated'] ?? '') == 'no') ? "no" : "yes";
$donors         = find_where('donors', 'validated', ($_GET['validated'] ?? 'yes'));
$title          = "{$donor_text} | BloodBank";
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
                        <h3 class="page-header"><i class="fa fa-table"></i> <?= $donor_text; ?></h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                            <li><i class="fa fa-table"></i><?= $donor_text; ?></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <?php message($message); ?>
                            <header class="panel-heading"> All <?= $donor_text; ?></header>
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="icon_profile"></i> Name</th>
                                        <th><i class="icon_mail_alt"></i> Email</th>
                                        <th><i class="icon_mobile"></i> Phone</th>
                                        <th class='text-center'><i class="icon_cogs"></i> Approved</th>
                                        <th class='text-center'><i class="icon_calendar"></i> Date</th>
                                        <th class='text-center'><i class="icon_calendar"></i> Time</th>
                                        <th class='text-center'><i class="icon_cogs"></i> Action</th>
                                    </tr>
                                    <?php $id = 1; foreach ($donors as $key => $donor): ?>
                                    <tr>
                                        <?php $donor = (object) $donor; ?>
                                        <td><?= $id; ?></td>
                                        <td><?= $donor->name; ?></td>
                                        <td><?= $donor->email; ?></td>
                                        <td><?= $donor->phone_number; ?></td>
                                        <td class='text-center'><?= strtoupper($donor->validated); ?></td>
                                        <td class='text-center'><?= getDateTime($donor, 'customdate'); ?></td>
                                        <td class='text-center'><?= getDateTime($donor, 'time'); ?></td>
                                        <td class='text-center'>
                                            <div class="btn-group">
                                                <?php if ($donor->validated == "no"): ?>
                                                <a class="btn btn-primary" href="<?= $link."&id=".$donor->id; ?>&status=yes">
                                                    <i class="icon_plus_alt2"></i> Approve
                                                </a>
                                                <?php else: ?>
                                                <a class="btn btn-success" href="donate.php?id=<?= $donor->id; ?>">
                                                    <i class="icon_plus_alt2"></i> Donate
                                                </a>
                                                <a class="btn btn-danger" href="<?= $link."&id=".$donor->id; ?>&status=no">
                                                    <i class="icon_close_alt2"></i> Reject
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $id++; endforeach; ?>
                                    <?php if (empty($donors)): ?>
                                    <tr>
                                        <td class='text-center' colspan="8">No records</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                <!-- page end-->
            </section>
        </section>
    </section>
    <!-- Footer -->
    <?php require_once 'layouts/footer.inc'; ?>
</body>
</html>
