<?php

require_once '../includes/models.php';

$message = (object) [];
if (isRequestType('GET') && !empty($_GET['id']))
{
    $result     = find_match();
    $message    = getMessage($result);
}

$patients       = find_all('patients');
$title          = "Patients | BloodBank";
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
                        <h3 class="page-header"><i class="fa fa-table"></i> Patients</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                            <li><i class="fa fa-table"></i>Patients</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <?php message($message); ?>
                            <header class="panel-heading"> All Patients</header>
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="icon_profile"></i> Name</th>
                                        <th><i class="icon_mail_alt"></i> Email</th>
                                        <th><i class="icon_mobile"></i> Phone</th>
                                        <th class='text-center'><i class="icon_cogs"></i> Blood Group</th>
                                        <th class='text-center'><i class="icon_calendar"></i> Blood Type</th>
                                        <th class='text-center'><i class="icon_calendar"></i> Genotye</th>
                                        <th class='text-center'><i class="icon_cogs"></i> Created</th>
                                        <th class='text-center'><i class="icon_cogs"></i> Action</th>
                                    </tr>
                                    <?php $id = 1; foreach ($patients as $key => $patient): ?>
                                    <tr>
                                        <?php $patient = (object) $patient; ?>
                                        <td><?= $id; ?></td>
                                        <td><?= $patient->name; ?></td>
                                        <td><?= $patient->email; ?></td>
                                        <td><?= $patient->phone_number; ?></td>
                                        <td class='text-center'><?= strtoupper($patient->blood_group); ?></td>
                                        <td class='text-center'><?= strtoupper($patient->blood_type); ?></td>
                                        <td class='text-center'><?= strtoupper($patient->genotype); ?></td>
                                        <td class='text-center'><?= getDateTime($patient, 'customdate'); ?></td>
                                        <td class='text-center'>
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="?id=<?= $patient->id; ?>">
                                                    <i class="icon_plus_alt2"></i> Find Blood Match
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $id++; endforeach; ?>
                                    <?php if (empty($patients)): ?>
                                    <tr>
                                        <td class='text-center' colspan="9">No records</td>
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
