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
        .header-desktop2{
            left:0px;
        }
    </style>

    <body>
        <?php include '../pages/headerDesktop.php' ?>
        <div class="container" style="margin-top: 5.5%; margin-left:2.5%">
            <br>
            <div class="container rounded text-white" style="background-color: #2f3542; width: 70%">
                <br>
                <div class="row" style="margin-top: 18px">
                    <div class="col col-sm-3" style="padding: 0px 0px">
                        <div class="form-group d-flex justify-content-center">
                            <div class="image img-cir img-120">
                                <img src="../../../img/profiles/<?php echo $imagepath; ?>" />
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <h4 class="text text-white" style="text-align: center"><?php echo '<b>' . strtoupper($nom) . ' ' . $prenom . '</b>' ?></h4>
                        </div>
                    </div>
                    <br>
                    <?php
                        $info = getInfos($id);
                    ?>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    Cne: <?php echo '<b>'.$info->cne.'</b>'; ?>
                                </div>
                            </div>
                            <div class="col ">
                                <div class="form-group float-left">
                                    Cin: <?php echo '<b>'.$id.'</b>'; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    Date Naissance: <?php echo '<b>'.$info->date_naissance.'</b>'; ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    Telephone: <?php echo '<b>'.$info->telephone.'</b>'; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            Email: <?php echo '<b>'.$info->email.'</b>'; ?>
                        </div>
                                
                        <div class="form-group">
                            Filière: <?php echo '<b>'.$info->nom_filiere.'</b>'; ?>
                        </div>
                        
                    </div>
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