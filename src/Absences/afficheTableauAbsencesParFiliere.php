<?php include '../connection.php';
if (!empty($_GET['id_filiere'])) {
?>
    <div class="table-responsive-sm abs absences">
        <?php

        $sql = 'SELECT nom,prenom,code_apoge,intitule,absence.date_absence,h_absence,absence.id_absence,module.id_module as module
                FROM etudiant 
                join absence on etudiant.code_apoge=absence.id_etudiant
                join module on absence.id_module=module.id_module
                where etudiant.id_filiere=' . $_GET['id_filiere'];
        error_reporting(0);
        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        error_reporting(E_ALL);
        if ($resultatcheck > 0) {
        ?>
            <table class="table table-bordered table-striped mydatatable">
                <thead class="thead-dark">
                    <tr>
                        <th>Etudiant</th>
                        <th>Module</th>
                        <th>Date</th>
                        <th>Nombre heures</th>
                        <th>Supprimer</th>
                        <th>Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = mysqli_fetch_assoc($resultat)) {
                    ?>
                        <tr>
                            <td><?php echo $row["nom"] . " " . $row["prenom"] ?></td>
                            <td><?php echo $row["intitule"] ?></td>
                            <td><?php echo $row["date_absence"] ?></td>
                            <td><?php echo $row["h_absence"] . ' H' ?></td>
                            <th>
                                <a href="Absences/supprimer_absences.php?id_absence=<?php echo $row['id_absence'] ?>">
                                    <img width=20 heigth=20 src="https://bit.ly/2UwQb08">
                                </a>
                            <td>
                                <input type="button" id="<?php echo $row['id_absence'] ?>"  value="Modifie" class="btn btn-info btn-xs open_modifierAbsences">
                            </td>
                            </th>
                        </tr>
            <?php
                    }
                    echo "<tbody>";
                    echo "</table> </div>";
                } else
                    echo '<p class="text-warning"><b>Aucune absence dans cette groupe ..</b></p>';
            } else
                echo '<p class="text-danger"><b>Choisir un groupe ..!</b></p>';
            ?>
    </div>
    <!-- =========================================================================================================== -->