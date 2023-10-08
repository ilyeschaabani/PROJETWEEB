<?php
require("../../../config.php");
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="../../index.php" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="../../../assets/img/logosvg.svg" alt="">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Mindzone</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="dashboard.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <!-- Gestions -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Gestions</span>
                    </li>
                    <li class="menu-item">
                        <a href="d-g-users.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-user"></i>
                            <div data-i18n="Basic">Users</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="d-g-resv.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-calendar"></i>
                            <div data-i18n="Basic">Reservations</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="d-g-recla.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Basic">Reclamations</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="d-g-blogs.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bxl-blogger"></i>
                            <div data-i18n="Basic">Blogs</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="d-g-opin.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-like"></i>
                            <div data-i18n="Basic">Opinions</div>
                        </a>
                    </li>
                    </li>

                    <!-- Pages -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Pages</span></li>
                    <li class="menu-item">
                        <a href="../../profil.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-user-circle"></i>
                            <div data-i18n="Basic">Profile</div>
                        </a>
                        <a href="../../index.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-heart"></i>
                            <div data-i18n="Basic">Home</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <?php 
                                
                                ?>
                                <form method="POST">
                                    <input type="text" class="form-control border-0 shadow-none" name="searchid" placeholder="Search..."
                                        aria-label="Search..." />
                                </form>
                            </div>
                        </div>
                        <!-- /Search -->
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../../uploads/<?php echo $userinfo['image']; ?>" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../../uploads/<?php echo $userinfo['image']; ?>" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">
                                                        <?php echo $userinfo['nom'] . ' ' . $userinfo['prenom']; ?>
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
                                        <a class="dropdown-item" href="../../profile.php">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <?php if ($userinfo['isAdmin'] == 1) { ?>
                            <li>
                                <a class="dropdown-item" href="./dashboard.php">
                                    <i class="bx bxs-dashboard me-2"></i>
                                    <span class="align-middle">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="../../profiledit.php">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Settings</span>
                                </a>
                            </li>
                            <?php } ?>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="../../logout.php">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Reservations
                        </h4>
                        <div class="row">
                            <div class="card">
                                <h5 class="card-header">Reservations List</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Prename</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        <tbody>
                                            <?php
                                            $SelectionUser = $bdd->prepare("SELECT * FROM reservation ORDER BY id");
                                            $SelectionUser->execute();

                                            while ($resv = $SelectionUser->fetch()) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $resv['id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $resv['nom']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $resv['prenom']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $resv['numtel']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $resv['email']; ?>
                                                    </td>
                                                    <td>
                                                    <?php echo date('d/m/Y H:i:s', strtotime($resv['dateres'])); ?>
                                                    </td>
                                                    <td>
                                                        <a type="button" class="btn btn-icon btn-outline-primary"
                                                            href="./d-g-resv.php?editMode=1&editid=<?php echo $resv['id']; ?>">
                                                            <span class="tf-icons bx bx-edit-alt"></span></a>

                                                        <a class="btn btn-icon btn-outline-primary"
                                                            href="./d-g-resv.php?delteMode=1&deleteid=<?php echo $resv['id']; ?>">
                                                            <span class="tf-icons bx bx-x"></span></a>
                                                        <?php
                                                        if (isset($_GET['delteMode']) && !empty($_GET['delteMode']) && isset($_GET['deleteid']) && !empty($_GET['deleteid'])) {
                                                            if ($_GET['deleteid'] == $resv['id']) {
                                                                $query = $bdd->prepare('DELETE FROM reservation WHERE id = ?');
                                                                $query->execute(array($resv['id']));
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php if (isset($_GET['editMode']) && !empty($_GET['editMode']) && isset($_GET['editid']) && !empty($_GET['editid'])) {
                                                    if ($_GET['editid'] == $resv['id']) {
                                                        if (isset($_POST['FormEdit'])) {
                                                            if (!empty($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
                                                                $email = htmlspecialchars($_POST['email']);
                                                                $nom = htmlspecialchars($_POST['nom']);
                                                                $prenom = htmlspecialchars($_POST['prenom']);
                                                                $numtel = htmlspecialchars($_POST['numtel']);
                                                                $datdaterese = date('Y-m-d H:i:s', strtotime($_POST['dateres']));
                                                                $update = $bdd->prepare('UPDATE reservation SET nom = ?, prenom = ?, numtel = ?, email = ?, dateres = ? WHERE id = ?');
                                                                $update->execute(array($nom, $prenom, $numtel, $email, $dateres, $user['id']));
                                                                echo "<script>location.href = './d-g-resv.php'</script>";
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <form method="post">
                                                                <td>
                                                                    <span style="color: #a813a8">
                                                                        <?php echo $resv['id']; ?>
                                                                    </span>
                                                                </td>
                                                                <td><input class="form-control" type="text" id="nom" name="nom"
                                                                        value="<?php echo $resv['nom']; ?>" /></td>
                                                                <td><input type="text" class="form-control" id="prenom"
                                                                        name="prenom" value="<?php echo $resv['prenom']; ?>" /></td>
                                                                <td><input type="text" class="form-control" id="numtel"
                                                                        name="numtel" value="<?php echo $resv['numtel']; ?>" /></td>
                                                                <td>
                                                                    <input type="email" class="form-control" id="email" name="email"
                                                                        value="<?php echo $resv['email']; ?>" />
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" name="dateres" type="datetime-local"
                                                                        value="<?php echo date('d/m/Y H:i:s', strtotime($resv['dateres'])); ?>"
                                                                        id="html5-datetime-local-input">
                                                                </td>
                                                                <td><button type="submit" name="FormEdit"
                                                                        class="btn btn-icon btn-primary"> <span
                                                                            class="tf-icons bx bx-check"></span></button></td>
                                                            </form>
                                                        </tr>
                                                    <?php }
                                                } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div
                                class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by
                                    <a href="https://themeselection.com" target="_blank"
                                        class="footer-link fw-bolder">AFTERMATH</a>
                                </div>
                                <div>
                                </div>
                        </footer>
                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <div class="buy-now">
            <button data-bs-toggle="modal" data-bs-target="#basicModal" class="btn btn-danger btn-buy-now">Add
                Reservation</button>
            <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Add Reservation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?php
                            if (isset($_POST['addreservation'])) {
                                $addname = htmlspecialchars($_POST['addname']);
                                $addprename = htmlspecialchars($_POST['addprename']);
                                $addnumtel = htmlspecialchars($_POST['addnumtel']);
                                $addemail = htmlspecialchars($_POST['addemail']);
                                $adddaterese = date('Y-m-d H:i:s', strtotime($_POST['adddate']));
                                if (filter_var($addemail, FILTER_VALIDATE_EMAIL)) {
                                    $insertres = $bdd->prepare("INSERT INTO reservation( nom, prenom, numtel, email, dateres) VALUES( ?, ?, ?, ?, ?)");
                                    $insertres->execute(array($addname, $addprename, $addnumtel, $addemail, $adddaterese));
                                    $subject = "Mindzone - Reservation";
                                    $headers = 'MIME-Version: 1.0' . "\r\n";
                                    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                                    $message = file_get_contents("./includes/resvtemp.html");
                                    $message = str_replace("USEREMAIL,", "{$addemail}", $message);
                                    $message = str_replace("INFO", "{$adddaterese}", $message);
                                    mail($addemail, $subject, $message, $headers);
                                }
                            }
                            ?>
                        <form method="POST" id="postRsv">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Name</label>
                                        <input type="text" id="nameinp" name="addname" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Prename</label>
                                        <input type="text" id="prenameinp" name="addprename" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Phone Number</label>
                                        <input type="text" id="phoneinp" name="addnumtel" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Email</label>
                                        <input type="email" id="emailinp" name="addemail" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Date</label>
                                        <input class="form-control" type="datetime-local" name="adddate"
                                            value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" id="html5-datetime-local-input">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addreservation">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../assets/js/Ala.js"></script>
        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../assets/vendor/libs/popper/popper.js"></script>
        <script src="../assets/vendor/js/bootstrap.js"></script>
        <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../assets/vendor/js/menu.js"></script>
        <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/dashboards-analytics.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>