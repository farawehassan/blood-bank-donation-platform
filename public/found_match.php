<?php

require_once '../includes/models.php';

$donation_id = ($_GET['donation'] ?? 0);
if (empty($donation_id) || $donation_id < 1)
    redirectTo("patients.php");

$patient_id = ($_GET['patient'] ?? 0);
if (empty($patient_id) || $patient_id < 1)
    redirectTo("patients.php");

if (!$patient = find_by_column('patients', "id", $patient_id))
    redirectTo("patients.php?message=Invalid Patient!");

if (!$donation = find_by_column('donations', "id", $donation_id))
    redirectTo("patients.php?message=Invalid donation!");

$donation = (object) $donation[1];
if (!$donor = find_by_column('donors', "id", $donation->donor_id))
    redirectTo("patients.php?message=Invalid donor!");

$donor      = (object) $donor[1];
$patient    = (object) $patient[1];
$title      = "Found Match | BloodBank";
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
                        <h3 class="page-header"><i class="fa fa fa-bars"></i> Found Matches</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                            <li><i class="fa fa-bars"></i><a href="patients.php">Patients</a></li>
                            <li><i class="fa fa-square-o"></i>Found Matches</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success fade in">
                            <button data-dismiss="alert" class="close close-sm" type="button">
                                <i class="icon-remove"></i>
                            </button>
                            <strong>Found Blood Match!</strong> You have successfully found a match!
                        </div>
                        <section class="panel">
                            <div class="panel-body bio-graph-info">
                                <h1>Donor</h1>
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>Name:</span><b><?= $donor->name; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Email:</span><b><?= $donor->email; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Phone Number:</span><b><?= $donor->phone_number; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Date Joined:</span><b><?= getDateTime($donor, 'customdate'); ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Address:</span><b><?= $donor->address; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Wish:</span><b><?= $donor->patient_wish; ?></b></p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="panel">
                            <div class="panel-body bio-graph-info">
                                <h1>Patient</h1>
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>Name:</span><b><?= $patient->name; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Blood Group:</span><b><?= $patient->blood_group; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Email:</span><b><?= $patient->email; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Blood Type:</span><b><?= ucfirst($patient->blood_type); ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Phone Number:</span><b><?= $patient->phone_number; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Genotype:</span><b><?= $patient->genotype; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Date Joined:</span><b><?= getDateTime($patient, 'customdate'); ?></b></p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="panel">
                            <div class="panel-body bio-graph-info">
                                <h1>Blood Information</h1>
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>Volume:</span><b><?= $donation->volume; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Blood Group:</span><b><?= $donation->blood_group; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Genotype:</span><b><?= $donation->genotype; ?></b></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Blood Type:</span><b><?= ucfirst($donation->blood_type); ?></b></p>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <a
                                            class="btn btn-success btn-lg"
                                            href="use-blood.php?donation=<?= $donation->id; ?>&patient=<?= $patient->id; ?>"
                                            title="Use blood for patient"
                                            data-original-title="Use blood for patient"
                                        >
                                            Use blood for patient
                                        </a>
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
</body>
</html>
