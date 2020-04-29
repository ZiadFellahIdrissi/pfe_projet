<?php
include 'connection.php';
?>
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
    <title>Absences</title>
</head>

<style>
    .modal-header {
        background-color: #dcdde1;
    }
</style>


<body>
    <?php include "header.php" ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php include 'DML_Commentator.php';
        DMLCommentator("absence");
        ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="titleH">Absences</h1>
        </div>
        <div class="container mt-3 mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="Absences.php">Absences</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Consulter Absences</li>
                </ol>
            </nav>
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-6">
                        <select name="filiere" id="filiere" class="form-control">
                            <option value=''>Choisir un filiere</option>
                            <?php
                            $sql = "SELECT id_filiere,nom_filiere FROM filiere";
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
                        <a href="consulter_absences.php"><button type="button" class="btn btn-primary">Afficher Tous</button></a>
                    </div>
                </div>
                <div class="modal-body absences">
                    <div class="table-responsive-sm">
                        <?php
                        $sql = 'SELECT nom,prenom,intitule,date_absence,h_absence
                                FROM etudiant 
                                join absence on etudiant.code_apoge=absence.id_etudiant
                                join module on absence.id_module=module.id_module';

                        $resultat = mysqli_query($conn, $sql);
                        $resultatcheck = mysqli_num_rows($resultat);
                        if ($resultatcheck > 0) {
                        ?>
                            <table class="table table-bordered table-striped mydatatable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Etudiant</th>
                                        <th>Module</th>
                                        <th>Date</th>
                                        <th>Nombre heures</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["nom"] . " " . $row["prenom"] ?></td>
                                            <td><?php echo $row["intitule"] ?></td>
                                            <td><?php echo $row["date_absence"] ?></td>
                                            <td><?php echo $row["h_absence"] . ' H' ?></td>
                                        </tr>
                                <?php
                                    }
                                    echo "<tbody>";
                                    echo "</table>";
                                }
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../layout/js/animation.js"></script>
    <script type="text/javascript" src="../layout/js/consulte_absence.js"></script>
</body>

</html>