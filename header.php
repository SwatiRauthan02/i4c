<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>I4CFinancial - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="http://i4cfinancial.com" />
    <link rel="icon" type="image/x-icon" href="assets/images/i4cfinancial_Logo_only.ico">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_site.css">
    <link rel="stylesheet" href="ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-718635-2"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/validate.js"></script>
    <script src="ui/1.12.1/jquery-ui.js"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-718635-2');
    </script>

    <style>
        .btn-filters {
            background-color: transparent;
        }
    </style>
</head>

<body>
    <!-- Navbar/Header -->
    <div class="site_header_container">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="GRID_HTML/images/i4cfinancial_logo.svg">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php?goto=about_us" class="about_us">About</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle btn-filters" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Solutions <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="performance_monitor.php">GRID Monitor</a></li>
                            </ul>
                        </li>

                        <li><a href="login.php">Contact Us</a></li>
                        <?php if (!isset($_SESSION['user_id'])): ?>
                            <li class="last_navitem"><a href="login.php">Log In</a> / <a href="sign_up.php"> Sign Up</a></li>
                        <?php else: ?>
                            <li class="last_navitem"><a href="logout.php">Log Out</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>