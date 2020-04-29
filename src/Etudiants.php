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

    <title>test5</title>
</head>

<style>
    .modal-header {
        background-color: #dcdde1;
    }
</style>

<body>
    <?php include 'header.php' ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="titleH">Etudiants</h1>
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
                        <select name="filiere" id="filiere" class="form-control">
                            <option value=''>Choisir un filière</option>
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
                        <a href="Etudiants.php"><button type="button" class="btn btn-primary">Afficher Tous</button></a>
                    </div>
                </div>
                <?php include 'Etudiant/afficheTableauEtudiants.php'; ?>
            </div>
            <br><br>

            <?php
                include 'DML_Commentator.php';
                DMLCommentator("etudiant");
            ?>
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
                        url: "Etudiant/afficheEtudiantsParFiliere.php",
                        method: "GET",
                        data: {
                            id_filiere: id_filiere
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
            $('#filiere').change(function() {
                var id_filiere = $(this).val();

                if (id_filiere) {
                    $.ajax({
                        url: "Etudiant/afficheEtudiantsParFiliere.php",
                        method: "GET",
                        data: {
                            id_filiere: id_filiere
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
                        $('#cin_modifier').val(data.cne);
                        $('#date_modifier').val(data.date_naissance);
                        $('#email_modifier').val(data.email);
                        $('#fil').val(data.id_filiere);
                        $('#modifierUnEtudiant').modal('show');
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