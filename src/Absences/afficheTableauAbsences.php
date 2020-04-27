<div class="table-responsive-sm">
    <?php
    $sql = 'SELECT nom,prenom,intitule,date_abssence,h_abssance
            FROM etudiant 
            join abssence on etudiant.code_apoge=abssence.id_etudiant
            join module on abssence.id_module=module.id_module';

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
                    <th>Nombre heurs</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($resultat)) {
                ?>
                    <tr>
                        <td><?php echo $row["nom"]." ".$row["prenom"]?></td>
                        <td><?php echo $row["intitule"] ?></td>
                        <td><?php echo $row["date_abssence"] ?></td>
                        <td><?php echo $row["h_abssance"].' H' ?></td>
                    </tr>
            <?php
                }
                echo "<tbody>";
                echo "</table>";
            }
            ?>
</div>