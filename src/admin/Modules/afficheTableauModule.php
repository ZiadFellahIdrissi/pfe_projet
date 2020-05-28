<div class="modal-body modules">
    <div class="table-responsive-sm">
        <?php
        $sql = "SELECT *
                FROM Module
                JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
                JOIN Personnel ON Module.id_enseignant = Personnel.id
                JOIN Utilisateur ON Personnel.id = Utilisateur.id
                JOIN dispose_de ON Module.id_module = dispose_de.id_module
                JOIN Filiere ON dispose_de.id_filiere = Filiere.id_filiere";
        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        if ($resultatcheck > 0) {
        ?>
            <table class="table table table-borderless table-data3 mydatatable">
                <thead>
                    <tr>
                        <th>Nom du Module</th>
                        <th>Enseignant</th>
                        <th>Heures</th>
                        <th>Filière</th>
                        <th>Semestre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = mysqli_fetch_assoc($resultat)) {
                    ?>
                        <tr>
                            <td><?php echo $row["intitule"] ?></td>
                            <td><?php echo $row["nom"] . ' ' . $row["prenom"] ?></td>
                            <td><?php echo $row["heures_sem"] ?></td>
                            <td><?php echo $row["nom_filiere"] ?></td>
                            <td><?php echo $row["semestre"] ?></td>
                        </tr>
                <?php
                    }
                    echo "<tbody>";
                    echo "</table>";
                }
                ?>
    </div>
</div>