<?php
$page_titre = "Profile";
require("../config.php");
include "./includes/header-nav.php";
?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span> Profile</h4>

  <div class="row">
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start mb-4 align-items-sm-center gap-4">
          <img src="./uploads/<?php echo $userinfo['image']; ?>" alt="user-avatar" class="d-block rounded" height="100"
            width="100" id="uploadedAvatar">
        </div>
        <hr class="my-0 mb-3">
        <form>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">ID</label>
            <div class="col-sm-10">
              <h5 for="basic-default-name">
                <?php echo $userinfo['id']; ?>
              </h5>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Name</label>
            <div class="col-sm-10">
              <h5 for="basic-default-name">
                <?php echo $userinfo['nom']; ?>
              </h5>
              </label>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-email">Prename</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <h5 for="basic-default-name">
                  <?php echo $userinfo['prenom']; ?>
                </h5>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <h5 for="basic-default-name">
                  <?php echo $userinfo['email']; ?>
                </h5>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Account Type</label>
            <div class="col-sm-10">
              <h5 for="basic-default-name">
                <?php
                if ($userinfo['isAdmin'] == 1) {
                  echo "Admin";
                } else if ($userinfo['typeCompte'] == 0) {
                  echo "User";
                } else {
                  echo "Agent";
                } ?>
              </h5>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Created Date</label>
            <div class="col-sm-10">
              <h5 for="basic-default-name">
                <?php echo date('d/m/Y', strtotime($userinfo['datecreation'])); ?>
              </h5>
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