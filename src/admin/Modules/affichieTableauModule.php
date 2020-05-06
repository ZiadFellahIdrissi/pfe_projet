<div class="modal-body modules">
    <div class="table-responsive-sm">
        <?php
        $sql = "SELECT *
                FROM module
                JOIN enseignant ON module.id_enseignant = enseignant.id_enseignant
                Join semester on module.semester=semester.id_sem
                JOIN filiere ON module.id_filiere = filiere.id_filiere";
        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        if ($resultatcheck > 0) {
        ?>
            <table class="table table-bordered table-striped mydatatable">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom du Module</th>
                        <th>Enseignant</th>
                        <th>Heures</th>
                        <th>Filière</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = mysqli_fetch_assoc($resultat)) {
                    ?>
                        <tr>
                            <td><?php echo $row["intitule"] ?></td>
                            <td><?php echo $row["prenom_enseignant"] . ' ' . $row["nom_enseignant"] ?></td>
                            <td><?php echo $row["horaire"] ?></td>
                            <td><?php echo $row["nom_filiere"] ?></td>
                            <td><?php echo $row["nom_sem"] ?></td>
                        </tr>
                <?php
                    }
                    echo "<tbody>";
                    echo "</table>";
                }
                ?>
    </div>
</div>