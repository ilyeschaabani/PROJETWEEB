<?php
require_once "../../../config.php";
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard - Blogs</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                    <li class="menu-item">
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
                    <li class="menu-item active">
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Blogs</h4>
                        <div class="nav-align-top mb-4">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-top-home" aria-controls="navs-top-home"
                                        aria-selected="true">
                                        Add
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-top-profile" aria-controls="navs-top-profile"
                                        aria-selected="false">View</button>
                                </li>
                            </ul>

                            <?php
                            $user_id = $_SESSION["id"];

                            if (!isset($user_id)) {
                                header("location:connection.php ");
                            }

                            if (isset($_POST["publish"])) {
                                $name = $_POST["name"];
                                $name = filter_var($name, FILTER_SANITIZE_STRING);
                                $title = $_POST["title"];
                                $title = filter_var($title, FILTER_SANITIZE_STRING);
                                $content = $_POST["content"];
                                $content = filter_var($content, FILTER_SANITIZE_STRING);
                                $category = $_POST["category"];
                                $category = filter_var($category, FILTER_SANITIZE_STRING);
                                $status = "active";

                                $image = $_FILES["image"]["name"];
                                $image = filter_var($image, FILTER_SANITIZE_STRING);
                                $image_size = $_FILES["image"]["size"];
                                $image_tmp_name = $_FILES["image"]["tmp_name"];
                                $image_folder = "../../uploaded_img/" . $image;

                                $select_image = $bdd->prepare("SELECT * FROM `posts` WHERE image = ? AND user_id = ?");
                                $select_image->execute([$image, $user_id]);

                                if (isset($image)) {
                                    if ($select_image->rowCount() > 0 and $image != "") {
                                        $message[] = "image name repeated!";
                                    } elseif ($image_size > 2000000) {
                                        $message[] = "images size is too large!";
                                    } else {
                                        move_uploaded_file($image_tmp_name, $image_folder);
                                    }
                                } else {
                                    $image = "";
                                }

                                if ($select_image->rowCount() > 0 and $image != "") {
                                    $message[] = "please rename your image!";
                                } else {
                                    $insert_post = $bdd->prepare("INSERT INTO `posts`(user_id, name, title, content, category, image, status) VALUES(?,?,?,?,?,?,?)");
                                    $insert_post->execute([$user_id, $name, $title, $content, $category, $image, $status,]);
                                    $message[] = "post published!";
                                }
                            }

                            if (isset($_POST["draft"])) {
                                $name = $_POST["name"];
                                $name = filter_var($name, FILTER_SANITIZE_STRING);
                                $title = $_POST["title"];
                                $title = filter_var($title, FILTER_SANITIZE_STRING);
                                $content = $_POST["content"];
                                $content = filter_var($content, FILTER_SANITIZE_STRING);
                                $category = $_POST["category"];
                                $category = filter_var($category, FILTER_SANITIZE_STRING);
                                $status = "deactive";

                                $image = $_FILES["image"]["name"];
                                $image = filter_var($image, FILTER_SANITIZE_STRING);
                                $image_size = $_FILES["image"]["size"];
                                $image_tmp_name = $_FILES["image"]["tmp_name"];
                                $image_folder = "../../uploaded_img/" . $image;

                                $select_image = $bdd->prepare(
                                    "SELECT * FROM `posts` WHERE image = ? AND user_id = ?"
                                );
                                $select_image->execute([$image, $user_id]);

                                if (isset($image)) {
                                    if ($select_image->rowCount() > 0 and $image != "") {
                                        $message[] = "image name repeated!";
                                    } elseif ($image_size > 2000000) {
                                        $message[] = "images size is too large!";
                                    } else {
                                        move_uploaded_file($image_tmp_name, $image_folder);
                                    }
                                } else {
                                    $image = "";
                                }

                                if ($select_image->rowCount() > 0 and $image != "") {
                                    $message[] = "please rename your image!";
                                } else {
                                    $insert_post = $bdd->prepare("INSERT INTO `posts`(user_id, name, title, content, category, image, status) VALUES(?,?,?,?,?,?,?)");
                                    $insert_post->execute([$user_id, $name, $title, $content, $category, $image, $status,]);
                                    $message[] = "draft saved!";
                                }
                            }
                            ?>
                            <?php if (isset($_POST["deletedblog"])) {
                                $p_id = $_POST["post_id"];
                                $p_id = filter_var($p_id, FILTER_SANITIZE_STRING);
                                $delete_image = $bdd->prepare("SELECT * FROM `posts` WHERE id = ?");
                                $delete_image->execute([$p_id]);
                                $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
                                if ($fetch_delete_image["image"] != "") {
                                    unlink("../../uploaded_img/" . $fetch_delete_image["image"]);
                                }
                                $delete_post = $bdd->prepare("DELETE FROM `posts` WHERE id = ?");
                                $delete_post->execute([$p_id]);
                                $delete_comments = $bdd->prepare("DELETE FROM `comments` WHERE post_id = ?");
                                $delete_comments->execute([$p_id]);
                                $message[] = "post deleted successfully!";
                            } ?>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                                    <div class="col-xl">
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0">Add new blog</h5>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-default-fullname">Name</label>
                                                        <input type="text" name="name" class="form-control"
                                                            id="basic-default-fullname" placeholder="Your name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-default-company">Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                            id="basic-default-company" placeholder="Blog title">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-default-email">Image</label>
                                                        <div class="input-group input-group-merge">
                                                            <input class="form-control" type="file" id="formFile"
                                                                accept="image/jpg, image/jpeg, image/png, image/webp"
                                                                name="image">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-default-phone">Category</label>
                                                        <select class="form-select" name="category"
                                                            id="exampleFormControlSelect1"
                                                            aria-label="Default select example" required>
                                                            <option value="" selected disabled>- Select category -
                                                            </option>
                                                            <option value="nature">Nature</option>
                                                            <option value="education">Education</option>
                                                            <option value="pets and animals">Pets and animals</option>
                                                            <option value="technology">Technology</option>
                                                            <option value="fashion">Fashion</option>
                                                            <option value="entertainment">Entertainment</option>
                                                            <option value="movies and animations">Movies</option>
                                                            <option value="gaming">Gaming</option>
                                                            <option value="music">Music</option>
                                                            <option value="sports">Sports</option>
                                                            <option value="news">News</option>
                                                            <option value="travel">Travel</option>
                                                            <option value="comedy">Comedy</option>
                                                            <option value="design and development">Design and
                                                                development</option>
                                                            <option value="food and drinks">Food and drinks</option>
                                                            <option value="lifestyle">Lifestyle</option>
                                                            <option value="personal">Personal</option>
                                                            <option value="health and fitness">Health and fitness
                                                            </option>
                                                            <option value="business">Business</option>
                                                            <option value="shopping">Shopping</option>
                                                            <option value="animations">Animations</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basic-default-message">Message</label>
                                                        <textarea name="content" id="basic-default-message"
                                                            class="form-control" required maxlength="10000"
                                                            placeholder="Tell more about the blog" cols="30"
                                                            rows="10"></textarea>
                                                    </div>
                                                    <button type="submit" value="publish post" name="publish"
                                                        class="btn btn-primary">Add</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                    <div class="box-container" style="grid-template-columns: repeat(auto-fit, 1200px)">
                                        <div class="accordion mt-3" id="accordionExample">
                                            <form method="POST">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="searchid"
                                                            placeholder="Search by Title or Name"
                                                            aria-label="Recipient's username"
                                                            aria-describedby="button-addon2">
                                                        <button class="btn btn-outline-primary" name="search"
                                                            type="button" id="button-addon2">Search</button>
                                                    </div>
                                            </form>
                                        </div>
                                        <!-- NORMALE -->
                                        <?php
                                        if (isset($_POST['search'])) {
                                            $keyword = $_POST['searchid'];
                                            $query = $bdd->prepare("SELECT * FROM posts WHERE title LIKE '%$keyword%' or name LIKE '%$keyword%'");
                                            $query->execute();
                                            while ($row = $query->fetch()) {
                                                if ($query->rowCount() > 0) {
                                                    while (
                                                        $searched = $query->fetch(PDO::FETCH_ASSOC)
                                                    ) {
                                                        $post_id = $searched["id"];
                                                        $count_post_comments = $bdd->prepare("SELECT * FROM `comments` WHERE post_id = ?");
                                                        $count_post_comments->execute([$post_id]);
                                                        $total_post_comments = $count_post_comments->rowCount();
                                                        $count_post_likes = $bdd->prepare("SELECT * FROM `likes` WHERE post_id = ?");
                                                        $count_post_likes->execute([$post_id,]);
                                                        $total_post_likes = $count_post_likes->rowCount();
                                                        ?>
                                                        <form method="post" class="m-sm-3">
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingOne">
                                                                    <button type="button" class="accordion-button collapsed"
                                                                        data-bs-toggle="collapse" data-bs-target="#accordion<?= $row[
                                                                            "id"
                                                                        ] ?>" aria-expanded="false"
                                                                        aria-controls="accordionOne">
                                                                        Title: <?= $row[
                                                                            "title"
                                                                        ] ?>
                                                                    </button>
                                                                </h2>
                                                                <div id="accordion<?= $searched["id"] ?>"
                                                                    class="accordion-collapse collapse"
                                                                    #data-bs-parent="#accordionExample" style="">
                                                                    <div class="d-grid d-sm-flex p-3">
                                                                        <?php if ($searched["image"] != "") { ?>
                                                                            <img src="../../uploaded_img/<?= $searched["image"] ?>"
                                                                                alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
                                                                        <?php } ?>
                                                                        <div class="col-md-8">
                                                                            <div class="card-body" style="padding: 0 0 0 0;">
                                                                                <h5 class="card-title">
                                                                                    <?= $searched["title"] ?>
                                                                                </h5>
                                                                                <p class="card-text">
                                                                                    <?= $searched["content"] ?>
                                                                                </p>
                                                                                <p class="card-text"><small class="text-muted">Created :
                                                                                        <?= $searched["date"] ?>
                                                                                    </small></p>
                                                                                <div class="card-text">
                                                                                    <?php if ($searched["status"] == "active") { ?>
                                                                                        <span class="badge bg-label-success">
                                                                                            <?= $searched["status"] ?>
                                                                                        </span>
                                                                                    <?php } else { ?>
                                                                                        <span class="badge bg-label-warning">
                                                                                            <?= $searched["status"] ?>
                                                                                        </span>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md">
                                                                            <span class="badge bg-label-primary"><i
                                                                                    class='bx bxs-comment'></i>
                                                                                <?= $total_post_comments ?>
                                                                            </span>
                                                                            <span class="badge bg-label-primary"><i
                                                                                    class='bx bxs-like'></i>
                                                                                <?= $total_post_likes ?>
                                                                            </span>
                                                                            <div class="demo-inline-spacing">
                                                                                <a href="d-g-blogs-edit.php?id=<?= $post_id ?>"
                                                                                    type="button" class="btn btn-primary">Edit</a>
                                                                            </div>
                                                                            <div class="demo-inline-spacing">
                                                                                <button type="button" class="btn btn-primary"
                                                                                    data-bs-toggle="offcanvas"
                                                                                    data-bs-target="#offcanvasEnd"
                                                                                    aria-controls="offcanvasEnd">Delete</button>
                                                                            </div>
                                                                            <div class="offcanvas offcanvas-end" tabindex="-1"
                                                                                id="offcanvasEnd" aria-labelledby="offcanvasEndLabel"
                                                                                style="visibility: hidden;" aria-hidden="true">
                                                                                <div class="offcanvas-header">
                                                                                    <?php
                                                                                    if (isset($_POST["deletedblog"])) {
                                                                                        $email = htmlspecialchars($_POST["email"]);
                                                                                        $reason = htmlspecialchars($_POST["reason"]);
                                                                                        $subject = "Mindzone - Bolg Delete";
                                                                                        $headers = "MIME-Version: 1.0" . "\r\n";
                                                                                        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                                                                                        $message = file_get_contents("../../includes/blogtemp.html");
                                                                                        $message = str_replace("MESSAGE", "{$reason}", $message);
                                                                                        mail($email, $subject, $message, $headers);
                                                                                    } ?>
                                                                                    <form methode="POST">
                                                                                        <h5 id="offcanvasEndLabel"
                                                                                            class="offcanvas-title">Delete
                                                                                            Blog</h5>
                                                                                        <button type="button"
                                                                                            class="btn-close text-reset"
                                                                                            data-bs-dismiss="offcanvas"
                                                                                            aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                                                                    <div
                                                                                        class="card-body demo-vertical-spacing demo-only-element">
                                                                                        <div class="input-group">
                                                                                            <input type="email" class="form-control"
                                                                                                name="email" placeholder="Email"
                                                                                                aria-describedby="basic-addon14">
                                                                                        </div>

                                                                                        <div class="input-group">
                                                                                            <textarea class="form-control"
                                                                                                aria-label="With textarea" name="reason"
                                                                                                placeholder="Reason"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <button type="submit" name="deletedblog"
                                                                                        class="btn btn-primary mb-2 d-grid w-100">Delete</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-secondary d-grid w-100"
                                                                                        data-bs-dismiss="offcanvas">
                                                                                        Cancel
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-md">
                                                                                    <span class="badge bg-label-primary"><i
                                                                                            class='bx bxs-comment'></i>
                                                                                        <?= $total_post_comments ?>
                                                                                    </span>
                                                                                    <span class="badge bg-label-primary"><i
                                                                                            class='bx bxs-like'></i>
                                                                                        <?= $total_post_likes ?>
                                                                                    </span>
                                                                                    <div class="demo-inline-spacing">
                                                                                        <a href="d-g-blogs-edit.php?id=<?= $post_id ?>"
                                                                                            type="button"
                                                                                            class="btn btn-primary">Edit</a>
                                                                                    </div>
                                                                                    <div class="demo-inline-spacing">
                                                                                        <button type="button" class="btn btn-primary"
                                                                                            data-bs-toggle="offcanvas"
                                                                                            data-bs-target="#offcanvasEnd"
                                                                                            aria-controls="offcanvasEnd">Delete</button>
                                                                                    </div>
                                                                                    <div class="offcanvas offcanvas-end" tabindex="-1"
                                                                                        id="offcanvasEnd"
                                                                                        aria-labelledby="offcanvasEndLabel"
                                                                                        style="visibility: hidden;" aria-hidden="true">
                                                                                        <div class="offcanvas-header">
                                                                                            <?php if (isset($_POST["deletedblog"])) {
                                                                                                $email = htmlspecialchars($_POST["email"]);
                                                                                                $reason = htmlspecialchars($_POST["reason"]);
                                                                                                $subject = "Mindzone - Bolg Delete";
                                                                                                $headers = "MIME-Version: 1.0" . "\r\n";
                                                                                                $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                                                                                                $message = file_get_contents("../../includes/blogtemp.html");
                                                                                                $message = str_replace("MESSAGE", "{$reason}", $message);
                                                                                                mail($email, $subject, $message, $headers);
                                                                                            } ?>
                                                                                            <form methode="POST">
                                                                                                <h5 id="offcanvasEndLabel"
                                                                                                    class="offcanvas-title">Delete
                                                                                                    Blog</h5>
                                                                                                <button type="button"
                                                                                                    class="btn-close text-reset"
                                                                                                    data-bs-dismiss="offcanvas"
                                                                                                    aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div
                                                                                            class="offcanvas-body my-auto mx-0 flex-grow-0">
                                                                                            <div
                                                                                                class="card-body demo-vertical-spacing demo-only-element">
                                                                                                <div class="input-group">
                                                                                                    <input type="email"
                                                                                                        class="form-control"
                                                                                                        name="email" placeholder="Email"
                                                                                                        aria-describedby="basic-addon14">
                                                                                                </div>

                                                                                                <div class="input-group">
                                                                                                    <textarea class="form-control"
                                                                                                        aria-label="With textarea"
                                                                                                        name="reason"
                                                                                                        placeholder="Reason"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <button type="submit" name="delete"
                                                                                                class="btn btn-primary  "
                                                                                                onclick="return confirm('delete this post?');">delete</button>
                                                                                            <button type="button"
                                                                                                class="btn btn-outline-secondary d-grid w-100"
                                                                                                data-bs-dismiss="offcanvas">
                                                                                                Cancel
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    </form>
                                                    <?php
                                                    }
                                                }
                                            }
                                        } else {
                                            $select_posts = $bdd->prepare("SELECT * FROM `posts` WHERE user_id = ?");
                                            $select_posts->execute([$user_id]);
                                            if ($select_posts->rowCount() > 0) {
                                                while (
                                                    $fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)
                                                ) {
                                                    $post_id = $fetch_posts["id"];
                                                    $count_post_comments = $bdd->prepare("SELECT * FROM `comments` WHERE post_id = ?");
                                                    $count_post_comments->execute([$post_id]);
                                                    $total_post_comments = $count_post_comments->rowCount();
                                                    $count_post_likes = $bdd->prepare("SELECT * FROM `likes` WHERE post_id = ?");
                                                    $count_post_likes->execute([$post_id,]);
                                                    $total_post_likes = $count_post_likes->rowCount();
                                                    ?>
                                                <form method="post" class="m-sm-3">
                                                    <div class="card accordion-item">
                                                        <h2 class="accordion-header" id="headingOne">
                                                            <button type="button" class="accordion-button collapsed"
                                                                data-bs-toggle="collapse" data-bs-target="#accordion<?= $fetch_posts[
                                                                    "id"
                                                                ] ?>" aria-expanded="false" aria-controls="accordionOne">
                                                                Title: <?= $fetch_posts[
                                                                    "title"
                                                                ] ?>
                                                            </button>
                                                        </h2>
                                                        <div id="accordion<?= $fetch_posts["id"] ?>"
                                                            class="accordion-collapse collapse" #data-bs-parent="#accordionExample"
                                                            style="">
                                                            <div class="d-grid d-sm-flex p-3">
                                                                <?php if ($fetch_posts["image"] != "") { ?>
                                                                    <img src="../../uploaded_img/<?= $fetch_posts["image"] ?>"
                                                                        alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
                                                                <?php } ?>
                                                                <div class="col-md-8">
                                                                    <div class="card-body" style="padding: 0 0 0 0;">
                                                                        <h5 class="card-title">
                                                                            <?= $fetch_posts["title"] ?>
                                                                        </h5>
                                                                        <p class="card-text">
                                                                            <?= $fetch_posts["content"] ?>
                                                                        </p>
                                                                        <p class="card-text"><small class="text-muted">Created :
                                                                                <?= $fetch_posts["date"] ?>
                                                                            </small></p>
                                                                        <div class="card-text">
                                                                            <?php if ($fetch_posts["status"] == "active") { ?>
                                                                                <span class="badge bg-label-success">
                                                                                    <?= $fetch_posts["status"] ?>
                                                                                </span>
                                                                            <?php } else { ?>
                                                                                <span class="badge bg-label-warning">
                                                                                    <?= $fetch_posts["status"] ?>
                                                                                </span>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md">
                                                                    <span class="badge bg-label-primary"><i
                                                                            class='bx bxs-comment'></i>
                                                                        <?= $total_post_comments ?>
                                                                    </span>
                                                                    <span class="badge bg-label-primary"><i class='bx bxs-like'></i>
                                                                        <?= $total_post_likes ?>
                                                                    </span>
                                                                    <div class="demo-inline-spacing">
                                                                        <a href="d-g-blogs-edit.php?id=<?= $post_id ?>"
                                                                            type="button" class="btn btn-primary">Edit</a>
                                                                        <a href="d-g-blogs-readpost.php?post_id=<?= $post_id; ?>"
                                                                            type="button" class="btn btn-primary">View</a>
                                                                    </div>
                                                                    <div class="demo-inline-spacing">
                                                                        <button type="button" class="btn btn-primary"
                                                                            data-bs-toggle="offcanvas"
                                                                            data-bs-target="#offcanvasEnd"
                                                                            aria-controls="offcanvasEnd">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="offcanvas offcanvas-end" tabindex="-1"
                                                        id="offcanvasEnd" aria-labelledby="offcanvasEndLabel"
                                                        style="visibility: hidden;" aria-hidden="true">
                                                        <div class="offcanvas-header">
                                                            <?php
                                                            if (isset($_POST["deletedblog"])) {
                                                                $email = htmlspecialchars($_POST["email"]);
                                                                $reason = htmlspecialchars($_POST["reason"]);
                                                                $subject = "Mindzone - Bolg Delete";
                                                                $headers = "MIME-Version: 1.0" . "\r\n";
                                                                $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                                                                $message = file_get_contents("../../includes/blogtemp.html");
                                                                $message = str_replace("MESSAGE", "{$reason}", $message);
                                                                mail($email, $subject, $message, $headers);
                                                                
                                                            } ?>
                                                            <form methode="POST">
                                                                <h5 id="offcanvasEndLabel" class="offcanvas-title">
                                                                    Delete
                                                                    Blog</h5>
                                                                <button type="button" class="btn-close text-reset"
                                                                    data-bs-dismiss="offcanvas"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                                            <div
                                                                class="card-body demo-vertical-spacing demo-only-element">
                                                                <div class="input-group">
                                                                    <input type="email" class="form-control"
                                                                        name="email" placeholder="Email"
                                                                        aria-describedby="basic-addon14">
                                                                </div>

                                                                <div class="input-group">
                                                                    <textarea class="form-control"
                                                                        aria-label="With textarea" name="reason"
                                                                        placeholder="Reason"></textarea>
                                                                </div>
                                                            </div>
                                                            <button type="submit" name="deletedblog"
                                                                class="btn btn-primary mb-2 d-grid w-100">Delete</button>
                                                            <button type="button"
                                                                class="btn btn-outline-secondary d-grid w-100"
                                                                data-bs-dismiss="offcanvas">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                
                                                </form>
                                                <?php
                                                }
                                            }
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">AFTERMATH</a>
            </div>
            <div>
            </div>
    </footer>

    <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>

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