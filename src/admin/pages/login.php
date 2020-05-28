<?php
    include '../../connection.php';
    include_once '../../../core/init.php';
    $user = new User_Admin();
    if ($user->isLoggedIn()) {
        header("Location: ./");
    } else {
?>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../../../layout/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <a href="../../../index.php">
        <span>
            <?php
                include '../../../img/login/x.svg';
            ?>
        </span>
    </a>
    <div class="container">
        <div class="img">
            <?php
                include '../../../img/login/bg3.svg';
            ?>
        </div>
        <div class="login-content">
            <form action="login_verification.php" method="POST">
                <img src="../../../img/login/avatar.svg" draggable="false">
                <h2 class="title">S'identifier</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Nom d'utilisateur</h5>
                        <input type="text" name="username" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Mot de passe</h5>
                        <input type="password" name="password" class="input">
                    </div>
                </div>
                <br>
                <?php
                    if(isset($_GET['err'])){
                ?>
                        <strong style="color:#d63031;">Échec de l'authentification.</strong>
                <?php
                    }
                ?>
                <input type="submit" class="btn" name="login" value="Connexion">
                <a href="#">Informations de compte oubliées?</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../../../layout/js/login.js"></script>
</body>

</html>
<?php
}
?>