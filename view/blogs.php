<?php
$page_titre = "Blogs";
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
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
} else {
    $user_id = '';
}
;
include './includes/likes.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="index.php" class="text-muted fw-light">Home /</a> Blogs</h4>
    <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-add" aria-controls="navs-pills-top-add" aria-selected="false">
                Add
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-view"
                aria-controls="navs-pills-top-view" aria-selected="false">
                View Blogs
            </button>
        </li>
    </ul>
    <?php
    $user_id = $_SESSION['id'];
    if (!isset($user_id)) {
        header('location:connection.php ');
    }
    if (isset($_POST['publish'])) {
        $title = $_POST['title'];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $content = $_POST['content'];
        $content = filter_var($content, FILTER_SANITIZE_STRING);
        $category = $_POST['category'];
        $category = filter_var($category, FILTER_SANITIZE_STRING);
        $status = 'active';
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = './uploaded_img/' . $image;
        $select_image = $bdd->prepare("SELECT * FROM `posts` WHERE image = ? AND user_id = ?");
        $select_image->execute([$image, $user_id]);
        if (isset($image)) {
            if ($select_image->rowCount() > 0 and $image != '') {
                $message[] = 'image name repeated!';
            } elseif ($image_size > 2000000) {
                $message[] = 'images size is too large!';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        } else {
            $image = '';
        }
        if ($select_image->rowCount() > 0 and $image != '') {
            $message[] = 'please rename your image!';
        } else {
            $insert_post = $bdd->prepare("INSERT INTO `posts`(user_id , title, content, category, image, status) VALUES(?,?,?,?,?,?)");
            $insert_post->execute([$user_id, $title, $content, $category, $image, $status]);
            $message[] = 'post published!';
        }
    }
    if (isset($_POST['draft'])) {
        $title = $_POST['title'];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $content = $_POST['content'];
        $content = filter_var($content, FILTER_SANITIZE_STRING);
        $category = $_POST['category'];
        $category = filter_var($category, FILTER_SANITIZE_STRING);
        $status = 'deactive';
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = './uploaded_img/' . $image;
        $select_image = $bdd->prepare("SELECT * FROM `posts` WHERE image = ? AND user_id = ?");
        $select_image->execute([$image, $user_id]);
        if (isset($image)) {
            if ($select_image->rowCount() > 0 and $image != '') {
                $message[] = 'image name repeated!';
            } elseif ($image_size > 2000000) {
                $message[] = 'images size is too large!';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        } else {
            $image = '';
        }
        if ($select_image->rowCount() > 0 and $image != '') {
            $message[] = 'please rename your image!';
        } else {
            $insert_post = $bdd->prepare("INSERT INTO `posts`(user_id, name, title, content, category, image, status) VALUES(?,?,?,?,?,?)");
            $insert_post->execute([$user_id, $name, $title, $content, $category, $image, $status]);
            $message[] = 'draft saved!';
        }
    }
    if (isset($_POST['delete'])) {
        $p_id = $_POST['post_id'];
        $p_id = filter_var($p_id, FILTER_SANITIZE_STRING);
        $delete_image = $bdd->prepare("SELECT * FROM `posts` WHERE id = ?");
        $delete_image->execute([$p_id]);
        $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
        if ($fetch_delete_image['image'] != '') {
            unlink('./uploaded_img/' . $fetch_delete_image['image']);
        }
        $delete_post = $bdd->prepare("DELETE FROM `posts` WHERE id = ?");
        $delete_post->execute([$p_id]);
        $delete_comments = $bdd->prepare("DELETE FROM `comments` WHERE post_id = ?");
        $delete_comments->execute([$p_id]);
        $message[] = 'post deleted successfully!';
    }
    ?>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="navs-pills-top-add" role="tabpanel">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add Blog</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <p id="message"></p>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">TITLE</label>
                            <input type="text" class="form-control" placeholder="Post title" id="postnameinput"
                                name="title" maxlength="100">
                        </div>
                        <div class="mb-3">
                            <label class="form-label_im" for="basic-default-phone">Image</label>
                            <input class="form-control" type="file" id="formFile"
                                accept="image/jpg, image/jpeg, image/png, image/webp" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Example select</label>
                            <select class="form-select" name="category" id="exampleFormControlSelect1"
                                aria-label="Default select example" required>
                                <option value="" selected disabled>-- select category* </option>
                                <option value="nature">nature</option>
                                <option value="education">education</option>
                                <option value="pets and animals">pets and animals</option>
                                <option value="technology">technology</option>
                                <option value="fashion">fashion</option>
                                <option value="entertainment">entertainment</option>
                                <option value="movies and animations">movies</option>
                                <option value="gaming">gaming</option>
                                <option value="music">music</option>
                                <option value="sports">sports</option>
                                <option value="news">news</option>
                                <option value="travel">travel</option>
                                <option value="comedy">comedy</option>
                                <option value="design and development">design and development</option>
                                <option value="food and drinks">food and drinks</option>
                                <option value="lifestyle">lifestyle</option>
                                <option value="personal">personal</option>
                                <option value="health and fitness">health and fitness</option>
                                <option value="business">business</option>
                                <option value="shopping">shopping</option>
                                <option value="animations">animations</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">CONTENT</label>
                            <textarea name="content" id="basic-default-message" id="postcontentinput"
                                class="form-control" required maxlength="10000" placeholder="write your content..."
                                cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" value="publish post" name="publish" class="btn btn-primary">Add
                            blog</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-view" role="tabpanel">
            <div class="row mb-5">
                <?php
                $select_posts = $bdd->prepare("SELECT * FROM `posts` WHERE status = ?");
                $select_posts->execute(['active']);
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
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $fetch_posts["title"] ?>
                                    </h5>
                                    <h6 class="card-subtitle text-muted">
                                        <?= $fetch_posts["category"] ?>
                                    </h6>
                                </div>
                                <img class="img-fluid" src="./uploaded_img/<?= $fetch_posts["image"] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">
                                        <?= $fetch_posts["content"] ?>
                                    </p>
                                    <p class="card-text">
                                        <?php if ($fetch_posts["status"] == "active") { ?>
                                            <span class="badge bg-label-success">
                                                <?= $fetch_posts["status"] ?>
                                            </span>
                                        <?php } else { ?>
                                            <span class="badge bg-label-warning">
                                                <?= $fetch_posts["status"] ?>
                                            </span>
                                        <?php } ?>
                                    </p>
                                    <button type="submit" name="like_post" class="btn rounded-pill btn-outline-primary">
                                        <i class='bx bxs-like'></i>
                                        <?= $total_post_likes ?>
                                    </button>
                                    <a href="read_post.php?post_id=<?= $post_id; ?>"
                                        class="btn rounded-pill btn-outline-primary">
                                        <i class='bx bxs-comment'></i>
                                        <?= $total_post_comments ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
</div>


<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a target="_blank" class="footer-link fw-bolder">AFTERMATH</a>
        </div>
    </div>
</footer>
<?php include "./includes/footer.php"; ?>