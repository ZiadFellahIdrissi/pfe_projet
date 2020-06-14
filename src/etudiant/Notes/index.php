<?php
include_once '../../../core/init.php';
$user = new User_Etudiant();
$db = DB::getInstance();
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
        <title>Dashboard</title>

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
                <nav aria-label="breadcrumb nov">
                    <ol class="breadcrumb nov">
                        <li class="breadcrumb-item"><a href="../pages">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Notes et resultats</li>
                    </ol>
                </nav>
            </div>
        </section><br>
        
        <!-- relvet de notes -->
        <div class="section__content section__content--p30">
            <?php include 'notesResultat.php' ?>
        </div>
        <br><br>

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
            $(document).ready(function() {
                $(".imprimer").click(function() {
                    // alert("ziad");
                    $('.notes').printThis({
                        debug: false,
                        importCSS: true,
                        importStyle: true,
                        printContainer: true,
                        loadCSS: '',
                        pageTitle: "Relvet des notes",
                        removeInline: false,
                        removeInlineSelector: "*",
                        printDelay: 333,
                        canvas: false,
                        header: "<h1>Relvet des notes</h1>",
                        footer: null, // postfix to html
                        base: false, // preserve the BASE tag or accept a string for the 
                        doctypeString: '<!DOCTYPE html>',
                        removeScripts: false,
                        copyTagClasses: false
                    });
                });
            });
        </script>
    </body>

    </html>
<?php
}
?>