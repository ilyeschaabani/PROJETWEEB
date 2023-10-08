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
                    <li class="menu-item activex">
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
                                    <input type="text" class="form-control border-0 shadow-none" name="searchid"
                                        placeholder="Search..." aria-label="Search..." />
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Blogs</h4>
                        <div class="nav-align-top mb-4">
                            <?php

                            $user_id = $_SESSION['id'];

                            if (!isset($user_id)) {
                                header('location:connection.php ');
                            }
                            if (isset($_POST['save'])) {

                                $post_id = $_GET['id'];
                                $title = $_POST['title'];
                                $title = filter_var($title, FILTER_SANITIZE_STRING);
                                $content = $_POST['content'];
                                $content = filter_var($content, FILTER_SANITIZE_STRING);
                                $category = $_POST['category'];
                                $category = filter_var($category, FILTER_SANITIZE_STRING);
                                $status = $_POST['status'];
                                $status = filter_var($status, FILTER_SANITIZE_STRING);

                                $update_post = $bdd->prepare("UPDATE `posts` SET title = ?, content = ?, category = ?, status = ? WHERE id = ?");
                                $update_post->execute([$title, $content, $category, $status, $post_id]);

                                $message[] = 'post updated!';

                                $old_image = $_POST['old_image'];
                                $image = $_FILES['image']['name'];
                                $image = filter_var($image, FILTER_SANITIZE_STRING);
                                $image_size = $_FILES['image']['size'];
                                $image_tmp_name = $_FILES['image']['tmp_name'];
                                $image_folder = '../../uploaded_img' . $image;

                                $select_image = $bdd->prepare("SELECT * FROM `posts` WHERE image = ? AND user_id = ?");
                                $select_image->execute([$image, $user_id]);

                                if (!empty($image)) {
                                    if ($image_size > 2000000) {
                                        $message[] = 'images size is too large!';
                                    } elseif ($select_image->rowCount() > 0 and $image != '') {
                                        $message[] = 'please rename your image!';
                                    } else {
                                        $update_image = $bdd->prepare("UPDATE `posts` SET image = ? WHERE id = ?");
                                        move_uploaded_file($image_tmp_name, $image_folder);
                                        $update_image->execute([$image, $post_id]);
                                        if ($old_image != $image and $old_image != '') {
                                            unlink('../uploaded_img/' . $old_image);
                                        }
                                        $message[] = 'image updated!';
                                    }
                                }
                            }

                            if (isset($_POST['delete_post'])) {

                                $post_id = $_POST['post_id'];
                                $post_id = filter_var($post_id, FILTER_SANITIZE_STRING);
                                $delete_image = $bdd->prepare("SELECT * FROM `posts` WHERE id = ?");
                                $delete_image->execute([$post_id]);
                                $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
                                if ($fetch_delete_image['image'] != '') {
                                    unlink('../uploaded_img/' . $fetch_delete_image['image']);
                                }
                                $delete_post = $bdd->prepare("DELETE FROM `posts` WHERE id = ?");
                                $delete_post->execute([$post_id]);
                                $delete_comments = $bdd->prepare("DELETE FROM `comments` WHERE post_id = ?");
                                $delete_comments->execute([$post_id]);
                                $message[] = 'post deleted successfully!';
                            }

                            if (isset($_POST['delete_image'])) {

                                $empty_image = '';
                                $post_id = $_POST['post_id'];
                                $post_id = filter_var($post_id, FILTER_SANITIZE_STRING);
                                $delete_image = $bdd->prepare("SELECT * FROM `posts` WHERE id = ?");
                                $delete_image->execute([$post_id]);
                                $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
                                if ($fetch_delete_image['image'] != '') {
                                    unlink('../uploaded_img/' . $fetch_delete_image['image']);
                                }
                                $unset_image = $bdd->prepare("UPDATE `posts` SET image = ? WHERE id = ?");
                                $unset_image->execute([$empty_image, $post_id]);
                                $message[] = 'image deleted successfully!';
                            }
                            ?>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                                    <div class="col-xl">
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0">EDIT Blog</h5>
                                                <?php
                                                $post_id = $_GET['id'];
                                                $select_posts = $bdd->prepare("SELECT * FROM `posts` WHERE id = ?");
                                                $select_posts->execute([$post_id]);
                                                if ($select_posts->rowCount() > 0) {
                                                    while ($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-default-fullname">Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    id="basic-default-fullname"
                                                                    value="<?= $fetch_posts['name']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-default-company">Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    id="basic-default-company"
                                                                    value="<?= $fetch_posts['title']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-default-email">Image</label>
                                                                <div class="input-group input-group-merge">
                                                                <input class="form-control" type="file" id="formFile" accept="image/jpg, image/jpeg, image/png, image/webp" name="image" >
                                                                    <?php if ($fetch_posts['image'] != '') { ?>
                                                                        <img src="../uploaded_img/<?= $fetch_posts['image']; ?>"
                                                                        class="form-control" alt="">
                                                                        <input type="submit" id="formFile" value="delete image" class="btn btn-primary" name="delete_image">
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-default-phone">Category</label>
                                                                <select class="form-select" name="category"
                                                                    id="exampleFormControlSelect1"
                                                                    aria-label="Default select example" required>
                                                                    <option value="" selected disabled><?= $fetch_posts['category']; ?>
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
                                                                    <option value="design and development">Design and development</option>
                                                                    <option value="food and drinks">Food and drinks</option>
                                                                    <option value="lifestyle">Lifestyle</option>
                                                                    <option value="personal">Personal</option>
                                                                    <option value="health and fitness">Health and fitness </option>
                                                                    <option value="business">Business</option>
                                                                    <option value="shopping">Shopping</option>
                                                                    <option value="animations">Animations</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-message">Message</label>
                                                        <textarea name="content" id="basic-default-message" class="form-control"
                                                            required maxlength="10000" placeholder="Tell more about the blog"
                                                            cols="30" rows="10"><?= $fetch_posts['content']; ?></textarea>
                                                    </div>
                                                    <button type="submit" value="publish post" name="publish"
                                                        class="btn btn-primary">Edit</button>
                                                    </form>
                                                    <?php
                                                    }
                                                } else {
                                                    echo '<p class="empty">no posts found!</p>';
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Content -->

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