<?php
include 'connectionDB.php';
function load_managers()
{
    include 'connectionDB.php';
    $sqlOptions = "SELECT `id_enseignant`,nom_enseignant,prenom_enseignant
    FROM enseignant
    WHERE `id_enseignant` not in (SELECT responsable_id
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
    <link href="./layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <title>test</title>
    <!-- rahe deja telechargiite bootstarp 5aliw dakchi f blasto ou rahe i5dame likom -->
</head>

<body>
    <!--hadi container jam3a kooooooooolckii-->
    <div class="container mt-3 mb-3" style="width:100%;">

        <!-- bloc de menu -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="./index_filiere.php" aria-selected="true"><b>Filiere</b></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="./Enseignant/index_enseignant.php" aria-selected="false"><b>Enseignant</b></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="./index_etudiant.php" aria-selected="false"><b>Etudiant</b></a>
            </li>
        </ul>
        <!-- end bloc de menu -->


        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                <div class="container mt-3 mb-3">

                    <!-- ================================================ajoute un filier================================================================================================ -->
                    <div class="col-6 col-md-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajoute un filiere</button>
                        <br>
                        <!-- ============================================================================================================================== -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <!-- =============================================== -->
                                        <form action="ajoute_filiere.php" method="POST">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="Nom" class="col-form-label">Nom du filiere</label>
                                                        <input type="text" class="form-control" name="Nom" id="Nom">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Responsable">Responsable</label>
                                                <select name="Responsable" id="Responsable" class="form-control">
                                                    <?php echo load_managers(); ?>
                                                </select>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" id="ajouter" class="btn btn-primary" value="Ajouter" name="ajouter">
                                            </div>
                                        </form>
                                        <!-- =============================================== -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================================================================================== -->
                    </div>
                    <!-- =================================================fin ajoute un filier======================================================================================== -->


                    <!-- ============================================modal pour la modification ============================================================================= -->
                    <div class="modal fade" id="modifierModal" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">

                                    <!-- =============================================== -->
                                    <form action="modifier_filiere.php" method="POST">
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
                                                        <strong>choise un nouveau responsable</strong>
                                                    </option>
                                                <?php
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
                    <?php
                    include 'connectionDB.php';
                    echo '<table class="table table-bordered table-striped">';
                    echo '<thead>';
                    echo "<tr>
                                <th>nom du filiere</th>
                                <th>responsable</th>
                                <th>supprimer</th>
                                <th>Modifier</th>
                            </tr>";
                    echo '</thead>';
                    $sqlQuery = "SELECT id_filiere,id_enseignant, nom_filiere,nom_enseignant,prenom_enseignant 
                            FROM filiere JOIN enseignant on enseignant.id_enseignant = filiere.responsable_id";

                    $resultatOfQuery = mysqli_query($conn, $sqlQuery);
                    $resultatcheck = mysqli_num_rows($resultatOfQuery);

                    if ($resultatcheck > 0) {
                        while ($row = mysqli_fetch_assoc($resultatOfQuery)) {
                    ?>
                            <tr>
                                <td><?php echo $row["nom_filiere"] ?></td>
                                <td><?php echo $row["nom_enseignant"] . ' ' . $row["prenom_enseignant"] ?></td>
                                <th>
                                    <?php
                                    $sql1 = " SELECT * FROM etudiant
                                                  WHERE id_filiere = '" . $row["id_filiere"] . "'";
                                    $resultat = mysqli_query($conn, $sql1);
                                    $check = mysqli_num_rows($resultat);
                                    if ($check > 0) {
                                    ?>
                                        <img data-id="<?php echo $row["id_filiere"] ?>" style="cursor:pointer;" width=20 heigth=20 src="https://bit.ly/2UwQb08" class="open-confirmation" data-toggle="modal">
                                    <?php
                                    } else {
                                    ?>
                                        <a href="supprimer_filiere.php?id=<?php echo $row["id_filiere"] ?>">
                                            <img width=20 heigth=20 src="https://bit.ly/2UwQb08">
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </th>
                                <td>
                                    <input type="button" data-id="<?php echo $row["nom_filiere"] ?>" id="<?php echo $row["id_filiere"] ?>" value="Modifie" class="btn btn-info btn-xs open_modifierModal">
                                </td>
                            </tr>
                    <?php
                        }
                        echo "</table>";
                    } else
                        echo "non data to show";
                    ?>
                    <!-- ===================================fin tableau de filieres=================================== -->

                    <!-- ====================asking for permission Modal==================== -->
                    <div class="modal fade" id="confermationAle" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="supprimer_filiere.php" method="POST">
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
                            <strong>Invalid</strong> filier deja exist
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "filiere=inserted")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Filiere</strong> ajouté avec succes;
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "filiere=deleted")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Filiere</strong> supprimé avec succes ;
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "filiere=updated")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Filiere </strong> modifié avec succes;
                        </div>
                    <?php
                    }
                    ?>
                    <!-- ============================================================================================== -->
                </div>
            </div>
        </div>

        <script type="text/javascript" src="./layout/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="./layout/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".open-confirmation").click(function() {
                    var filier_id = $(this).data('id');
                    $('#confirmation').val(filier_id);
                    $('#confermationAle').modal('show');
                    // pour affichie les etudiant qui va supprimie si il suprimie un filiere
                    $.ajax({
                        url: "fetching_students.php",
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