<?php
function load_managers()
{
    include 'connection.php';
    $sqlOptions = "SELECT `id_enseignant`,nom_enseignant,prenom_enseignant
    FROM enseignant
    WHERE `id_enseignant` not in ( SELECT responsable_id
                                    FROM filiere )";
    $resultat = mysqli_query($conn, $sqlOptions);
    $resultatcheck = mysqli_num_rows($resultat);
    if ($resultatcheck > 0) {
        while ($row = mysqli_fetch_assoc($resultat)) {
            $output .= '<option value="' . $row["id_enseignant"] . '"><strong>' . $row["nom_enseignant"] . ' ' . $row["prenom_enseignant"] . '</strong></option>';
        }
    }
    return $output;
}
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

<!-- Custom styles for this template -->

<body>
    <?php include 'header.php' ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <p class="h2">Filieres</p>
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

                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Filieres</li>
                        </ol>
                    </nav>
                    <!-- ================================================ajoute un filier================================================================================================ -->
                    <div class="col-6 col-md-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter un filiere</button>
                        <br>
                        <!-- ============================================================================================================================== -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <!-- =============================================== -->
                                        <form action="Filiere/ajoute_filiere.php" method="POST">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="Nom" class="col-form-label">Nom du filiere</label>
                                                        <input type="text" class="form-control" name="Nom" id="Nom" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Responsable">Responsable</label>
                                                <select name="Responsable" id="Responsable" class="form-control" required>
                                                    <?php echo load_managers(); ?>
                                                </select>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" id="ajouter" class="btn btn-primary" value="Ajouter" name="ajouter" required>
                                            </div>
                                        </form>
                                        <!-- =============================================== -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================================================================================== -->
                    </div>
                    <!-- ==============================fin ajoute un filier================================================================================== -->


                    <!-- ============================================modal pour la modification ============================================================================= -->
                    <div class="modal fade" id="modifierModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">

                                    <!-- =============================================== -->
                                    <form action="Filiere/modifier_filiere.php" method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Nom" class="col-form-label">Nom du filiere</label>
                                                    <input type="text" class="form-control" name="Nom" value="" id="Nom_modifier" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Responsable_modifier">Responsable</label>
                                            <select name="Responsable_modifier" id="Responsable_modifier" class="form-control">
                                                <option value="">
                                                    <strong>Choisir un nouveau Responsable</strong>
                                                </option>
                                                <?php
                                                include 'connection.php';
                                                $sqlOptions = "SELECT `id_enseignant`,nom_enseignant,prenom_enseignant
                                                                    FROM enseignant
                                                                    WHERE `id_enseignant` not in (SELECT responsable_id
                                                                                                FROM filiere )";
                                                $resultat = mysqli_query($conn, $sqlOptions);
                                                $resultatcheck = mysqli_num_rows($resultat);
                                                if ($resultatcheck > 0) {
                                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                                        echo '<option value="' . $row["id_enseignant"] . '">
                                                                    <strong>' . $row["nom_enseignant"] . ' ' . $row["prenom_enseignant"] . '</strong>
                                                            </option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="modal-footer">
                                            <input type="hidden" name="Modifier_inp" id="Modifier_inp" value="" />
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" id="Modifier" class="btn btn-primary" value="Modifier" name="Modifier">
                                        </div>
                                    </form>
                                    <!-- =============================================== -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================fin la modification============================================ -->



                    <!-- ============================================tableau de filieres============================================ -->
                    <br>
                    <p class="text-danger"><b> work in progress... </b></p>
                    <?php //include 'Filiere/AfficheTableauFiliere.php' ?>
                    <!-- ===================================fin tableau de filieres=================================== -->

                    <!-- ====================asking for permission Modal==================== -->
                    <div class="modal fade" id="confermationAle" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="Filiere/supprimer_filiere.php" method="POST">
                                    <div class="modal-body">
                                        <p style="color:#c0392b;">Tu va supprimier tout les etudiants dans cette filiers</p>
                                        <div class="container mb-3 mt-3 " id="affiche_etudiant">
                                            <!-- ici j'affichie les etudiant qui va supprimie
                                            si l'utilisateur suprimie un filiere -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="confirmation" id="confirmation" value="" />
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                        <button type="submit" class="btn btn-primary">Oui je confirme</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ====================end of asking for permission ==================== -->


                    <!-- =============hado les msg li kital3o 3La 9bale delet ou insert ou update=============== -->
                    <?php
                    $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos($fullurl, "inserting=failed")) {
                    ?>
                        <div class="alert alert-danger col-lg-4 col-lg-push-3 " style="text-align:center;">
                            ce <strong>Filiere</strong> deja existe.
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "filiere=inserted")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Filiere</strong> ajouté avec succes.
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "filiere=deleted")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Filiere</strong> supprimé avec succes.
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "filiere=updated")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Filiere </strong> modifié avec succes.
                        </div>
                    <?php
                    }
                    ?>
                    <!-- =================================================== -->
                    
                </div>
            </main>
        </div>
    </div>

    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
    <script>
         $('.mydatatable').DataTable();
    </script>
    <script>
            $(document).ready(function() {
                $(".open-confirmation").click(function() {
                    var filier_id = $(this).data('id');
                    $('#confirmation').val(filier_id);
                    $('#confermationAle').modal('show');
                    // pour affichie les etudiant qui va supprimie si il suprimie un filiere
                    $.ajax({
                        url: "Filiere/fetching_students.php",
                        method: "POST",
                        data: {
                            filier_id: filier_id
                        },
                        dataType: "text",
                        success: function(data) {
                            $('#affiche_etudiant').html(data);
                        }
                    });
                });
                $(".open_modifierModal").click(function() {
                    var id_filier_modifier = $(this).attr("id");
                    var nom_filier=$(this).data("id");
                      $('#Modifier_inp').val(id_filier_modifier);
                      $('#Nom_modifier').val(nom_filier);
                      $('#modifierModal').modal('show');
                });
            });
        </script>
</body>

</html>