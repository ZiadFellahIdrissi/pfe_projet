<?php
include_once '../../../core/init.php';
$user = new User_Etudiant();
if (!$user->isLoggedIn()) {
    header('Location: ../../login/');
} else {
    $nom = $user->data()->nom;
    $prenom = $user->data()->prenom;
    $email = $user->data()->email;
    $id = $user->data()->id;
    $imagepath = $user->data()->imagepath;
?>
    <html lang="fr">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title Page-->
        <title>Messages</title>

        <!-- Fontfaces CSS-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">


        <!-- lib CSS-->
        <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
        <link href='../../../lib/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />
        <!-- Main CSS-->
        <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">
    </head>
    <style>
        #bold {
            font-weight: bold;
            text-align: center;

        }
    </style>

    <body>
        <?php include '../pages/header.php' ?>
        <section class="au-breadcrumb m-t-75">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Messages</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                        <div class="bg-overlay bg-overlay--blue"></div>
                        <h3>
                            <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                        <button class="au-btn-plus">
                            <i class="zmdi zmdi-plus"></i>
                        </button>
                    </div>
                    <div class="au-inbox-wrap js-inbox-wrap">
                        <div class="au-message js-list-load">
                            <div class="au-message__noti">
                                <p>You Have
                                    <span>2</span>

                                    new messages
                                </p>
                            </div>
                            <div class="au-message-list">
                                <div class="au-message__item unread">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap">
                                                <div class="avatar">
                                                    <img src="../../../img/profiles/avatar.svg" alt="John Smith">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Brahom Nassim</h5>
                                                <p>5arjty tamrin oula la</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>12 Min ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__item unread">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap online">
                                                <div class="avatar">
                                                    <img src="../../../img/profiles/avatar.svg" alt="Nicholas Martinez">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Mohamed Abghoure</h5>
                                                <p>Kahltiha jabty 5</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>11:00 PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__item">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap online">
                                                <div class="avatar">
                                                    <img src="../../../img/profiles/avatar.svg" alt="Michelle Sims">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Yhaya khalid</h5>
                                                <p>whaaache !! fk you</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>Yesterday</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__item">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap">
                                                <div class="avatar">
                                                    <img src="../../../img/profiles/avatar.svg" alt="Michelle Sims">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Hajar gouchgache</h5>
                                                <p>saluttttttttttttttttttttttt!</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>Sunday</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__item js-load-item">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap online">
                                                <div class="avatar">
                                                    <img src="../../../img/profiles/avatar.svg" alt="Michelle Sims">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Hajar gouchgache</h5>
                                                <p>saluttttttttttttttttttttttt!</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>Yesterday</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__item js-load-item">
                                    <div class="au-message__item-inner">
                                        <div class="au-message__item-text">
                                            <div class="avatar-wrap">
                                                <div class="avatar">
                                                    <img src="../../../img/profiles/avatar.svg" alt="Michelle Sims">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5 class="name">Hajar gouchgache</h5>
                                                <p>saluttttttttttttttttttttttt!</p>
                                            </div>
                                        </div>
                                        <div class="au-message__item-time">
                                            <span>Sunday</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <br><br>
        </div>


        <!-- Jquery JS-->
        <script src="../../../layout/js/jquery-3.4.1.min.js "></script>

        <!-- Bootstrap JS-->
        <script src="../../../layout/js/bootstrap.min.js "></script>

        <!-- lib JS   -->
        <script src="../../../lib/animsition/animsition.min.js "></script>
        <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../../lib/printThis/printThis.js"></script>

        <!-- Main JS-->
        <script src="../../../layout/js/main.js "></script>
        <script>

        </script>
    </body>

    </html>
<?php
}
?>
