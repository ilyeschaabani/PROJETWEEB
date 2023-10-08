<?php
$page_titre = "Login";
include "./includes/header.php";

 ?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <div class="card">
                <div class="card-body">
                    <div class="app-brand justify-content-center">
                        <a href="index.php" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="../assets/img/logosvg.svg" alt="">
                            </span>
                            <span class="app-brand-text demo text-body fw-bolder">Mindzone</span>
                        </a>
                    </div>
                    <h4 class="mb-2">Welcome to Mindzone! 👋</h4>
                    <p class="mb-4">Please sign-in to your account</p>
                    <p class="mb-4" id="message"></p>
                    <?php
                    if (isset($_SESSION['email'])) {
                        header("Location: ./index.php");
                    }
                    if (isset($_POST['formconnexion'])) {
                        $email = htmlspecialchars($_POST['email']);
                        $password = sha1($_POST['password']);
                        if (!empty($email) and !empty($password)) {
                            $requser = $bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
                            $requser->execute(array($email, $password));
                            $userexist = $requser->rowCount();
                            if ($userexist == 1) {
                                $userinfo = $requser->fetch();
                                $_SESSION['id'] = $userinfo['id'];
                                $_SESSION['email'] = $userinfo['email'];
                                header("Location: ./index.php");
                            } else {
                                $erreur = "Votre email et/ou votre mot de passe sont incorrect !";
                            }
                        } else {
                            $erreur = "Tout les champs doivent être complété ! ";
                        }
                    }
                    ?>
                    <form class="mb-3" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="emailinput" name="email"
                                placeholder="Enter your email" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <a href="./forgetpwd.php">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="pwdinput" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me">Remember Me</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" name="formconnexion" type="submit">Sign
                                in</button>
                        </div>
                        <p class="text-center mb-3">
                        <span>New on our platform?</span>
                        <a href="./register.php">
                            <span>Create an account</span>
                        </a>
                    </p>
                    <div class="mb-3 divider"><button type="submit" name="loginfb" class="btn rounded-pill btn-icon btn-outline-primary">
                            <a href="<?php echo $fb_login_url;?>"><span class="tf-icons bx bxl-facebook-circle"></span></a>
                        </button>
                        <button type="button" class="btn rounded-pill btn-icon btn-outline-primary">
                            <a href=""><span class="tf-icons bx bxl-github"></span></a>
                        </button>
                        <button type="button" class="btn rounded-pill btn-icon btn-outline-primary">
                            <a href=""> <span class="tf-icons bx bxl-google"></span></a>
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./includes/footer.php"; ?>