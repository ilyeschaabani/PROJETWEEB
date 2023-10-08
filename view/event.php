<?php
require("../config.php");
$page_titre = "Event";
include "./includes/header-nav.php";
if (isset($userinfo['email'])) {
    $requser = $bdd->prepare('SELECT * FROM ban WHERE userId = ?');
    $requser->execute(array($userinfo['id']));
    $userexist = $requser->rowCount();
    if ($userexist == 1) {
        header('Location: ./ban.php');
    }
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="index.php" class="text-muted fw-light">Home /</a> Event</h4>
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-pills-top-add" aria-controls="navs-pills-top-add" aria-selected="false">
                    Add
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                    data-bs-target="#navs-pills-top-view" aria-controls="navs-pills-top-view" aria-selected="false">
                    View Events
                </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="navs-pills-top-add" role="tabpanel">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add new event</h5>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_POST['addevent'])) {
                        $addname = htmlspecialchars($_POST['addname']);
                        $adddesc = htmlspecialchars($_POST['adddesc']);
                        $adddate = date('Y-m-d H:i:s', strtotime($_POST['adddate']));

                        $image = $_FILES['image']['name'];
                        $image = filter_var($image, FILTER_SANITIZE_STRING);
                        $image_size = $_FILES['image']['size'];
                        $image_tmp_name = $_FILES['image']['tmp_name'];
                        $image_folder = './uploads/' . $image;

                        if (isset($image)) {
                            $select_image = $bdd->prepare("SELECT * FROM `event` WHERE image = ? AND date= ?");
                            $select_image->execute([$image, $adddate]);

                            if ($select_image->rowCount() > 0 and $image != '') {
                                $message[] = 'image name repeated!';
                            } elseif ($image_size > 2000000) {
                                $message[] = 'images size is too large!';
                            } else {
                                // Create a new image from file
                                $image_resource = imagecreatefromjpeg($image_tmp_name);

                                // Get the current dimensions of the image
                                $width = imagesx($image_resource);
                                $height = imagesy($image_resource);

                                // Calculate the new dimensions of the image
                                $new_width = 500;
                                $new_height = 500;

                                // Create a new blank image with the desired dimensions
                                $new_image_resource = imagecreatetruecolor($new_width, $new_height);

                                // Copy the old image to the new image, cropping as necessary
                                if ($width > $height) {
                                    $crop_x = ($width - $height) / 2;
                                    imagecopyresampled($new_image_resource, $image_resource, 0, 0, $crop_x, 0, $new_width, $new_height, $height, $height);
                                } else {
                                    $crop_y = ($height - $width) / 2;
                                    imagecopyresampled($new_image_resource, $image_resource, 0, 0, 0, $crop_y, $new_width, $new_height, $width, $width);
                                }

                                // Save the new image to file
                                imagejpeg($new_image_resource, $image_folder, 100);

                                // Free up memory
                                imagedestroy($image_resource);
                                imagedestroy($new_image_resource);
                                $insertres = $bdd->prepare("INSERT INTO event( date, nom, description, image) VALUES(?, ?, ?, ?)");
                                $insertres->execute(array($adddate, $addname, $adddesc, $image));
                                $message[] = 'Image updated successfully';
                            }
                        } else {
                            $insertres = $bdd->prepare("INSERT INTO event( date, nom, description) VALUES(?, ?, ?)");
                            $insertres->execute(array($adddate, $addname, $adddesc));
                        }
                    }
                    ?>
                    <form method="POST" id="eventForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Event name</label>
                            <input type="text" name="addname" class="form-control" id="basic-default-fullname">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Media</label>
                            <input class="form-control" type="file" name="image" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Date event</label>
                            <input type="datetime-local" class="form-control" id="html5-datetime-local-input"
                                value="<?php echo date('Y-m-d\TH:i:s', time()); ?>" name="adddate" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Description</label>
                            <textarea id="basic-default-message" name="adddesc" class="form-control" rows="3"
                                placeholder="Tell us more about your event"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addEvent()" name="addevent">Add</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-view" role="tabpanel">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row mb-1 mt-1">
                        <?php
                        $select_event = $bdd->prepare("SELECT * FROM event");
                        $select_event->execute();
                        if ($select_event->rowCount() > 0) {
                            while ($fetch_event = $select_event->fetch(PDO::FETCH_ASSOC)) {
                                $post_id = $fetch_event['id'];
                                ?>
                                <form method="POST" class="mb-2 mb-1">
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="row g-0">
                                                <div class="col-md-2">
                                                    <img class="card-img card-img-left" style="height:200px;width:200px;" src="./uploads/<?= $fetch_event['image']; ?>" alt="Event Media">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Event name:
                                                            <?= $fetch_event['nom']; ?>
                                                        </h5>
                                                        <p class="card-text">
                                                            <?= $fetch_event['description']; ?>
                                                        </p>
                                                        <p class="card-text"><small class="text-muted">Date :
                                                                <?= $fetch_event['date']; ?>
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a target="_blank" class="footer-link fw-bolder">AFTERMATH</a>
        </div>
    </div>
</footer>
<?php
include "./includes/footer.php"; ?>