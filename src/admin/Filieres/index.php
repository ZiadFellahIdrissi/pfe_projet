<?php
include '../../connection.php';
include_once '../../../core/init.php';
$user = new User_Admin();
if (!$user->isLoggedIn()) {
    header('Location: ../pages/login.php');
} else {
    $username = $user->data()->username;
    $nom = $user->data()->nom;
    $prenom = $user->data()->prenom;
    $email = $user->data()->email;
    $imagepath = $user->data()->imagepath;
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../../../layout/css/animation.css" rel="stylesheet" type="text/css" />
        <title>Filières</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">
        <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />

        <!-- lib CSS-->
        <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <!-- Main CSS-->
        <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">
    </head>
    <style>
        .modal-header {
            background-color: #dcdde1;
        }

        .modal-body {
            background: #f5f5f5;
        }

        .nov {
            background: #f5f5f5;
        }
    </style>

    <body class="">
        <div class="page-wrapper">
            <?php
            include '../pages/header.php';
            ?>
            <div class="main-content">
                <?php
                include 'DML_Commentator.php';
                ?>
                <div class="container mb-3">
                    <nav aria-label="breadcrumb nov ">
                        <ol class="breadcrumb nov ">
                            <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Filières</li>
                        </ol>
                    </nav>
                    <div class="modal-content">
                        <div class="modal-body">
                            <?php
                            include 'AfficheTableauFiliere.php';
                            ?>
                        </div>

                        <!-- MODAL INFORMATION FILL BY AJAX  -->
                        <div class="modal fade filiereInfo" tabindex="-1" role="dialog" aria-labelledby="filiereInfoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modalInfo">
                                        <!-- SPINNER -->
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border m-5" role="status" id="spinner">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <!-- END SPINNER -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../../../layout/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JS-->
        <script type="text/javascript" src="../../../layout/js/bootstrap.min.js "></script>
        <!-- lib JS   -->
        <script type="text/javascript" src="../../../lib/animsition/animsition.min.js "></script>
        <!-- Main JS-->
        <script type="text/javascript" src="../../../layout/js/main.js "></script>
        <script type="text/javascript" src="../../../layout/js/animation.js"></script>
        <script type="text/javascript" src="../../../layout/js/admin/filieres.js"></script>
        <script>
            $('.mydatatable').DataTable();
            $('.mydatatable2').DataTable();
        </script>
        <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
    </body>

    </html>
<?php
}
?>