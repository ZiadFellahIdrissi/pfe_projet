<?php
    include '../../connection.php';
    include 'modals.php';
?>
<div class="table-responsive-sm">
    <?php
    $sqlQuery = "SELECT Filiere.id_filiere, Filiere.id_responsable, Filiere.nom_filiere,
                            Utilisateur.nom, Utilisateur.prenom, Filiere.etat
                 FROM Filiere
                 JOIN Personnel ON Filiere.id_responsable = Personnel.id
                 JOIN Utilisateur ON Personnel.id = Utilisateur.id
                 WHERE Filiere.etat = 1";

    $resultatOfQuery = mysqli_query($conn, $sqlQuery);
    $resultatcheck = mysqli_num_rows($resultatOfQuery);
    if($resultatcheck>0){
    ?>
        <table class="table table table-borderless table-data3 mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>Nom de la filière</th>
                    <th>Responsable</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($resultatOfQuery)) {
            ?>
                <tr>
                    <td><?php echo $row["nom_filiere"] ?></td>
                    <td><?php echo $row["nom"].' '.$row["prenom"] ?></td>
                    <td>
                        <div class="table-data-feature">
                            <?php
                            $id_filiere=$row["id_filiere"];
                            $sql = " SELECT *
                                      FROM Etudiant
                                      WHERE id_filiere = $id_filiere";
                            $resultat = mysqli_query($conn, $sql);
                            $check = mysqli_num_rows($resultat);
                            // $sql = " SELECT *
                            //           FROM dispose_de
                            //           WHERE id_filiere = '" . $row["id_filiere"] . "'";
                            // $resultat = mysqli_query($conn, $sql);
                            // $check2 = mysqli_num_rows($resultat);
                            // if ($check > 0 || $check2 > 0) {
                            ?>
                                <!-- <button data-id="<?php echo $row["id_filiere"] ?>" style="cursor:pointer;" class="item open-confirmation" data-toggle="modal" data-toggle="tooltip" title="Supprimer" >
                                    <i class="zmdi zmdi-delete"></i>
                                </button> -->
                            <!-- <?php
                            // } else {
                            ?> -->
                                <!-- <a class="item" href="supprimer_filiere.php?id=<?php echo $row["id_filiere"] ?>" title="Supprimer" >
                                    <i class="zmdi zmdi-delete" ></i>
                                </a> -->
                            <?php
                            //}
                            if($check <= 0){
                            ?>
                                <a class="item" href='desactiver_filiere.php?id_filiere=<?php echo $row["id_filiere"] ?>&id_responsable=<?php echo $row["id_responsable"] ?>' title="Désactiver" >
                                    <i class="zmdi zmdi-block-alt" ></i>
                                </a>
                            <?php
                            }
                            ?>
                            <button data-id="<?php echo $row["nom_filiere"] ?>" id="<?php echo $row["id_filiere"] ?>" data-toggle="tooltip" class="item open_modifierModal" title="Modifier" >
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id="<?php echo $row["id_filiere"] ?>"  title="More">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </div>
                    </td>
                </tr>
        <?php
            }
            echo "</tbody>";
        echo "</table>";
    }
        $sqlQuery = "SELECT Filiere.id_filiere, Filiere.nom_filiere
                        FROM Filiere
                     WHERE Filiere.etat = 0";
        $resultatOfQuery = mysqli_query($conn, $sqlQuery);
        $resultatcheck = mysqli_num_rows($resultatOfQuery);
        if($resultatcheck>0){
        ?>
            <br>
            <p>Filières désactivés.</p>
            <table class="table table table-borderless table-data3 mydatatable2">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom de la filière</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($resultatOfQuery)) {
                ?>
                    <tr>
                        <td><?php echo $row["nom_filiere"] ?></td>
                        <td>
                            <div class="table-data-feature">
                                <a class="item" href="supprimer_filiere.php?idDesact=<?php echo $row["id_filiere"] ?>" title="Supprimer" >
                                    <i class="zmdi zmdi-delete" ></i>
                                </a>
                                <button class="item open_confirmationAct" data-toggle="modal" data-toggle="tooltip" id=<?php echo $row["id_filiere"] ?> title="Activer" >
                                    <i class="zmdi zmdi-check-circle"></i>
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