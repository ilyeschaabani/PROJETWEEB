<?php
$page_titre = "Reset Password";
include "./includes/header.php";
?>
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Forgot Password -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.php" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="../assets/img/logosvg.svg" alt="">
                            </span>
                            <span class="app-brand-text demo text-body fw-bolder">Mindzone</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Password Reset</h4>
                    <p class="mb-4">Change yout password and get back on track!</p>
                    <?php
                    if (isset($_POST['pwdchange'])) {
                        $code = htmlspecialchars($_POST['code']);
                        $password = sha1($_POST['password']);
                        $password2 = sha1($_POST['password2']);
                        $query = $bdd->prepare("SELECT * FROM users WHERE code = ?");
                        $query->execute(array($code));
                        $verfcode = $query->fetch();
                        if ($verfcode['code'] == $code) {
                            if ($password == $password2) {

                                $query = $bdd->prepare("UPDATE users SET password = ? WHERE code = ?");
                                $query->execute(array($password, $code));
                                header("Location: ./login.php");
                            } else {
                                $error = "Passwords dosent match";
                            }
                        } else {
                            $error = "Verification code wrong";
                        }
                    }
                    ?>
                    <form class="mb-3" method="POST">
                        <?php if (isset($error)) {
                            echo '<div class="alert alert-warning alert-dismissible" role="alert">
                ' . $error . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                        } ?>
                        <div class="mb-3">
                            <label class="form-label" for="code">Code</label>
                            <input type="text" id="code" class="form-control" name="code"
                                placeholder="Enter your code" aria-describedby="code" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">New Password</label>
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Confirm new password</label>
                            <input type="password" id="password2" class="form-control" name="password2"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100" name="pwdchange">Change
                            Password</button>
                    </form>
                    <div class="text-center">
                        <a href="login.php" class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                            Back to login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./includes/footer.php"; ?>