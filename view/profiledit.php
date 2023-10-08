<?php
$page_titre = "Profile";
require("../config.php");
include "./includes/header-nav.php";
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span> Profile Edit</h4>

    <div class="row">
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
                <?php
                if (isset($_POST['FormEdit'])) {
                    $email = htmlspecialchars($_POST['email']);
                    $nom = htmlspecialchars($_POST['nom']);
                    $prenom = htmlspecialchars($_POST['prenom']);

                    if (isset($_FILES['image'])) {
                        $image = $_FILES['image']['name'];
                        $image = filter_var($image, FILTER_SANITIZE_STRING);
                        $image_size = $_FILES['image']['size'];
                        $image_tmp_name = $_FILES['image']['tmp_name'];
                        $image_folder = './uploads/' . $image;

                        if (isset($image)) {
                            $select_image = $bdd->prepare("SELECT * FROM `users` WHERE image = ? AND id = ?");
                            $select_image->execute([$image, $userinfo['id']]);

                            if ($select_image->rowCount() > 0 and $image != '') {
                                $message[] = 'image name repeated!';
                            } elseif ($image_size > 2000000) {
                                $message[] = 'images size is too large!';
                            } else {
                                move_uploaded_file($image_tmp_name, $image_folder);
                                $update = $bdd->prepare('UPDATE users SET image = ? WHERE id = ?');
                                $update->execute(array($image, $userinfo['id']));
                                $message[] = 'Image updated successfully';
                            }
                        }
                    }
                    $update = $bdd->prepare('UPDATE users SET nom = ?, prenom = ?, email = ? WHERE id = ?');
                    $update->execute(array($nom, $prenom, $email, $userinfo['id']));
                    $message[] = 'Profile updated successfully';
                }
                ?>

                <form method="POST" enctype="multipart/form-data">
                    <div class="d-flex mb-4 align-items-start align-items-sm-center gap-4">
                        <img src="./uploads/<?php echo $userinfo['image']; ?>" alt="user-avatar" class="d-block rounded"
                            height="100" width="100" id="uploadedAvatar">
                    </div>
                    <hr class="my-0 mb-3">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Edit profile</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Profile Picture</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile"
                                        accept="image/jpg, image/jpeg, image/png, image/webp" name="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nom" id="basic-default-company"
                                        value="<?php echo $userinfo['nom']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Prename</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="prenom" id="basic-default-company"
                                        value="<?php echo $userinfo['prenom']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="email" id="basic-default-email" name="email" class="form-control"
                                            value="<?php echo $userinfo['email']; ?>" aria-label="john.doe"
                                            aria-describedby="basic-default-email2">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" name="FormEdit" class="btn btn-primary">Save Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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