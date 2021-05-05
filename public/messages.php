<?php

require_once '../includes/models.php';

$messages   = find_all('messages');
$title      = "Messages | BloodBank";
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
                        <h3 class="page-header"><i class="fa fa-table"></i> Messages</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                            <li><i class="fa fa-table"></i>Messages</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading"> All Messages</header>
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="icon_profile"></i> Name</th>
                                        <th><i class="icon_mail_alt"></i> Email</th>
                                        <th><i class="icon_mobile"></i> Subject</th>
                                        <th><i class="icon_cogs"></i> Message</th>
                                        <th class='text-center'><i class="icon_calendar"></i> Date</th>
                                        <th class='text-center'><i class="icon_calendar"></i> Time</th>
                                    </tr>
                                    <?php $id = 1; foreach ($messages as $key => $message): ?>
                                    <tr>
                                        <?php $message = (object) $message; ?>
                                        <td><?= $id; ?></td>
                                        <td><?= $message->name; ?></td>
                                        <td><?= $message->email; ?></td>
                                        <td class='minimize' title='<?= $message->subject; ?>'>
                                            <?= $message->subject; ?>
                                        </td>
                                        <td class='minimize' title="<?= $message->message; ?>">
                                            <?= $message->message; ?>
                                        </td>
                                        <td class='text-center'><?= getDateTime($message, 'customdate'); ?></td>
                                        <td class='text-center'><?= getDateTime($message, 'time'); ?></td>
                                    </tr>
                                    <?php $id++; endforeach; ?>
                                    <?php if (empty($messages)): ?>
                                    <tr>
                                        <td class='text-center' colspan="7">No records</td>
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
