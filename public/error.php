<?php
    $code   = $_SERVER['REDIRECT_STATUS'] ?? 404;
    $codes  = [
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error'
    ];
    $message = "";
    if (array_key_exists($code, $codes) && is_numeric($code))
    {
        $message = $codes[$code];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicons -->
    <link href="/assets/frontend/img/favicon.png" rel="icon" />
    <link href="/assets/frontend/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <title><?= $code; ?>  | BloodBank</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/backend/css/bootstrap.min.css" />
    <!-- bootstrap theme -->
    <link rel="stylesheet" href="/assets/backend/css/bootstrap-theme.css" />
    <!--external css-->
    <!-- font icon -->
    <link rel="stylesheet" href="/assets/backend/css/elegant-icons-style.css" />
    <link rel="stylesheet" href="/assets/backend/assets/font-awesome/css/font-awesome.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="/assets/backend/css/style.css" />
    <link rel="stylesheet" href="/assets/backend/css/style-responsive.css" />
</head>
<body>
    <div class="page-404">
        <p class="text-404"><?= $code; ?></p>
        <h2>Aww Snap! - <?= $message; ?></h2>
        <p>Something went wrong or that page doesn’t exist yet. <br><a href="/">Return Home</a></p>
    </div>
</body>
</html>
