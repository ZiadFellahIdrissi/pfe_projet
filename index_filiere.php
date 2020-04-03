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
                <a class="nav-link " href="./index_etudiant.php" aria-selected="false"><b>Etudiant</b></a>
            </li>
        </ul>
        <!-- end bloc de menu -->

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                <div class="container mt-3 mb-3">

                    <!-- =========================================================================================================================================================================== -->
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
                    <!-- =========================================================================================================================================================================== -->

                    <br>
                    <?php
                    include 'connectionDB.php';
                    echo '<table class="table table-bordered table-striped">';
                    echo "<tr>
                                <th>nom du filiere</th>
                                <th>responsable</th>
                                <th>supprimer</th>
                                <th>Modifier</th>
                            </tr>";


                    $sqlQuery = "SELECT id_filiere, nom_filiere,nom_enseignant,prenom_enseignant 
                            FROM filiere JOIN enseignant on enseignant.id_enseignant = filiere.responsable_id";

                    $resultatOfQuery = mysqli_query($conn, $sqlQuery);
                    $resultatcheck = mysqli_num_rows($resultatOfQuery);

                    if ($resultatcheck > 0) {
                        while ($row = mysqli_fetch_assoc($resultatOfQuery)) {
                    ?>
                            <tr>
                                <td><?php echo $row["nom_filiere"] ?></td>
                                <td><?php echo $row["nom_enseignant"].' '.$row["prenom_enseignant"] ?></td>
                                <th >
                                    <img data-id="<?php echo $row["id_filiere"] ?>" style="cursor:pointer;" width=20 heigth=20 src="https://bit.ly/2UwQb08" class="open-confirmation" data-toggle="modal">
                                </th>
                                <td>
                                    <input type="button" value="Modifie" class="btn btn-info btn-xs">
                                </td>
                            </tr>
                    <?php
                        }
                        echo "</table>";
                    } else
                        echo "non data to show";
                    ?>
                    <!-- asking for permission Modal -->
                    <div class="modal fade" id="confermationAle" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="supprimer_filiere.php" method="POST">
                                    <div class="modal-body">
                                        Tu va supprimier tout les etudiant dans cette filier<br><br>
            
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
        $(document).ready(function () {
            $(".open-confirmation").click(function () {
                $('#confirmation').val($(this).data('id'));
                $('#confermationAle').modal('show');
                console.log($(this).data('id'));
            });
        });
    </script>

</body>



</html>