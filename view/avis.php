<?php
$page_titre = "Opinions";
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
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">AVIS /</span> Add new opinion</h4>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                Add Opinion
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile"
                aria-controls="navs-top-profile" aria-selected="false">
                View Opinions
            </button>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Give us your opinion</h5>
            </div>
            <?php
            if (isset($_POST['addopinion'])) {
                $opinion = htmlspecialchars($_POST['opinion']);
                if (filter_var($addemail, FILTER_VALIDATE_EMAIL)) {
                    $insertres = $bdd->prepare("INSERT INTO avis( contenu, id_user) VALUES(?, ?)");
                    $insertres->execute(array($opinion, $userinfo['id']));
                }
            }
            ?>
            <form method="POST">
                <div class="card-body">
                    <p id="message"></p>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Your opinion</label>
                        <textarea name="opinion" id="basic-default-message" id="postcontentinput" class="form-control"
                            required maxlength="10000" placeholder="write your opinion" cols="10" rows="5"></textarea>
                    </div>
                    <button type="submit" value="addopinion" class="btn btn-primary">Send</button>
                </div>

            </form>
        </div>
    </div>
    <?php
    include '../Controller/ClientC.php';
    /* //include '../Model/Client.php';
    $pc = new ClientC();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $c = new client($_POST['contenu'], $userinfo['id']);
    $pc->addClient($c);
    // $pc->addcrud($c)
    } */

    $pc = new ClientC();

    $liste = $pc->listClient();
    ?>
    <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-5">
                <?php
                $select_avis = $bdd->prepare("SELECT * FROM avis");
                $select_avis->execute();
                $total_replies = $select_avis->rowCount();
                if ($select_avis->rowCount() > 0) {
                    while ($fetch_avis = $select_avis->fetch(PDO::FETCH_ASSOC)) {
                        $selectuser = $bdd->prepare("SELECT * FROM `users` WHERE id = ?");
                        $selectuser->execute([$fetch_avis["id_user"]]);
                        $fetchuser = $selectuser->fetch();
                        ?>
                        <form method="POST" class="col-md">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4" style="width: 11.333333%;">
                                        <img style="width:150px;height:150px;" class="card-img card-img-left"
                                            src="./uploads/<?php echo $fetchuser['image']; ?>" alt="Card image">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?= $fetchuser["nom"] ?>
                                                <?= $fetchuser["prenom"] ?>
                                            </h5>
                                            <p class="card-text">
                                                <?= $fetch_avis["contenu"] ?>
                                            </p>
                                            <p class="card-text"><small class="text-muted">
                                                    <?= $fetch_avis["date"] ?>
                                                </small></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card-body">
                                            <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd"
                                                aria-controls="offcanvasEnd" class="btn btn-sm btn-primary"><span
                                                    class="tf-icons bx bx-reply"></span>Reply</button>
                                                    <span class="badge bg-label-info"><i class='bx bx-comment-detail'></i><?= $total_replies ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd"
                                aria-labelledby="offcanvasEndLabel" aria-hidden="true" style="visibility: hidden;">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasEndLabel" class="offcanvas-title">Reply</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <?php
                                if (isset($_POST['addreply'])) {
                                    $opinion = htmlspecialchars($_POST['replyc']);
                                    $insertres = $bdd->prepare("INSERT INTO reponse( contenu_rep, id_avis, id_user) VALUES(?, ?, ?)");
                                    $insertres->execute(array($opinion, $fetch_avis['id'], $userinfo['id']));
                                }
                                ?>
                                <form method="POST">
                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                        <div class="demo-inline-spacing mt-3">
                                            <div class="list-group mb-3">
                                                <?php
                                                $select_rep = $bdd->prepare("SELECT * FROM reponse");
                                                $select_rep->execute();
                                                if ($select_rep->rowCount() > 0) {
                                                    while ($fetch_rep = $select_rep->fetch(PDO::FETCH_ASSOC)) {
                                                        $slectavis = $bdd->prepare("SELECT * FROM `avis` WHERE id = ?");
                                                        $slectavis->execute([$fetch_rep["id_avis"]]);
                                                        $fetchavis = $slectavis->fetch();
                                                        $select_user = $bdd->prepare("SELECT * FROM `users` WHERE id = ?");
                                                        $select_user->execute([$fetch_rep["id_user"]]);
                                                        $fetch_user1 = $select_user->fetch();
                                                        ?>
                                                        <form method="POST" >
                                                        <a class="list-group-item list-group-item-action flex-column align-items-start mb-3">
                                                            <div class="d-flex justify-content-between w-100">
                                                                <h6>
                                                                    <?= $fetch_user1["nom"] ?>
                                                                    <?= $fetch_user1["prenom"] ?>
                                                                </h6>
                                                                <small>
                                                                    <?= $fetch_rep["date_rep"] ?>
                                                                </small>
                                                            </div>
                                                            <p class="mb-1">
                                                                <?= $fetch_rep["contenu_rep"] ?>
                                                            </p>
                                                            </a>
                                                        </form>
                                                        <?php
                                                    }
                                                } ?>
                                            </div>
                                        </div>
                                        <textarea class="form-control mb-3" name="replyc" id="exampleFormControlTextarea1"
                                            rows="2"></textarea>
                                        <button type="submit" name="addreply" class="btn btn-primary mb-2 d-grid w-100">Send
                                            Reply</button>
                                </form>
                                <button type="button" class="btn btn-outline-secondary d-grid w-100"
                                    data-bs-dismiss="offcanvas">
                                    Cancel
                                </button>
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
<?php include './includes/footer.php'; ?>