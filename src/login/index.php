<?php
ob_start();
include "../connection.php"; //binma m7ina hdchi o rej3nah PDO
include_once '../../core/init.php';
$User_Prof = new User_Prof();
if ($User_Prof->isLoggedIn()) {
    if ($User_Prof->data()->role == "responsable")
        header("Location: ../responsable/");
    else
        header("Location: ../prof/");
} else
    $User_Etudiant = new User_Etudiant();
if ($User_Etudiant->isLoggedIn()) {
    header("Location: ../etudiant/");
} else {
?>
    <html>

    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../../layout/css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <?php
        if (isset($_GET['resetsuccess'])) {
        ?>
            <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; text-align: center;  min-height: 200px;  ">
                <div class="toast" style=" width:700px; background-color: #06b4c8; opacity: 0.8; color:white;">
                    Votre mot de passe a étè bien modifié.
                </div>
            </div>
            
        <?php
        }
        ?>
        <a href="../../index.php">
            <span>
                <?php
                include '../../img/login/x.svg';
                ?>
            </span>
        </a>
        <div class="container">
            <div class="img">
                <?php
                include '../../img/login/bg3.svg';
                ?>
            </div>
            <?php
            if (!isset($_GET['restore']) && !isset($_GET['resetPassword'])) {
            ?>
                <!-- login -->
                <div class="login-content">
                    <form action="login_verification.php" method="POST">
                        <img src="../../img/login/avatar.svg" draggable="false">
                        <h2 class="title">S'identifier</h2>
                        <div class="input-div one <?php if (isset($_GET["err"])) echo "focus" ?>">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="div">
                                <h5>Nom d'utilisateur</h5>
                                <input type="text" name="username" class="input" value="<?php if (isset($_GET["err"])) echo $_GET["err"]; ?>">
                            </div>
                        </div>
                        <div class="input-div pass">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Mot de passe</h5>
                                <input type="password" name="password" id="pass" class="input">
                            </div>
                        </div>
                        <div>
                            <label style="float: left;">
                                <input type="checkbox" id="isChecked"> Show password
                            </label>
                            <!-- <a style="float: right;">forget password</a> -->
                        </div>

                        <br>
                        <?php
                        if (isset($_GET["err"])) {
                        ?>
                            <strong style="color:#d63031;">Échec de l'authentification.</strong>
                        <?php
                        }
                        ?>
                        <input type="submit" class="btn" name="login" value="Connexion">
                        <a href="whoAreYou.php" class="formShower">Informations de compte oubliées?</a>
                    </form>
                </div>
            <?php
            }
            if (isset($_GET['restore'])) {
            ?>
                <!-- restore password -->
                <div class="login-content">
                    <form action="verification_acc.php" method="POST">
                        <img src="../../img/login/avatar.svg" draggable="false">
                        <h2 class="title">Vérification</h2>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-address-card"></i>
                            </div>
                            <div class="div">
                                <h5>Cin</h5>
                                <input type="text" name="cin" class="input">
                            </div>
                        </div>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <?php
                            if ($_GET['role'] == 'etudiant') {
                            ?>
                                <div class="div">
                                    <h5>Cne</h5>
                                    <input type="text" name="cne" class="input" value="">
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="div">
                                    <h5>SOM</h5>
                                    <input type="text" name="som" class="input" value="">
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-birthday-cake"></i>
                            </div>
                            <div class="div">
                                <h5>Date naissance</h5>
                                <input type="text" name="dateN" class="input" onfocus="(this.type='date')" onfocusout="(this.type='text')">
                            </div>
                        </div>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="div">
                                <h5>Email d'activation</h5>
                                <input type="email" name="email" class="input" id="email">
                            </div>
                        </div>
                        <?php
                        if (isset($_GET["err"])) {
                        ?>
                            <strong style="color:#d63031;">Whoops! on a pas pu vous identifier.</strong>
                        <?php
                        }
                        ?>
                        <input type="submit" class="btn" name="submit" value="ok?">
                        <input type="hidden" name="<?php
                                                    if ($_GET['role'] == 'etudiant')
                                                        echo 'som';
                                                    else
                                                        echo 'cne'
                                                    ?>">
                    </form>
                </div>
            <?php
            }
            if (isset($_GET['resetPassword'])) {
            ?>
                <!-- login -->
                <div class="login-content">
                    <form action="reset_password.php" method="POST">
                        <img src="../../img/login/avatar.svg" draggable="false">
                        <h2 class="title">S'identifier</h2>
                        <br>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fa fa-address-book"></i>
                            </div>
                            <div class="div">
                                <input type="text" name="username" class="input" value="<?php
                                                                                        $_sessionCin = Config::get('session/session_cin');
                                                                                        $cin__FromSession = Session::get($_sessionCin);
                                                                                        $sql = "SELECT username from Utilisateur where id=?";
                                                                                        echo DB::getInstance()->query($sql,[$cin__FromSession])->first()->username;
                                                                                        ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Mot de passe</h5>
                                <input type="password" name="password" id="pass" class="input">
                            </div>
                        </div>
                        <!-- div pour error -->
                        <div class="errorPass" style="color:#d63031;"></div>

                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Répéter le mot de passe</h5>
                                <input type="password" class="input" id="checkpass"><br>
                            </div>
                        </div>
                        <div class="errorCheckPass" style="color:#d63031;"></div>
                        <input type="input" name="cin" value="<?php echo  $cin__FromSession;
                                                                Session::delete($_sessionCin); ?>" hidden>
                        <input type="submit" class="btn resetPassword" name="reset" value="Réinitialiser">
                    </form>
                </div>

            <?php
            }
            ?>
        </div>
        <script type="text/javascript" src="../../layout/js/login.js"></script>
        <script type="text/javascript" src="../../layout/js/jquery-3.4.1.min.js"></script>
        <script>
            
            $(document).ready(function() {
                const input = $("#pass");
                $("#isChecked").change(function() {
                    if (this.checked) {
                        input.attr("type", "text");
                    } else
                        input.attr("type", "password");

                });
            });
        </script>
        <script type="text/javascript">
            const checkpass = document.querySelector("#checkpass");
            const pass = document.querySelector("#pass");
            const errorcheckpass = document.querySelector(".errorCheckPass");
            const errorpass = document.querySelector(".errorPass");
            const btn = document.querySelector(".resetPassword");
            btn.addEventListener("click", (event) => {
                errorcheckpass.textContent = "";
                errorpass.textContent = "";
                if (checkpass.value == "" || checkpass.value == null) {
                    errorcheckpass.textContent = "Veuillez remplir ce champ.";
                    event.preventDefault();
                }
                if (pass.value == "" || pass.value == null) {
                    errorpass.textContent = "Veuillez remplir ce champ.";
                    event.preventDefault();
                }
                if (checkpass.value != pass.value) {
                    errorcheckpass.textContent = "Les mots de passe ne sont pas identiques.";
                    event.preventDefault();
                }
            });
        </script>

    </body>

    </html>
<?php
}
ob_end_flush();
?>