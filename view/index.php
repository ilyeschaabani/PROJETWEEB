<?php
$page_titre = "Home";
require("../config.php");
include './includes/header-nav.php';
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
if (isset($_SESSION['id'])) {
  $user_id = $_SESSION['id'];
} else {
  $user_id = '';
}
;
include './includes/likes.php';
?>
<!-- CHATBOT -->
<div class="modal modal-top fade" id="modalTop" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTopTitle">CHAT BOT</h5>
        <a class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="nameSlideTop" class="form-label">Demandez votre question?</label>
            <input type="text" id="userBox" class="form-control" onkeydown="if(event.keyCode == 13){ talk()}"
              placeholder="Inserer votre question">
          </div>
          <p id="chatLog">Reponse ici !</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /CHATBOT -->

<div class="layout-page">
  <div class="content-wrapper">
    <div class="container-fluid flex-grow-1 container-p-y">
      <img class="card-img-top" src="../assets/img/1.png" alt="Card image cap">
      <div class="divider divider-info">
        <div class="divider-text">
          <h1 class="heading">LATEST EVENTS</h1>
        </div>
      </div>
      <div class="row d-flex justify-content-center gap-2">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="height:482px;width:500px;">
          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExample" data-bs-slide-to="1" class=""></li>
            <li data-bs-target="#carouselExample" data-bs-slide-to="2" class="" aria-current="true"></li>
          </ol>
          <div class="carousel-inner">
            <?php
            $last1 = $bdd->query('SELECT * FROM event ORDER BY id DESC LIMIT 1');
            $last1->execute();
            $fetch1 = $last1->fetch(PDO::FETCH_ASSOC);
            ?>
            <form method="POST" class="carousel-item active">
              <img class="d-block w-100" src="./uploads/<?= $fetch1['image']; ?>" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>
                  <?= $fetch1['nom']; ?>
                </h3>
                <p>
                  <?= $fetch1['description']; ?>
                </p>
              </div>
            </form>
            <?php
            $last2 = $bdd->query('SELECT * FROM event ORDER BY id DESC LIMIT 1,1');
            $last2->execute();
            $fetch2 = $last2->fetch(PDO::FETCH_ASSOC);
            ?>
            <form method="POST" class="carousel-item">
              <img class="d-block w-100" src="./uploads/<?= $fetch2['image']; ?>" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>
                  <?= $fetch2['nom']; ?>
                </h3>
                <p>
                  <?= $fetch2['description']; ?>
                </p>
              </div>
            </form>
            <?php
            $last3 = $bdd->query('SELECT * FROM event ORDER BY id DESC LIMIT 2,1');
            $last3->execute();
            $fetch3 = $last3->fetch(PDO::FETCH_ASSOC);
            ?>
            <form method="POST" class="carousel-item">
              <img class="d-block w-100" src="./uploads/<?= $fetch3['image']; ?>" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>
                  <?= $fetch3['nom']; ?>
                </h3>
                <p>
                  <?= $fetch3['description']; ?>
                </p>
              </div>
            </form>
          </div>
          <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
      <div class="divider divider-info">
        <div class="divider-text">
          <h1 class="heading">LATEST POSTS</h1>
        </div>
      </div>
      <div class="row mb-5">
        <?php
        $select_posts = $bdd->prepare("SELECT * FROM `posts` WHERE status = ? LIMIT 6 ");
        $select_posts->execute(['active']);
        if ($select_posts->rowCount() > 0) {
          while ($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)) {
            $post_id = $fetch_posts['id'];
            $post_user = $fetch_posts['user_id'];
            $count_post_comments = $bdd->prepare("SELECT * FROM `comments` WHERE post_id = ?");
            $count_post_comments->execute([$post_id]);
            $total_post_comments = $count_post_comments->rowCount();
            $count_post_likes = $bdd->prepare("SELECT * FROM `likes` WHERE post_id = ?");
            $count_post_likes->execute([$post_id]);
            $total_post_likes = $count_post_likes->rowCount();
            $confirm_likes = $bdd->prepare("SELECT * FROM `likes` WHERE user_id = ? AND post_id = ?");
            $confirm_likes->execute([$user_id, $post_id]);
            $userif = $bdd->prepare("SELECT * FROM `users` WHERE id = ?");
            $userif->execute([$post_user]);
            $fetus = $userif->fetch();
            ?>
            <div class="col-md-6 col-lg-4 mb-3">
              <form class="box" method="post">
                <input type="hidden" name="post_id" value="<?= $post_id; ?>">
                <input type="hidden" name="user_id" value="<?= $fetch_posts['user_id']; ?>">
                <div class="card h-100">
                  <img class="card-img-top" src="./uploaded_img/<?= $fetch_posts['image']; ?>" alt="Card image cap">
                  <div class="card-body">
                    <a class="card-title" href="author.php?author=<?= $fetch_posts['name']; ?>">
                      <h2 class="card-title">
                        <?= $fetus['nom']; ?>
                        <?= $fetus['prenom']; ?>
                      </h2>
                    </a>
                    <h5 class="card-title">
                      <?= $fetch_posts['category']; ?>
                    </h5>
                    <p class="card-text">
                      <?= $fetch_posts['content']; ?>
                    </p>
                    <?php if ($fetch_posts["status"] == "active") { ?>
                      <span class="badge bg-label-success">
                        <?= $fetch_posts["status"] ?>
                      </span>
                    <?php } else { ?>
                      <span class="badge bg-label-warning">
                        <?= $fetch_posts["status"] ?>
                      </span>
                    <?php } ?>
                    <small class="text-muted">Created :
                      <?= $fetch_posts["date"] ?>
                    </small>
                    <p class="card-text mt-3">
                      <button type="submit" name="like_post" class="btn rounded-pill btn-outline-primary">
                        <i class='bx bxs-like'></i>
                        <?= $total_post_likes ?>
                      </button>
                      <a href="read_post.php?post_id=<?= $post_id; ?>" class="btn rounded-pill btn-outline-primary">
                        <i class='bx bxs-comment'></i>
                        <?= $total_post_comments ?>
                      </a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
            <?php
          }
        } else {
          echo '<p class="empty">no posts added yet!</p>';
        }
        ?>
      </div>
    </div>
    <div class="content-backdrop fade"></div>
  </div>
