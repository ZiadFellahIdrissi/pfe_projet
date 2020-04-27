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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../layout/css/dashboard.css" rel="stylesheet">
    <title>test5</title>
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
                    <p class="h2">Etudiants</p>
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
                            <li class="breadcrumb-item active" aria-current="page">Etudiants</li>
                        </ol>
                    </nav>
                    <div class="modal-content">
                        <div class="modal-header">

                            <div class="col-md-6">
                                <span class="font-weight-light text-nowrap lead">Choisir un groupe: </span>
                                <select name="groupe" id="groupe">
                                    <option value=""></option>
                                    <?php
                                        $sql = "SELECT id_groupe,groupe_nom FROM groupe";
                                        $resultat = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($resultat)) {
                                    ?>
                                            <option value='<?php echo $row["id_groupe"] ?>'><?php echo $row["groupe_nom"] ?></option>
                                    <?php
                                        }
                                    ?> 
                                </select>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <a href="Etudiants.php"><button type="button" class="btn btn-primary">Afficher Tous</button></a>
                            </div>
                        </div>

                        <div class="modal-body etudiants">
                            <div class="table-responsive-sm">
                                <?php
                                $sql = 'SELECT cen, code_apoge,date_naissance,email,nom,prenom,id_groupe
                                            FROM etudiant';

                                $resultat = mysqli_query($conn, $sql);
                                $resultatcheck = mysqli_num_rows($resultat);
                                if ($resultatcheck > 0) {
                                ?>
                                    <table class="table table-bordered table-striped mydatatable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Code Apoge</th>
                                                <th>Cin</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Date Naissance</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            while ($row = mysqli_fetch_assoc($resultat)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row["code_apoge"] ?></t>
                                                    <td><?php echo $row["cen"] ?></td>
                                                    <td><?php echo $row["nom"] ?></td>
                                                    <td><?php echo $row["prenom"] ?></td>
                                                    <td><?php echo $row["date_naissance"] ?></td>
                                                    <td><?php echo $row["email"] ?></td>
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
                    $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos($fullurl, "insert=failed")) {
                    ?>
                        <div class="alert alert-danger col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Invalid</strong> code apogee ou Cin!
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "etudiant=inserted")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Etudiant</strong> ajouté avec succes :)
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "etudiant=deleted")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Etudiant</strong> supprimé avec succes :)
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "etudiant=updated")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Etudiant</strong> modifié avec succes :)
                        </div>
                    <?php
                    }
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
    <script>
        function getParam(id){
            string = window.location.href;
            var url = new URL(string);
            return url.searchParams.get("idUrl"+id);
        }
        if(id=getParam("Groupe")){
            $("#groupe").val(id);
            $(document).ready(function() {
                    var id_groupe = $("#groupe").val();
                    if(id_groupe){
                        $.ajax({
                            url: "Etudiant/afficheEtudiantsParGroup.php",
                            method: "GET",
                            data: {
                                id_groupe: id_groupe
                            },
                            dataType: "text",
                            success: function(data) {
                                $('.etudiants').html(data);
                            }
                        });
                    }
            });
        }

        $('.mydatatable').DataTable();

        $(document).ready(function() {
            $('#groupe').change(function() {
                var id_groupe = $(this).val();

                if(id_groupe){
                    $.ajax({
                        url: "Etudiant/afficheEtudiantsParGroup.php",
                        method: "GET",
                        data: {
                            id_groupe: id_groupe
                        },
                        dataType: "text",
                        success: function(data) {
                            $('.etudiants').html(data);
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.Open_modifierUnEtudiant', function() {
                var code = $(this).attr("id");
                $('#codeapoger').val(code);
                $.ajax({
                    url: "Etudiant/fetching_students_for_editing.php",
                    method: 'GET',
                    data: {
                        code: code
                    },
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(data) {
                        $('#le_nom_modifier').val(data.nom);
                        $('#le_prenom_modifier').val(data.prenom);
                        $('#codeapoge_modifier').val(data.code_apoge);
                        $('#cin_modifier').val(data.cen);
                        $('#date_modifier').val(data.date_naissance);
                        $('#email_modifier').val(data.email);
                        $('#grou').val(data.id_groupe);
                        $('#modifierUnEtudiant').modal('show');
                        console.log(data.id_groupe);
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