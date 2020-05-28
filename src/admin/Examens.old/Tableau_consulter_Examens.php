<div class="table-responsive-sm">
    <?php
    $sql = "SELECT * FROM examen
    join module on examen.id_module=module.id_module
     ORDER BY examen.id_examen";

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    if ($resultatcheck > 0) {
    ?>
        <table class="table table-bordered table-striped mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>Date Examen</th>
                    <th>Heur Debut</th>
                    <th>Heur Fin</th>
                    <th>Salle</th>
                    <th>Module</th>
                    <th>Type</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($resultat)) {
                ?>
                    <tr>
                        <td><?php echo $row["date_exame"] ?></t>
                        <td><?php echo $row["heur_debut"] ?></td>
                        <td><?php echo $row["heur_fin"] ?></td>
                        <td><?php echo $row["salle"] ?></td>
                        <td><?php echo $row["intitule"] ?></td>
                        <td><?php echo $row["letype"] ?></td>
                        <td>
                            <div class="table-data-feature" style="text-align: center">
                                <button data-toggle="tooltip" id="<?php echo $row["id_examen"] ?>" data-toggle="modal" class="item Open_modifierUnExamen" data-placement="top" title="Modifier">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button onclick="location.href='../Examens/supprimerExamen.php?id=<?php echo $row["id_examen"] ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>

                        </td>
                    </tr>
            <?php
                }
                echo "<tbody>";
                echo "</table>";
            }
            ?>
</div>