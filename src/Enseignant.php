<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../layout/css/animation.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../layout/css/dashboard.css" rel="stylesheet">
    <title>Enseignants</title>
</head>

<style>
    .modal-header {
        background-color: #dcdde1;
    }
</style>

<body>
    <?php include 'header.php' ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        include 'DML_Commentator.php';
        DMLCommentator("enseignant");
        ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="titleH">Enseignants</h1>
        </div>
        <div class="container mt-3 mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active aff" aria-current="page">Enseignants</li>
                </ol>
            </nav>

            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-6">
                        <div>
                            <a class="btn btn-primary text-white" id="afficheRespo" name="afficheRespo" onclick="animation();">Afficher seulement les responsables
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 offset-md-4">
                        <a href="Enseignant.php"><button type="button" class="btn btn-primary">Afficher Tous</button></a>
                    </div> -->
                </div>
                
                    <!-- end confirmation de la suppression du responsable -->
                    <?php include 'Enseignant/afficheTableauEnseignants.php'; ?>
                </div>
            </div>

    </main>
    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../layout/js/animation.js"></script>
    <script type="text/javascript" src="../layout/js/enseignant.js"></script>
</body>

</html>