</div>
<div class="buy-now">
  <button target="_blank" class="btn btn-danger btn-buy-now" type="button" class="btn btn-primary"
    data-bs-toggle="modal" data-bs-target="#modalTop">
    NEED HELP <i class='bx bx-bot'></i>
  </button>
</div>
<?php
$lu1 = $bdd->query('SELECT * FROM users ORDER BY id DESC LIMIT 1');
$lu1->execute();
$flu1 = $lu1->fetch(PDO::FETCH_ASSOC);
?>
<form method="POST" class="card">
  <div class="divider text-start-center mb-1 mt-3">
    <div class="divider-text">Newest User</div>
  </div>
  <div class="d-flex align-items-start align-items-sm-center gap-4 px-sm-3">
    <img src="./uploads/<?= $flu1["image"] ?>" alt="user-avatar" class="d-block rounded" height="50" width="50"
      id="uploadedAvatar">
    <div class="card-body p-sm-0">
      <blockquote class="blockquote mb-0">
        <p class="mb-0">
          Name :
          <?= $flu1["nom"] ?>
        </p>
        <p class="mb-0">
          Prename :
          <?= $flu1["prenom"] ?>
        </p>
        <footer class="blockquote-footer mt-1 mb-2">
          Joined at:
          <cite title="Source Title">
            <?= $flu1["datecreation"] ?>
          </cite>
        </footer>
      </blockquote>
    </div>
  </div>
</form>
<footer class="footer bg-light">
  <div
    class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
    <div>
      <a href="index.php" target="_blank" class="footer-text fw-bolder">Mindzone</a> ©
    </div>
    <div>
      <span class="footer-link me-4">Contact us at mindzone.website@gmail.com</span>
    </div>
  </div>
</footer>
<?php include "./includes/footer.php"; ?>