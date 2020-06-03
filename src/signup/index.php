<?php
    include_once '../../core/init.php';
?>
<html>

<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="../../layout/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php
    if(isset($_GET['activated'])){
?>
        <div aria-live="polite" aria-atomic="false" style="position: absolute; top: 13%; text-align: center;  min-height: 200px; ">
            <div class="toast" style=" width:700px; background-color: tomato; opacity: 0.8; color:white;">
                    Votre compte a été déjà activé!
            </div>
        </div>
<?php
      }
?>
    <a href="../../index.php">
        <span>
            <?php
                include '../../img/login/x.svg'; //todo: back botton to phase 1
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
            if(!isset($_GET['phase2'])){
        ?>
                <!-- phase 1 -->
                <div class="login-content">
                    <form action="signup_verification.php" method="POST">
                        <br>
                        <img src="../../img/login/avatar.svg" draggable="false">
                        <h2 class="title" style="color: #06b4c8;">Phase 1</h2>
                        <span class="title">Verification de l'existence du compte</span>
                        <br>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-address-card"></i>
                            </div>
                            <div class="div">
                                <h5>Cin</h5>
                                <input type="text" name="cin" class="input" >
                            </div>
                        </div>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <div class="div">
                                <h5>Cne</h5>
                                <input type="text" name="cne" class="input" >
                            </div>
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
                        <?php
                            if(isset($_GET['err'])){
                        ?>
                                <strong style="color:#d63031;">Woops! On a pas pu vous indentifier.</strong>
                        <?php
                        }
                        ?>
                        <input type="submit" class="btn" name="login" value="Connexion">
                        <span href="#">Compte déja activé? <a href="../login.php">Connectez-vous</a></span>
                        <br> 
                    </form>
                </div>
        <?php
            } else {
        ?>
                <!-- phase 2 -->
                <div class="login-content">
                    <form action="signup.php" method="POST">
                        <br>
                        <img src="../../img/login/avatar.svg" draggable="false">
                        <h2 class="title" style="color: #06b4c8;">Phase 2</h2>
                        <span class="title"><i class="fa fa-cog fa-spin"></i> Finalisation de la procédure</span>
                        <br>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fa fa-address-book"></i>
                            </div>
                            <div class="div"><!-- not finished yet! needs some php magic -->
                                <input type="text" name="username" class="input" value="fffss" readonly="readonly">
                            </div>
                        </div>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="div">
                                <h5>Email</h5>
                                <input type="text" name="email" class="input" >
                            </div>
                        </div>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Mot de passe</h5>
                                <input type="password" name="password" class="input" >
                            </div>
                        </div>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Répéter le mot de passe</h5>
                                <input type="password" class="input" >
                            </div>
                        </div>
                        <?php
                            if(isset($_GET['emailerr'])){
                        ?>
                                <strong style="color:#d63031;">Email déjà utilisé.</strong>
                        <?php
                        }
                        ?>
                        <input type="text" name="cin" value="<?php echo $_GET['phase2'] ?>" hidden>
                        <input type="submit" class="btn" name="login" value="Connexion">
                        <br> 
                    </form>
                </div>
        <?php
            }
        ?>
            </div>

    

    <script type="text/javascript" src="../../layout/js/login.js"></script>
</body>

</html>