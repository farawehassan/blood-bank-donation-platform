<?php

require_once '../includes/models.php';

$message = (object) [];
if (isRequestType('POST'))
{
    $result     = save_patient();
    $message    = getMessage($result);
}

$title = "Add Patient | BloodBank";
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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i> Add Patient</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                            <li><i class="icon_document_alt"></i><a href="patients.php">Patients</a></li>
                            <li><i class="fa fa-file-text-o"></i>Add Patient</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php message($message); ?>
                        <section class="panel">
                            <header class="panel-heading"> Add Patients</header>
                            <div class="panel-body">
                                <form action="" role="form" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="name"
                                                    name='name'
                                                    placeholder="Enter name:"
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="email"
                                                    name='email'
                                                    placeholder="Enter email:"
                                                    required
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_number">Phone Number:</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="phone_number"
                                                    name='phone_number'
                                                    placeholder="Enter phone number:"
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
