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
    <title>Modules</title>
</head>

<style>
    .modal-header {
        background-color: #dcdde1;
    }
</style>

<!-- Custom styles for this template -->

<body>
    <?php include 'header.php' ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="titleH">Modules</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">hiiii</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">hiiii</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            for now
                        </button>
                    </div> -->
        </div>

        <div class="container mt-3 mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
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

                <div class="modal-body modules">
                    <div class="table-responsive-sm">
                        <?php
                        $sql = "SELECT *
                                        FROM module
                                        JOIN enseignant ON module.id_enseignant = enseignant.id_enseignant
                                        JOIN filiere ON module.id_filiere = filiere.id_filiere";
                        $resultat = mysqli_query($conn, $sql);
                        $resultatcheck = mysqli_num_rows($resultat);
                        if ($resultatcheck > 0) {
                        ?>
                            <table class="table table-bordered table-striped mydatatable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nom du Module</th>
                                        <th>Enseignant</th>
                                        <th>Heures</th>
                                        <th>Filière</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["intitule"] ?></t>
                                            <td><?php echo $row["prenom_enseignant"] . ' ' . $row["nom_enseignant"] ?></td>
                                            <td><?php echo $row["horaire"] ?></td>
                                            <td><?php echo $row["nom_filiere"] ?></td>
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
            <br><br>
            <!-- ==================================================================== -->
            <!-- hadi dhiya les msgs li kital3o dyal ajoute supprimie ou modifier -->
            <?php
                include 'DML_Commentator.php';
                DMLCommentator("module");
            ?>
            <!-- ==================================================================== -->
            <!-- ==================================================================== -->
        </div>
    </main>
    </div>
    </div>

    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../layout/js/animation.js"></script>
    <script type="text/javascript" src="../layout/js/module.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.Open_modifierUnModule', function() {
                var code = $(this).attr("id");
                $.ajax({
                    url: "Modules/fetch_module_infos.php",
                    method: 'GET',
                    data: {
                        code: code
                    },
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(data) {
                        $('#id_module2').val(data.id_module);
                        $('#le_nom2').val(data.intitule);
                        $('#Heures2').val(data.horaire);
                        $('#Enseignant2').val(data.id_enseignant);
                        $('#modifierUnModule').modal('show');
                    },
                    error: function() {
                        alert('failure');
                    }
                });

            });
        });
    </script>

</body>

</html>