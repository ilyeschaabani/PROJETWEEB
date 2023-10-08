<?php
require("../config.php");
$page_titre = "Reservation";
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
    <h4 class="fw-bold py-3 mb-4"><a href="index.php" class="text-muted fw-light">Home /</a> reservation</h4>
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
                    View Reservations
                </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="navs-pills-top-add" role="tabpanel">
                <div class="col-xl">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add new reservation</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_POST['addreservation'])) {
                            $addnumtel = htmlspecialchars($_POST['addnumtel']);
                            $adddaterese = date('Y-m-d H:i:s', strtotime($_POST['adddate']));
                            $insertres = $bdd->prepare("INSERT INTO reservation(id_user, numtel, dateres) VALUES(?, ?, ?)");
                            $insertres->execute(array($userinfo['id'], $addnumtel, $adddaterese));
                            $select_event1 = $bdd->prepare("SELECT * FROM event WHERE date = :dt");
                            $select_event1->execute(['dt' => $adddaterese]);
                            $fetch_event1 = $select_event1->fetch();

                            $subject = "Mindzone - Reservation";
                            $headers = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                            $message = file_get_contents("./includes/resvtemp.html");
                            $message = str_replace("USER,", "Dear {$userinfo['nom']} {$userinfo['prenom']}", $message);
                            $message = str_replace("DATE", "Reservation date: {$adddaterese}", $message);
                            $message = str_replace("EVENT", "Event: {$fetch_event1['nom']}", $message);
                            mail($userinfo['email'], $subject, $message, $headers);
                        }
                        ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">¨Phone Number</label>
                                <input type="text" name="addnumtel" class="form-control" id="basic-default-company">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Date reservation</label>
                                <select class="form-select" name="adddate" id="exampleFormControlSelect1"
                                    aria-label="Default select example" required>
                                    <option value="" selected disabled>-- select Date* </option>
                                    <?php
                                    $select_event = $bdd->prepare("SELECT * FROM event");
                                    $select_event->execute();
                                    if ($select_event->rowCount() > 0) {
                                        while ($fetch_event = $select_event->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <option class="form-control" type="datetime-local"
                                                value="<?= $fetch_event["date"] ?>"><?= $fetch_event["date"] ?> - <?= $fetch_event["nom"] ?> </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="addreservation">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-view" role="tabpanel">
                <div class="row mb-5">
                    <?php
                    $select_resv = $bdd->prepare("SELECT * FROM reservation");
                    $select_resv->execute();
                    if ($select_resv->rowCount() > 0) {
                        while ($fetch_resv = $select_resv->fetch(PDO::FETCH_ASSOC)) {
                            $selectevent = $bdd->prepare("SELECT * FROM `event` WHERE date = ?");
                            $selectevent->execute([$fetch_resv["dateres"]]);
                            $fetchevent = $selectevent->fetch();
                            $selectuser1 = $bdd->prepare("SELECT * FROM `users` WHERE id = ?");
                            $selectuser1->execute([$fetch_resv["id_user"]]);
                            $fetchuser1 = $selectuser1->fetch();
                            ?>
                            <form method="POST" class="col-md-6 col-lg-4 mb-3">
                                <div class="card">
                                    <h5 class="card-header">
                                        <?= $fetchuser1["nom"] ?>
                                        <?= $fetchuser1["prenom"] ?>
                                    </h5>
                                    <p class="card-header" style="padding-top: 0rem;padding-bottom: 0.5rem;">
                                        <?= $fetch_resv["dateres"] ?>
                                    </p>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p>
                                                Event:
                                                <?= $fetchevent["nom"] ?>
                                            </p>
                                            <footer class="blockquote-footer">
                                                Email :
                                                <cite title="Source Title">
                                                    <?= $fetchuser1["email"] ?>
                                                </cite>
                                            </footer>
                                        </blockquote>
                                        <?php
                                        if ($userinfo['id'] == $fetchuser1['id']) {
                                            ?>
                                            <a type="button"
                                                href="./reservation.php?delteMode=1&deleteid=<?php echo $fetch_resv['id']; ?>"
                                                class="btn btn-sm btn-primary mt-2">Delete</a>
                                            <?php
                                            if (isset($_GET['delteMode']) && !empty($_GET['delteMode']) && isset($_GET['deleteid']) && !empty($_GET['deleteid'])) {
                                                if ($_GET['deleteid'] == $fetch_resv['id']) {
                                                    $query = $bdd->prepare('DELETE FROM reservation WHERE id = ?');
                                                    $query->execute(array($fetch_resv['id']));
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }
                    } ?>
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