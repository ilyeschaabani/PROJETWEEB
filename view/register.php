<?php
$page_titre = "Register";
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
                        <h4 class="mb-2">Get started by creating your account</h4>
                        <p class="mb-4">Make your day peacful !</p>
                        <?php
                        if (isset($_SESSION['name'])) {
                            header("Location: ./index1.php");
                        } else {

                            if (isset($_POST['forminscription'])) {
                                $nom = htmlspecialchars($_POST['nom']);
                                $prenom = htmlspecialchars($_POST['prenom']);
                                $email = htmlspecialchars($_POST['email']);
                                $password = sha1($_POST['password']);
                                if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['password'])) {
                                    $nomlength = strlen($nom);
                                    $namelength = strlen($prenom);
                                    if ($namelength <= 255 && $nomlength <= 255) {
                                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                            $reqemail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
                                            $reqemail->execute(array($email));
                                            $mailexist = $reqemail->rowCount();
                                            if ($mailexist == 0) {
                                                $insertmbr = $bdd->prepare("INSERT INTO users(nom, prenom, email, password) VALUES(?, ?, ?, ?)");
                                                $insertmbr->execute(array($nom, $prenom, $email, $password));
                                                header("Location: ./login.php");
                                                $success = "Votre compte a été crée avec succés !";
                                            } else {
                                                $erreur = "l'adresse email saisis est deja utilisé";
                                            }
                                        } else {
                                            $erreur = "Votre addresse email n'est pas valide !";
                                        }
                                    } else {
                                        $erreur = "Votre pseudonyme doit faire moins de 255 characteres !";
                                    }
                                } else {
                                    $erreur = "Les champs sont incomplet !";
                                }
                            }
                        }
                        ?>
                        <form  class="mb-3" method="POST">
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="nameBasic" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="nom" name="nom"
                                        placeholder="Enter your name" autofocus />
                                </div>
                                <div class="col mb-0">
                                    <label for="prenameBasic" class="form-label">Prename</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom"
                                        placeholder="Enter your prename" autofocus />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions"
                                        name="terms" />
                                    <label class="form-check-label" for="terms-conditions">
                                        I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary d-grid w-100" name="forminscription">Sign up</button>
                        </form>

                        <p class="text-center">
                            <span>Already have an account?</span>
                            <a href="./login.php">
                                <span>Sign in instead</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./includes/footer.php"; ?>