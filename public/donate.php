<?php

require_once '../includes/models.php';

$message = (object) [];
if (isRequestType('POST'))
{
    $result     = donate_blood();
    $message    = getMessage($result);
}

$id         = (int) ($_GET['id'] ?? 0);
$donor_id   = (empty($id) || $id < 1) ? 0 : $id;
$donor      = find_by_column('donors', 'id', $donor_id);
$donors     = find_where('donors', 'validated', 'yes');
$donors     = (!$donors) ? [] : $donors;
$title      = "Donate | BloodBank";
require_once 'layouts/header.inc';

?>
<body>
    <!-- container section start -->
    <section id="container" class="">
        <!-- Navigation -->
        <?php require_once 'layouts/navigation.inc'; ?>
        <!-- Sidebar -->
        <?php require_once 'layouts/sidebar.inc'; ?>
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i> Donate Blood</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                            <li><i class="icon_document_alt"></i><a href="donations.php">Donations</a></li>
                            <li><i class="fa fa-file-text-o"></i>Donate Blood</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php message($message); ?>
                        <section class="panel">
                            <header class="panel-heading"> Donate Blood</header>
                            <div class="panel-body">
                                <form action="" role="form" method="POST">
                                    <div class="form-group">
                                        <label for="donor_id">Donor:</label>
                                        <select id="donor_id" name="donor_id" class="form-control m-bot15" required>
                                            <option>Select donor:</option>
                                            <?= generateObjSelect($donors, ['id', 'name', 'email'], [$donor_id]); ?>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="volume">Volume:</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="volume"
                                                    name='volume'
                                                    placeholder="Enter volume: eg 470ml"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="genotype">Genotype:</label>
                                                <select id="genotype" name="genotype" class="form-control m-bot15" required>
                                                    <option>Select genotype:</option>
                                                    <option value="AA">AA</option>
                                                    <option value="AO">AO</option>
                                                    <option value="BB">BB</option>
                                                    <option value="BO">BO</option>
                                                    <option value="AB">AB</option>
                                                    <option value="OO">OO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="blood_group">Blood Group:</label>
                                                <select id="blood_group" name="blood_group" class="form-control m-bot15" required>
                                                    <option>Select blood group</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="AB">AB</option>
                                                    <option value="O">O</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="blood_type">Blood Group Type:</label>
                                                <select id="blood_type" name="blood_type" class="form-control m-bot15" required>
                                                    <option>Select blood group type:</option>
                                                    <option value="positive">Positive</option>
                                                    <option value="negative">Negative</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
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
