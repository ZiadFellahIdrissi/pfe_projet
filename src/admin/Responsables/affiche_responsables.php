
<?php
    include '../../connection.php';
    include 'modals.php';
    $sql = "SELECT *
            FROM Personnel
            JOIN Utilisateur ON Personnel.id = Utilisateur.id
            JOIN Filiere ON Personnel.id = Filiere.id_responsable";

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);

if ($resultatcheck > 0) {
    ?>
        <br>
    <div class="table-responsive-sm">
        <table class="table table table-borderless table-hover mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>Nom Complet</th>
                    <th>Telephone</th>
                    <th>Filière</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
<?php

                while ($row = mysqli_fetch_assoc($resultat)) {
?>
                    <tr>
                        <td><?php echo $row["nom"].' '.$row["prenom"] ?></td>
                        <td style="text-align: center;"><?php echo $row["telephone"] ?></td>
                        <td><?php echo $row["nom_filiere"] ?> </td>
                        <td>
                            <div class="table-data-feature">
                                    <button data-toggle="tooltip" id="<?php echo $row["id"] ?>" data-toggle="modal" class="item Open_modifierResponsable" data-placement="top" title="Modifier">
										<i class="zmdi zmdi-edit"></i>
									</button>
                                <button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id="<?php echo $row["id"] ?>" title="Plus d'informations">
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
?>
</div>