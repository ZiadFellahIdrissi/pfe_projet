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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="titleH">Absences</h1>
            <!--                     <div class="btn-toolbar mb-2 mb-md-0">
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
        <!-- modification -->
        <div class="modal fade" id="modifierAbsences" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <form action="Absences/modifier_absences.php" method="POST">
                        <!-- le nom et le prenom-->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="le_nom_modifier" class="col-form-label">Nom </label>
                                        <input type="text" class="form-control" name="Nom" value="" id="le_nom_modifier" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="le_prenom_modifier" class="col-form-label">Prenom </label>
                                    <input type="text" class="form-control" name="prenom" value="" id="le_prenom_modifier" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="modul">Module</label>
                            <select name="module" id="modul" class="form-control">
                                <?php
                                    $sql = "SELECT id_module,intitule FROM module where id_filiere=" . $_GET['id_filiere'];
                                    $resultat = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                        <option value='<?php echo $row["id_module"] ?>'><?php echo $row["intitule"] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="date_modifier" class="col-form-label">Date</label>
                                    <input type="date" class="form-control" name="date" value="" id="date_modifier" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="nbHeurs_modifier" class="col-form-label">Nombre heures</label>
                                    <input type="text" class="form-control" name="nbHeurs" value="" id="nbHeurs_modifier" required>
                                </div>
                            </div>
                        </div>

                        <!-- modal footer -->
                        <div class="modal-footer">
                            <input type="hidden" id="abs_Id" name="abs_Id" value="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="ajouter">Modifier</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
        <!-- modification -->
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
                <div class="table-responsive-sm absences">
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
                                            <td><?php echo $row["nom"]." ".$row["prenom"]?></td>
                                            <td><?php echo $row["intitule"] ?></td>
                                            <td><?php echo $row["date_absence"] ?></td>
                                            <td><?php echo $row["h_absence"].' H' ?></td>
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
    </main>
    </div>
    </div>

    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../layout/js/animation.js"></script>
    <script>
        function getParam(id) {
            string = window.location.href;
            var url = new URL(string);
            return url.searchParams.get("idUrl" + id);
        }
        if (id = getParam("Filiere")) {
            $("#filiere").val(id);
            $(document).ready(function() {
                var id_filiere = $("#filiere").val();
                if (id_filiere) {
                    $.ajax({
                        url: "Absences/afficheTableauAbsencesParFiliere.php",
                        method: "GET",
                        data: {
                            id_filiere: id_filiere
                        },
                        dataType: "text",
                        success: function(data) {
                            $('.absences').html(data);
                        }
                    });
                }
            });
        }

        $('.mydatatable').DataTable();

        $(document).ready(function() {
            $('#filiere').change(function() {
                var id_filiere= $(this).val();
                $.ajax({
                    url: "Absences/afficheTableauAbsencesParFiliere.php",
                    method: "GET",
                    data: {
                        id_filiere: id_filiere
                    },
                    dataType: "text",
                    success: function(data) {
                        $('.absences').html(data);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.open_modifierAbsences', function() {
                var abs_id = $(this).attr("id");
                console.log(abs_id);
                $('#abs_Id').val(abs_id);
                $.ajax({
                    url: "Absences/fetching_absences_for_editing.php",
                    method: 'GET',
                    data: {
                        abs_id: abs_id,
                    },
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(data) {
                        $('#le_nom_modifier').val(data.nom);
                        $('#le_prenom_modifier').val(data.prenom);
                        $('#nbHeurs_modifier').val(data.h_absence);
                        $('#date_modifier').val(data.date_absence);
                        $('#modul').val(data.module);
                        $('#modifierAbsences').modal('show');
                        console.log(data.module);
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