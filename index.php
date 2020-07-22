<?php
include_once './core/init.php';
$User_Prof = new User_Prof();
if ($User_Prof->isLoggedIn()) {
    if ($User_Prof->data()->role == "responsable")
        header("Location: ./src/responsable/");
    else
        header("Location: ./src/prof/");
} else
    $User_Etudiant = new User_Etudiant();
if ($User_Etudiant->isLoggedIn()) {
    header("Location: ./src/etudiant/");
} else
    $userAdmin = new User_Admin();
if ($userAdmin->isLoggedIn()) {
    header("Location: ./src/admin/");
} else {

?>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#563d7c">
        <link href="./layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="./layout/css/index.css" rel="stylesheet" type="text/css" />
        <link href="./layout/css/womanIndex.css" rel="stylesheet" type="text/css" />
        <link href="./lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nixie+One&display=swap" rel="stylesheet">
        <title>Formations Continue de Casablanca</title>
    </head>
    <style>
        #myBtn {
          display: none;
          position: fixed;
          bottom: 20px;
          right: 30px;
          z-index: 99;
          font-size: 18px;
          border: none;
          outline: none;
          background-color: #1881f2;
          color: white;
          cursor: pointer;
          padding: 15px;
          border-radius: 20px;
        }

        #myBtn:hover {
          background-color: #18a6f2;
        }
    </style>

    <body>
        <header id="banner">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="./">
                    <span class="font-weight-bold my-4" style="font-size: 40px;">FCC</span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Acceuil<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#one">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#three">Contactez nous</a>
                        </li>
                        <li class="nav-item text-nowrap ">
                            <a class="font-weight-bold btn" style="width: 110%" aria-pressed="true" href="./src/login">CONNEXION</a>
                        </li>

                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="header-content">
                    <div class="row">
                        <div class="col-lg-7" style="text-align: left;">
                            <div style="margin-top: 120px;"></div>
                            <h1 class="h1-responsive font-weight-bold text-white my-4" style="font-family: 'Righteous', cursive;">Nouveau ici?</h1>
                            <span id="font" class="font-weight-bold">Si vous êtes nouveau ici et vous faites partie de ce faculté,
                            <br>
                            Veuillez activer votre compte via ce button ci-dessous.</p>
                            </span>
                            <br>
                            <a class="btn font-weight-bold" href="src/signup/whoAreYou.php" role="button" aria-pressed="true" style="width: 50%">ACTIVER VOTRE COMPTE</a>
                        </div>

                        <div class="col-lg-5">
                            <div style="margin-top: 160px;"></div>
                            <?php
                            include './img/index/teacher.svg';
                            ?>
                        </div>
                        </div>
                </div>
            </div>
        </header>
        <section id="one" class="wrapper style1 special">
            <div class="container">
                <header class="major">
                    <h2 class="h1-responsive font-weight-bold text-center my-4" style="font-family: 'Montserrat', sans-serif;">Projet de fin d'étude</h2>
                    <p class="font-weight-bold" style="font-family: 'Montserrat', sans-serif;">Gérer par les etudiants de licence fondamentale SMI6.</p>
                </header>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div>
                            <section class="box">
                                <!-- <i class="icon big rounded color9 fa-desktop"></i> -->
                                <h3 style="font-family: 'Nixie One', cursive;">Bienvenue</h3>
                                <p style="text-align: left;">
                                    L'FCC est un espace numérique de travail conçu pour répondre aux besoins spécifiques des membres de la communauté de l'Université Hassan II de Casablanca. C'est un espace sécurisé accessible depuis tout ordinateur connecté à Internet (chez soi, dans une
                                    salle équipée de l'Université, etc.).
                                    <br>
                                    Chaque utilisateur dispose d'un compte qui, à partir d'une seule identification, ouvre sur un ensemble d'applications et services adaptés au profil et aux fonctions de chacun.
                                </p>
                            </section>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div>
                            <section class="box">
                                <h3 style="font-family: 'Nixie One', cursive;">Connexion</h3>
                                <p style="text-align: left;">
                                    La connexion s'effectue à l'aide de comptesFCC.
                                    <br>
                                    Pour se connecter, utiliser le bouton "Connexion", en haut à droite de la page.
                                    <br>
                                    Pour maximiser la sécurité de soi, il est conseillé de se déconnecter en fin de session de travail en cliquant sur le bouton "Déconnexion" (situé également en haut à droite dans l'espace de travail) puis de fermer toutes ses fenêtres de navigateur.
                            </p>
                            </section>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div>
                            <section class="box">
                                <!-- <i class="icon big rounded color6 fa-rocket"></i> -->
                                <h3 style="font-family: 'Nixie One', cursive;">Attention</h3>
                                <p style="text-align: left;">
                                    Pour les nouveaux personnels et étudiants, la connexion est possible uniquement après avoir suivi la procédure d'activation du compte : comptesFCC. Cette procédure s'effectue uniquement:
                                    <br>
                                    <b>-</b> Après l'inscription administrative pour les étudiants, qui doivent être en possession de leur carte d'étudiant.
                                    <br>
                                    <b>-</b> Après obtention de leurs codes d'accès pour les personnels selon la procédure administrative.
                                </p>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Three -->
        <section id="three" class="wrapper style3 special">
            <section class="mb-3 container">

                <!--Section heading-->
                <h2 class="h1-responsive font-weight-bold text-center my-4" style="font-family: 'Montserrat', sans-serif;">Contactez nous</h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto mb-5 font-weight-bold" style="font-family: 'Montserrat', sans-serif;">Avez-vous des questions? N'hésitez pas à nous contacter directement. Notre équipe reviendra vers vous en quelques heures pour vous aider.</p>

                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-8 mb-md-0 mb-1 ">
                        <form id="contact-form" name="contact-form" method="POST">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form mb-4">
                                        <input type="text" id="name" name="name" placeholder="Votre nom" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="md-form mb-4">
                                        <input type="text" id="email" name="email" placeholder="Votre  email" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-4">
                                        <input type="text" id="subject" name="subject" placeholder="Subject" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="5" placeholder="Your message" class="form-control md-textarea" required></textarea>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div class="text-center text-md-left">
                            <button class="btn text-white" role="button" aria-pressed="true">ENVOYER</button>
                        </div>
                    </div>

                    <div class="col-md-3 text-center">
                        <ul class="list-unstyled mb-0">
                            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                <p>Casablanca route el jadida </p>
                            </li>

                            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                <p>+212693986210</p>
                            </li>

                            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                <p>contact@FCC.MA</p>
                            </li>
                        </ul>
                    </div>

                </div>
            </section>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div>
                        <ul class="copyright font-weight-bold">
                            <li style="font-family: 'Montserrat', sans-serif;">&copy; All rights reserved.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <button onclick="topFunction()" id="myBtn" title="Retourner au top">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </button>

        <script>
            var mybutton = document.getElementById("myBtn");

            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
              } else {
                mybutton.style.display = "none";
              }
            }

            function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
            }
        </script>

        <script type="text/javascript" src="./layout/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="./layout/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./layout/js/index.js"></script>
    </body>

    </html>
<?php
} ?>