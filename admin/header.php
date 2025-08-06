<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>I4CFinancial - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_site.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



    <!-- JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/validate.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        .main-content {
            flex: 1 0 auto;
        }

        .footer_container {
            flex-shrink: 0;
        }

        .page-wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
        }

        html,
        body,
        body.swal2-shown,
        body.swal2-height-auto {
            height: 100% !important;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <div class="site_header_container">
            <div class="container">
                <nav class="navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <img src="../assets/images/i4cfinancial_logo.svg" alt="I4C Financial Logo">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="users_index.php">Users</a></li>
                            <li><a href="users_add.php">Add User</a></li>
                            <!-- <li><a href="adminWebpage.php">Admin Page</a></li> -->
                            <li class="last_navitem"><a href="logout.php" class="login_navitem">Log Out</a> </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Begin page content wrapper -->
        <div class="main-content container pt-4">