<div class="table-responsive-sm">
    <?php
    $sql = 'SELECT nom,prenom,intitule,date_absence,h_absence
            FROM etudiant 
            join absence on etudiant.code_apoge=absence.id_etudiant
            join module on absence.id_module=module.id_module';

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    if ($resultatcheck > 0) {
    ?>
        <table class="table table-bordered table-striped mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>Etudiant</th>
                    <th>Module</th>
                    <th>Date</th>
                    <th>Nombre heures</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($resultat)) {
                ?>
                    <tr>
                        <td><?php echo $row["nom"]." ".$row["prenom"]?></td>
                        <td><?php echo $row["intitule"] ?></td>
                        <td><?php echo $row["date_absence"] ?></td>
                        <td><?php echo $row["h_absence"].' H' ?></td>
                    </tr>
            <?php
                }
                echo "<tbody>";
                echo "</table>";
            }
            ?>
</div>