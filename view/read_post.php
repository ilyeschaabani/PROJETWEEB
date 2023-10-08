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
if (isset($_SESSION['id'])) {
  $user_id = $_SESSION['id'];
} else {
  $user_id = '';
}
;
$page_titre = "Blogs";
include './includes/likes.php';
include './includes/header-nav.php';

$get_id = $_GET['post_id'];

if (isset($_POST['add_comment'])) {

  $admin_id = $_POST['admin_id'];
  $admin_id = filter_var($admin_id, FILTER_SANITIZE_STRING);
  $user_name = $_POST['user_name'];
  $user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
  $comment = $_POST['comment'];
  $comment = filter_var($comment, FILTER_SANITIZE_STRING);

  $verify_comment = $bdd->prepare("SELECT * FROM `comments` WHERE post_id = ? AND admin_id = ? AND user_id = ? AND user_name = ? AND comment = ?");
  $verify_comment->execute([$get_id, $admin_id, $user_id, $user_name, $comment]);

  if ($verify_comment->rowCount() > 0) {
    $message[] = 'comment already added!';
  } else {
    $insert_comment = $bdd->prepare("INSERT INTO `comments`(post_id, admin_id, user_id, user_name, comment) VALUES(?,?,?,?,?)");
    $insert_comment->execute([$get_id, $admin_id, $user_id, $user_name, $comment]);
    $message[] = 'new comment added!';
  }

}

if (isset($_POST['edit_comment'])) {
  $edit_comment_id = $_POST['edit_comment_id'];
  $edit_comment_id = filter_var($edit_comment_id, FILTER_SANITIZE_STRING);
  $comment_edit_box = $_POST['comment_edit_box'];
  $comment_edit_box = filter_var($comment_edit_box, FILTER_SANITIZE_STRING);

  $verify_comment = $bdd->prepare("SELECT * FROM `comments` WHERE comment = ? AND id = ?");
  $verify_comment->execute([$comment_edit_box, $edit_comment_id]);

  if ($verify_comment->rowCount() > 0) {
    $message[] = 'comment already added!';
  } else {
    $update_comment = $bdd->prepare("UPDATE `comments` SET comment = ? WHERE id = ?");
    $update_comment->execute([$comment_edit_box, $edit_comment_id]);
    $message[] = 'your comment edited successfully!';
  }
}

if (isset($_POST['delete_comment'])) {
  $delete_comment_id = $_POST['comment_id'];
  $delete_comment_id = filter_var($delete_comment_id, FILTER_SANITIZE_STRING);
  $delete_comment = $bdd->prepare("DELETE FROM `comments` WHERE id = ?");
  $delete_comment->execute([$delete_comment_id]);
  $message[] = 'comment deleted successfully!';
}

?>

<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">BLOGS /</span> READ</h4>
    <div class="card mb-4">
      <?php
      $select_posts = $bdd->prepare("SELECT * FROM `posts` WHERE status = ? AND id = ?");
      $select_posts->execute(['active', $get_id]);
      if ($select_posts->rowCount() > 0) {
        while ($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)) {

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
            <h5 class="card-header"><a href="author_posts.php?author=<?= $fetch_posts['name']; ?>"><?= $fetch_posts['name']; ?></a></h5>
            <!-- Account -->
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="./uploaded_img/<?= $fetch_posts['image']; ?>" alt="user-avatar" class="d-block rounded"
                  height="100" width="100" id="uploadedAvatar">
                <div class="button-wrapper">
                  <h4>
                    <?= $fetch_posts['title']; ?>
                  </h4>
                  <h6>
                    <?= $fetch_posts['category']; ?>
                  </h6>
                  <button type="submit" name="like_post" class="btn rounded-pill btn-outline-primary">
                    <i class='bx bxs-like'></i>
                    <?= $total_post_likes ?>
                  </button>
                  <a href="read_post.php?post_id=<?= $post_id; ?>" class="btn rounded-pill btn-outline-primary">
                    <i class='bx bxs-comment'></i>
                    <?= $total_post_comments ?>
                  </a>
                </div>
                <div class="button-wrapper">
                  <div class="card-body ps ps--active-y" id="vertical-example">
                    <p class="text-muted mb-0">
                      <?= $fetch_posts['content']; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </form>
          <?php
        }
      } else {
        echo '<p class="empty">no posts found!</p>';
      }
      ?>
    </div>
    <div class="card mb-4">
      <?php
      if ($user_id != '') {
        $select_admin_id = $bdd->prepare("SELECT * FROM `posts` WHERE id = ?");
        $select_admin_id->execute([$get_id]);
        $fetch_admin_id = $select_admin_id->fetch(PDO::FETCH_ASSOC);
        ?>
        <form action="" method="post" class="add-comment">
          <div class="card-body">
            <input type="hidden" name="admin_id" value="<?= $fetch_admin_id['user_id']; ?>">
            <input type="hidden" name="user_name" value="<?= $userinfo['nom']; ?>">
            <!-- <p class="user"><i class="fas fa-user"></i><a href="update.php"><?= $fetch_profile['name']; ?></a></p> -->
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Add new comment</label>
              <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-sm-10">
              <input type="submit" value="add comment" class="btn btn-primary divider" name="add_comment">
            </div>

          </div>
        </form>
        <?php
      } else {
        ?>
        <div class="add-comment">
          <p>please login to add or edit your comment</p>
          <a href="login.php" class="inline-btn">login now</a>
        </div>
        <?php
      }
      ?>

      <div class="divider divider-info">
        <div class="divider-text">Comments</div>
      </div>
      <?php
      $select_comments = $bdd->prepare("SELECT * FROM `comments` WHERE post_id = ?");
      $select_comments->execute([$get_id]);
      if ($select_comments->rowCount() > 0) {
        while ($fetch_comments = $select_comments->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <div class="card-body">
          <div class="card shadow-none bg-transparent border border-info mb-3" >
            <div class="card-body">
              <h5 class="card-title">
                <?= $fetch_comments['user_name']; ?>
              </h5>
              <p class="card-text">
                <?= $fetch_comments['comment']; ?>
              </p>
            </div>
            <?php
            if ($fetch_comments['user_id'] == $user_id) {
              ?>
              <div class="card-body">
              <form action="" method="POST">
                <input type="hidden" name="comment_id" value="<?= $fetch_comments['id']; ?>">
                <button type="submit" class="btn btn-icon btn-outline-primary" name="open_edit_box"><i
                    class='bx bxs-edit-alt'></i></button>
                <button type="submit" class="btn btn-icon btn-outline-primary" name="delete_comment"
                  onclick="return confirm('delete this comment?');"><i class='bx bxs-message-alt-x'></i></button>
              </form>
              </div>
              <?php
            }
            ?>
          </div>
          </div>

          <?php
        }
      } else {
        echo '<div class="divider "><h5>No comment added yet</h5></div>';
      }
      ?>
    </div>

  </div>
</div>
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
<?php include "./includes/footer.php"; ?>