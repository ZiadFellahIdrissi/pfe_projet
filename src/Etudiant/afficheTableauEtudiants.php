<div class="modal-body etudiants">
    <div class="table-responsive-sm">
        <?php
        $sql = 'SELECT cne, code_apoge, date_naissance, email, nom, prenom, etudiant.id_filiere, filiere.nom_filiere
                FROM etudiant
                LEFT JOIN filiere ON etudiant.id_filiere = filiere.id_filiere';

        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        if ($resultatcheck > 0) {
        ?>
            <table class="table table-bordered table-striped mydatatable">
                <thead class="thead-dark">
                    <tr>
                        <th>Code Apogee</th>
                        <th>Cin</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date Naissance</th>
                        <th>Email</th>
                        <th>Filière</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = mysqli_fetch_assoc($resultat)) {
                    ?>
                        <tr>
                            <td><?php echo $row["code_apoge"] ?></t>
                            <td><?php echo $row["cne"] ?></td>
                            <td><?php echo $row["nom"] ?></td>
                            <td><?php echo $row["prenom"] ?></td>
                            <td><?php echo $row["date_naissance"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td style="width:27%"><?php echo $row["nom_filiere"] ?></td>
                        </tr>
                <?php
                    }
                    echo "<tbody>";
                    echo "</table>";
                }
                ?>
    </div>
</div>