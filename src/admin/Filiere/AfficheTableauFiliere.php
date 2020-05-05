<div class="table-responsive-sm">
    <?php
    include '../../connection.php';
    $sqlQuery = "SELECT id_filiere,id_enseignant, nom_filiere,nom_enseignant,prenom_enseignant 
            FROM filiere JOIN enseignant on enseignant.id_enseignant = filiere.responsable_id";

    $resultatOfQuery = mysqli_query($conn, $sqlQuery);
    $resultatcheck = mysqli_num_rows($resultatOfQuery);

    if ($resultatcheck > 0) {
    ?>
        <table class="table table-bordered table-striped mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>Nom du filiere</th>
                    <th>Responsable</th>
                    <th >Options</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($resultatOfQuery)) {
            ?>
                <tr>
                    <td><?php echo $row["nom_filiere"] ?></td>
                    <td><?php echo $row["nom_enseignant"] . ' ' . $row["prenom_enseignant"] ?></td>
                    <td>
                        <div class="table-data-feature">
                            <?php
                            $sql1 = " SELECT * FROM etudiant
                                      WHERE id_filiere = '" . $row["id_filiere"] . "'";
                            $resultat = mysqli_query($conn, $sql1);
                            $check = mysqli_num_rows($resultat);
                            if ($check > 0) {
                            ?>
                                <button data-id="<?php echo $row["id_filiere"] ?>" style="cursor:pointer;" class="item open-confirmation" data-toggle="modal" data-toggle="tooltip" title="Supprimer">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            <?php
                            } else {
                            ?>
                                <a class="item" href="../Filiere/supprimer_filiere.php?id=<?php echo $row["id_filiere"] ?>" title="Supprimer">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                            <?php
                            }
                            ?>
                            <button data-id="<?php echo $row["nom_filiere"] ?>" id="<?php echo $row["id_filiere"] ?>" data-toggle="tooltip" class="item open_modifierModal" title="Modifier">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                        </div>
                    </td>
                </tr>
        <?php
            }
            echo "</tbody>";
            echo "</table>";
        }
        ?>
</div>