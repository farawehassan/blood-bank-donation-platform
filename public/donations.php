<?php

require_once '../includes/models.php';

$message        = (object) [];
$donations      = find_all('donations');
$title          = "Donations | BloodBank";
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
                        <h3 class="page-header"><i class="fa fa-table"></i> Donations</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                            <li><i class="icon_document_alt"></i><a href="donate.php">Donate Blood</a></li>
                            <li><i class="fa fa-table"></i>Donations</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <?php message($message); ?>
                            <header class="panel-heading"> All Donations</header>
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="icon_profile"></i> Donor</th>
                                        <th><i class="icon_mail_alt"></i> Volume</th>
                                        <th class='text-center'><i class="icon_cogs"></i> Blood Group</th>
                                        <th class='text-center'><i class="icon_calendar"></i> Blood Type</th>
                                        <th class='text-center'><i class="icon_calendar"></i> Genotye</th>
                                        <th class='text-center'><i class="icon_mobile"></i> Used</th>
                                        <th class='text-center'><i class="icon_mobile"></i> By</th>
                                        <th class='text-center'><i class="icon_cogs"></i> Created</th>
                                    </tr>
                                    <?php $id = 1; foreach ($donations as $key => $donation): ?>
                                    <tr>
                                        <?php
                                            $donation   = (object) $donation;
                                            $donor      = (object) find_by_id('donors', $donation->donor_id);
                                        ?>
                                        <td><?= $id; ?></td>
                                        <td><?= $donor->name ?? "..."; ?></td>
                                        <td><?= $donation->volume; ?></td>
                                        <td class='text-center'><?= strtoupper($donation->blood_group); ?></td>
                                        <td class='text-center'><?= strtoupper($donation->blood_type); ?></td>
                                        <td class='text-center'><?= strtoupper($donation->genotype); ?></td>
                                        <td class='text-center'><?= getUsedDonation($donation); ?></td>
                                        <td class='text-center'><?= getUsedDonationBy($donation); ?></td>
                                        <td class='text-center'><?= getDateTime($donation, 'customdate'); ?></td>
                                    </tr>
                                    <?php $id++; endforeach; ?>
                                    <?php if (empty($donations)): ?>
                                    <tr>
                                        <td class='text-center' colspan="8">No records</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <!-- Footer -->
    <?php require_once 'layouts/footer.inc'; ?>
</body>
</html>
