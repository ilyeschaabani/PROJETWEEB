<?php
require("../config.php");
$page_titre = "Reclamation";
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
  <h4 class="fw-bold py-3 mb-4"><a href="index.php" class="text-muted fw-light">Home /</a> Reclamation</h4>
  <div class="nav-align-top mb-4">

    <div class="tab-content">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Add Reclamations</h5>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <p id="message"></p>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Type reclamation</label>
            <select class="form-select" name="typeR" id="exampleFormControlSelect1" aria-label="Default select example"
              required>
              <option value="" selected disabled>-- select type* </option>
              <option value="technique">TECHNIQUE</option>
              <option value="bug">BUG</option>
              <option value="support ">SUPPORT</option>
              <option value="service ">SERVICE</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-message">Description</label>
            <textarea id="descriptionR" name="descriptionR" id="basic-default-message" class="form-control" required
              maxlength="10000" placeholder="write about your reclamation" cols="30" rows="10"></textarea>
          </div>
          <button type="submit" value="publish post" class="btn btn-primary">Send reclamation</button>
        </form>
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
    include "./includes/footer.php";
    include_once '../Controller/ReclamationC.php';
    include_once '../Model/Reclamation.php';
    $pc = new ReclamationC();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // collect value of input field
      $r = new Reclamation( $_POST['typeR'], $_POST['descriptionR']);

      $pc->addReclamation($r);
      // $pc->addcrud($c);
    }