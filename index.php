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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <title>Welcome</title>
    </head>

    <body>
        <header id="banner">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="#">Our Logo</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Documents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item text-nowrap ">
                            <a class="Mybutton special " href="./src/admin/pages/login.php">Admin</a>
                        </li>
                        <li class="nav-item text-nowrap ">
                            <a class=" Mybutton special" href="./src/login">Connexion</a>
                        </li>

                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="header-content">
                    <div class="row">
                        <div class="col-lg-7" style="text-align: center;">
                            <div style="margin-top: 140px;"></div>
                            <h1>Nouveau ici?</h1>
                            <p id="font">Si vous êtes nouveau ici et vous faites partie de ce faculté,<br> veuillez activer votre compte via ce button ci-dessous</p>
                            <p><a class="Mybutton" href="src/signup/whoAreYou.php" role="button" title="Activer votre compte">Activier Compte</a></p>
                            <div class="go-about"></div>
                        </div>
                        <div class="col-lg-5">
                            <div style="margin-top: 180px;"></div>
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
                    <h2>Projet de fin d'étude</h2>
                    <p>Gere par les etudiants de licence fondamentale SMI6 </p>
                </header>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div>
                            <section class="box">
                                <!-- <i class="icon big rounded color9 fa-desktop"></i> -->
                                <h3>Bienvenu</h3>
                                <p>
                                    L'FCC est un espace numérique de travail conçu pour répondre aux besoins spécifiques des membres de la communauté de l'Université Hassan II de Casablanca. C'est un espace sécurisé accessible depuis tout ordinateur connecté à Internet (chez soi, dans une
                                    salle équipée de l'Université, etc.). Chaque utilisateur dispose d'un compte qui, à partir d'une seule identification, ouvre sur un ensemble d'applications et services adaptés au profil et aux fonctions de chacun.
                                </p>
                            </section>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div>
                            <section class="box">
                                <h3>Connexion</h3>
                                <p>La connexion s'effectue à l'aide de comptesFCC Pour se connecter, utiliser le bouton "Connexion", en haut à droite de l'écran. Pour des questions de sécurité, il est conseillé de se déconnecter en fin de séance de travail en cliquant
                                    sur le bouton "Déconnexion" (situé également en haut à droite dans l'environnement de travail) puis de fermer toutes ses fenêtres de navigateur.</p>
                            </section>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div>
                            <section class="box">
                                <!-- <i class="icon big rounded color6 fa-rocket"></i> -->
                                <h3>Attention</h3>
                                <p>Pour les nouveaux personnels et étudiants, la connexion est possible uniquement après avoir suivi la procédure d'activation de son compte : comptesFCC. Cette procédure s'effectue :</p>
                                <p style="text-align: left;"><b>Après</b> inscription administrative pour les étudiants, qui doivent être en possession de leur carte d'étudiant.
                                    <br><b>Après</b> obtention de leurs codes d'accès pour les personnels selon la procédure administrative.</p>
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
                <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez nous</h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto mb-5">Avez-vous des questions? N'hésitez pas à nous contacter directement. Notre équipe reviendra vers vous en quelques heures pour vous aider.</p>

                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-8 mb-md-0 mb-1 ">
                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form mb-4">
                                        <input type="text" id="name" name="name" placeholder="Votre nom" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="md-form mb-4">
                                        <input type="text" id="email" name="email" placeholder="Votre  email" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-4">
                                        <input type="text" id="subject" name="subject" placeholder="Subject" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="5" placeholder="Your message" class="form-control md-textarea"></textarea>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div class="text-center text-md-left">
                            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                        </div>
                        <div class="status"></div>
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
                        <ul class="copyright">
                            <li>&copy; All rights reserved.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <script type="text/javascript" src="./layout/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="./layout/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./layout/js/index.js"></script>
    </body>

    </html>
<?php
} ?>