<?php
include_once '../../../core/init.php';
include_once '../fonctions/tools.function.php';
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
        <?php include '../pages/headerDesktop.php' ?>
        <div class="container">
            <br>
            <div class="container rounded text-white" style="background-color: #393939; width: 70%">
                <br>
                <div class="account d-flex justify-content-center">
                    <div class="image img-cir img-120">
                        <img src="../../../img/profiles/<?php echo $imagepath ?>"/>
                    </div>
                </div> 
                    <br>
                    <?php
                        $info = getInfos($id);
                        ?>
                    <div class="row d-flex justify-content-center">
                        <div class="form-group">
                            <h4 class="text-white"><?php echo strtoupper($nom) . ' ' . $prenom ?></h4>
                        </div>
                    </div>
                    <div class="container">
                            
                    </div>
                    <br>
                </div>
            </div>
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
    </body>

    </html>
<?php
}
?>