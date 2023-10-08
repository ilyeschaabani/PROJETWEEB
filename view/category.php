<?php
require("../config.php");
if (isset($userinfo['email'])) {
  $requser = $bdd->prepare('SELECT * FROM ban WHERE userId = ?');
  $requser->execute(array($userinfo['id']));
  $userexist = $requser->rowCount();
  if ($userexist == 1) {
    header('Location: ./ban.php');
  }
}
?>
<?php
if(isset($_SESSION['id'])){
   $user_id = $_SESSION['id'];
}else{
   $user_id = '';
};

if(isset($_GET['category'])){
    $category = $_GET['category'];
 }else{
    $category = '';
 }
 
 include './includes/likes.php';

 ?>






<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="description" content="" />
  <script src="./admin/assets/js/config.js"></script>
  <link rel="icon" type="image/x-icon" href="./admin/assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="./admin/assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../assets/css/index.css" />
  <link rel="stylesheet" href="./admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="./admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="./admin/assets/css/demo.css" />
  <link rel="stylesheet" href="./admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="./admin/assets/vendor/css/pages/page-auth.css" />
  <script src="./admin/assets/vendor/js/helpers.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <title>Mindzone - Home</title>
</head>
<main>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)"><img style="height: 40px;" src="../assets/img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php if (!isset($_SESSION['email'])) { ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="javascript:void(0)">Home</a>
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
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Aboutus.php">ABOUT Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="javascript:void(0)">Reclamations</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Reservations</a></li>
              <li><a class="dropdown-item" href="./blogs.php">Blogs</a></li>
              <li><a class="dropdown-item" href="javascript:void(0)">Opinions</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="profile.php"><?php echo $userinfo['nom']; ?></a>
        </li>
    </ul>
    <a type="button" href="logout.php" class="btn btn-primary">Logout</a>
</div>
<?php } ?>
</div>
</nav>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">BLOGS /</span> category</h4>
    
    
    </div>
    <section class="posts-container">

   <h1 class="heading">POSTS CATEGORY</h1>

   <div class="box-container">

      <?php
         $select_posts = $bdd->prepare("SELECT * FROM `posts` WHERE category = ? and status = ?");
         $select_posts->execute([$category, 'active']);
         if($select_posts->rowCount() > 0){
            while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
               
            $post_id = $fetch_posts['id'];

            $count_post_comments = $bdd->prepare("SELECT * FROM `comments` WHERE post_id = ?");
            $count_post_comments->execute([$post_id]);
            $total_post_comments = $count_post_comments->rowCount(); 

            $count_post_likes = $bdd->prepare("SELECT * FROM `likes` WHERE post_id = ?");
            $count_post_likes->execute([$post_id]);
            $total_post_likes = $count_post_likes->rowCount();

            $confirm_likes = $bdd->prepare("SELECT * FROM `likes` WHERE user_id = ? AND post_id = ?");
            $confirm_likes->execute([$user_id, $post_id]);
      ?>
      <form class="box" method="post">
         <input type="hidden" name="post_id" value="<?= $post_id; ?>">
         <input type="hidden" name="admin_id" value="<?= $fetch_posts['user_id']; ?>">
         <div class="post-admin">
            <i class="fas fa-user"></i>
            <div>
               <a href="author_posts.php?author=<?= $fetch_posts['name']; ?>"><?= $fetch_posts['name']; ?></a>
               <div><?= $fetch_posts['date']; ?></div>
            </div>
         </div>
         
         <?php
            if($fetch_posts['image'] != ''){  
         ?>
         <img src="./uploaded_img/<?= $fetch_posts['image']; ?>" class="post-image" alt="">
         <?php
         }
         ?>
         <div class="post-title"><?= $fetch_posts['title']; ?></div>
         <div class="post-content content-150"><?= $fetch_posts['content']; ?></div>
         <a href="read_post.php?post_id=<?= $post_id; ?>" class="inline-btn">read more</a>
         <div class="icons">
            <a href="view_post.php?post_id=<?= $post_id; ?>"><i class="fas fa-comment"></i><span>(<?= $total_post_comments; ?>)</span></a>
            <button type="submit" name="like_post"><i class="fas fa-heart" style="<?php if($confirm_likes->rowCount() > 0){ echo 'color:var(--red);'; } ?>  "></i><span>(<?= $total_post_likes; ?>)</span></button>
         </div>
      
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no posts found for this category!</p>';
      }
      ?>
   </div>

</section>


    <footer class="content-footer footer bg-footer-theme">
      <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
          ©
          <script>
            document.write(new Date().getFullYear());
          </script>2023
          , made with ❤️ by
          <a target="_blank" class="footer-link fw-bolder">AFTERMATH</a>
        </div>
      </div>
    </footer>
    <div class="content-backdrop fade"></div>
  </div>
  <script src="./admin/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="./admin/assets/vendor/libs/popper/popper.js"></script>
  <script src="./admin/assets/vendor/js/bootstrap.js"></script>
  <script src="./admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="./admin/assets/vendor/js/menu.js"></script>
  <script src="./admi/assets/js/main.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>