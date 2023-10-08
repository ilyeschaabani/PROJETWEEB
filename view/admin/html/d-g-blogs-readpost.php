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
                    <li class="menu-item active">
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Blogs</h4>
                        <div class="nav-align-top mb-4">
                            <?php
                            $user_id = $_SESSION['id'];

                        $get_id = $_GET['post_id'];

                            if(isset($_POST['delete'])){

                            $p_id = $_POST['post_id'];
                            $p_id = filter_var($p_id, FILTER_SANITIZE_STRING);
                            $delete_image = $bdd->prepare("SELECT * FROM `posts` WHERE id = ?");
                            $delete_image->execute([$p_id]);
                            $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
                            if($fetch_delete_image['image'] != ''){
                                unlink('../uploaded_img/'.$fetch_delete_image['image']);
                            }
                            $delete_post = $bdd->prepare("DELETE FROM `posts` WHERE id = ?");
                            $delete_post->execute([$p_id]);
                            $delete_comments = $conn->prepare("DELETE FROM `comments` WHERE post_id = ?");
                            $delete_comments->execute([$p_id]);
                            header('location:view_posts.php');

                            }

                            if(isset($_POST['delete_comment'])){

                            $comment_id = $_POST['comment_id'];
                            $comment_id = filter_var($comment_id, FILTER_SANITIZE_STRING);
                            $delete_comment = $bdd->prepare("DELETE FROM `comments` WHERE id = ?");
                            $delete_comment->execute([$comment_id]);
                            $message[] = 'comment delete!';

                            }

                        ?>

                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                      <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">EDIT Blog</h5>
                      <?php
                        $select_posts = $bdd->prepare("SELECT * FROM `posts` WHERE user_id = ? AND id = ?");
                        $select_posts->execute([$user_id, $get_id]);
                        if($select_posts->rowCount() > 0){
                         while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                        $post_id = $fetch_posts['id'];

                        $count_post_comments = $bdd->prepare("SELECT * FROM `comments` WHERE post_id = ?");
                        $count_post_comments->execute([$post_id]);
                        $total_post_comments = $count_post_comments->rowCount();

                        $count_post_likes = $bdd->prepare("SELECT * FROM `likes` WHERE post_id = ?");
                        $count_post_likes->execute([$post_id]);
                        $total_post_likes = $count_post_likes->rowCount();

                ?>
                    </div>
                    <div class="card-body">
                    <section class="read-post">
                    <form method="post">
                    <input type="hidden" name="post_id" value="<?= $post_id; ?>">
                    <div class="status" style="background-color:<?php if($fetch_posts['status'] == 'active'){echo 'limegreen'; }else{echo 'coral';}; ?>;"><?= $fetch_posts['status']; ?></div>
                    <?php if($fetch_posts['image'] != ''){ ?>
                        <img src="../<?= $fetch_posts['image']; ?>" class="image" alt="">
                    <?php } ?>
                    <div class="title"><?= $fetch_posts['title']; ?></div>
                    <div class="content"><?= $fetch_posts['content']; ?></div>
                    <div class="icons">
                        <div class="likes"><i class="fas fa-heart"></i><span><?= $total_post_likes; ?></span></div>
                        <div class="comments"><i class="fas fa-comment"></i><span><?= $total_post_comments; ?></span></div>
                    </div>
                    <div class="flex-btn">
                        <a href="edit_post.php?id=<?= $post_id; ?>" class="btn btn-primary">edit</a>
                        <button type="submit" name="delete" class="btn btn-primary" onclick="return confirm('delete this post?');">delete</button>
                        <a href="d-g-blogs.php" class="btn btn-primary">go back</a>
                    </div>
                </form>
                <?php
                        }
                    }else{
                        echo '<p class="empty">no posts added yet! <a href="add_posts.php" class="btn" style="margin-top:1.5rem;">add post</a></p>';
                    }
                ?>
                </section>
                <section class="comments" style="padding-top: 0;">
   
                    <p class="comment-title">post comments</p>
                    <div class="box-container">
                    <?php
                            $select_comments = $bdd->prepare("SELECT * FROM `comments` WHERE post_id = ?");
                            $select_comments->execute([$get_id]);
                            if($select_comments->rowCount() > 0){
                                while($fetch_comments = $select_comments->fetch(PDO::FETCH_ASSOC)){
                        ?>
                    <div class="box">
                        <div class="user">
                            <i class="fas fa-user"></i>
                            <div class="user-info">
                                <span><?= $fetch_comments['user_name']; ?></span>
                                <div><?= $fetch_comments['date']; ?></div>
                            </div>
                        </div>
                        <div class="text"><?= $fetch_comments['comment']; ?></div>
                        <form action="" method="POST">
                            <input type="hidden" name="comment_id" value="<?= $fetch_comments['id']; ?>">
                            <button type="submit" class="inline-delete-btn" name="delete_comment" onclick="return confirm('delete this comment?');">delete comment</button>
                        </form>
                    </div>
                    <?php
                            }
                        }else{
                            echo '<p class="empty">no comments added yet!</p>';
                        }
                    ?>
                    </div>

                    </section>
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