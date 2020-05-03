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
                    <th>nom du filiere</th>
                    <th>responsable</th>
                    <th>supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
            <?php
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
                            <a href="../Filiere/supprimer_filiere.php?id=<?php echo $row["id_filiere"] ?>">
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
            echo "</tbody>";
            echo "</table>";
        }
        ?>
</div>