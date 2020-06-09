<?php
    include '../../connection.php';
    include_once '../../../core/init.php';
    $user = new User_Admin();
    if (!$user->isLoggedIn()) {
        header('Location: ../pages/login.php');
    } else {
        $username =$user->data()->username;
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../../../layout/css/animation.css" rel="stylesheet" type="text/css" />
        <title>Modules</title>

        <!-- fonts -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">
        <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" media="all" />

        <!-- lib CSS-->
        <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
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
            <div class="main-content ">
                <?php include 'DML_Commentator.php'; ?>
                <div class="container  mb-3">
                    <nav aria-label="breadcrumb nov">
                        <ol class="breadcrumb nov">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Modules</li>
                        </ol>
                    </nav>
                    <div class="card">
                        <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="col-md-13">
                                    <select name="filiere" id="filiere" class="form-control">
                                        <option value=''>Choisissez une filière</option>
                                        <?php
                                            $sql = "SELECT id_filiere, nom_filiere
                                                    FROM Filiere";
                                            $resultat = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($resultat)) {
                                        ?>
                                                <option value='<?php echo $row["id_filiere"] ?>'><?php echo $row["nom_filiere"] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                </div>
                                <div class="col">
                                    <div class="semester float-left">
                                        <select name="semester" id="semester" class="form-control">
                                            <option value='1'>1er Semestre</option>
                                            <option value='2'>2ème Semestre</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                            <!-- <div class="col-md-4 offset-md-2">
                                <a href="./"><button type="button" class="btn btn-primary">Afficher Tous</button></a>
                            </div> -->
                        </div>
                        <div class="card-body modules">
                            <?php
                                // include 'afficheTableauModule.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../../../layout/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../../layout/js/bootstrap.min.js "></script>
        <script type="text/javascript" src="../../../lib/animsition/animsition.min.js "></script>
        <script type="text/javascript" src="../../../layout/js/main.js "></script>
        <!-- <script type="text/javascript" src="../../../layout/js/animation.js"></script> -->
        <script type="text/javascript" src="../../../layout/js/modules.js"></script>
        <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
    </body>

    </html>
<?php
}
?>