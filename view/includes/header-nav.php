<?php
require("../config1.php");
require("../model/user.php");
if (isset($userinfo['email'])) {
    $requser = $bdd->prepare('SELECT * FROM ban WHERE userId = ?');
    $requser->execute(array($userinfo['id']));
    $userexist = $requser->rowCount();
    if ($userexist == 1) {
        header('Location: ./ban.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="./admin/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />
    <script src="./admin/assets/js/config.js"></script>
    <link rel="icon" type="image/x-icon" href="./admin/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

    <link rel="stylesheet" href="./admin/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="./admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./admin/assets/css/demo.css" />
    <link rel="stylesheet" href="../../assets/css/index.css">
    <link rel="stylesheet" href="./admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="./admin/assets/vendor/css/pages/page-auth.css" />
    <script src="./admin/assets/vendor/js/helpers.js"></script>
    <title>Mindzone -
        <?php echo $page_titre; ?>
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)"><img style="height: 40px;"
                    src="../assets/img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if (!isset($_SESSION['email'])) { ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Contact Us</a>
                        </li>
                    </ul>
                    <a type="button" href="login.php" class="btn btn-primary">Login</a>
                </div>
            <?php } else { ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reclamation.php">Reclamations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blogs.php">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reservation.php">Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="event.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="avis.php">Opinions</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar">
                                    <img src="./uploads/<?php echo $userinfo['image']; ?>" alt=""
                                        class="w-px-40 h-auto rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="./uploads/<?php echo $userinfo['image']; ?>" alt=""
                                                        class="w-px-40 h-auto rounded-circle">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">
                                                    <?php echo $userinfo['nom']; ?>
                                                </span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <?php if ($userinfo['isAdmin'] == 1) { ?>
                                    <li>
                                        <a class="dropdown-item" href="./admin/html/dashboard.php">
                                            <i class="bx bxs-dashboard me-2"></i>
                                            <span class="align-middle">Dashboard</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a class="dropdown-item" href="profiledit.php">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </nav>