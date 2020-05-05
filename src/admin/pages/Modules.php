<?php
include '../../connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../../layout/css/animation.css" rel="stylesheet" type="text/css" />
    <title>Enseignant</title>

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
        <?php include './header.php' ?>
        <div class="main-content ">
            <?php include '../../DML_Commentator.php';
            DMLCommentator('module');
            ?>
            <div class="container  mb-3">
                <nav aria-label="breadcrumb nov">
                    <ol class="breadcrumb nov">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Modules</li>
                    </ol>
                </nav>
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-6">
                            <select name="filiere" id="filiere" class="form-control">
                                <option value=''>Choisir un filiere</option>
                                <?php
                                $sql = "SELECT id_filiere, nom_filiere
                                            FROM filiere";
                                $resultat = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                    <option value='<?php echo $row["id_filiere"] ?>'><?php echo $row["nom_filiere"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 offset-md-4">
                            <a href="Modules.php"><button type="button" class="btn btn-primary">Afficher Tous</button></a>
                        </div>
                    </div>
                    <?php include '../Modules/affichieTableauModule.php' ?>
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
    <script type="text/javascript" src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Main JS-->
    <script type="text/javascript" src="../../../layout/js/main.js "></script>
    <!-- <script type="text/javascript" src="../../../layout/js/animation.js"></script> -->
    <script type="text/javascript" src="../../../layout/js/module.js"></script>
    <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
</body>
    
</html>