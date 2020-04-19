<div class="table-responsive-sm">
    <?php
    $sql = "SELECT cin, code_apoge,date_naissance,email,nom,prenom,nom_filiere
        FROM etudiant JOIN filiere ON etudiant.id_filiere = filiere.id_filiere";

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    if ($resultatcheck > 0) {
    ?>
        <table class="table table-bordered table-striped mydatatable">
            <thead>
                <tr>
                    <th>Code Apoge</th>
                    <th>Cin</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date Naissance</th>
                    <th>Email</th>
                    <th>Filiere</th>
                    <th>supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
            <?php

            while ($row = mysqli_fetch_assoc($resultat)) {
            ?>
                <tr>
                    <td><?php echo $row["code_apoge"] ?></t>
                    <td><?php echo $row["cin"] ?></td>
                    <td><?php echo $row["nom"] ?></td>
                    <td><?php echo $row["prenom"] ?></td>
                    <td><?php echo $row["date_naissance"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["nom_filiere"] ?></td>
                    <td>
                        <a href="Etudiant/supprimer_etudiant.php?id=<?php echo $row["code_apoge"] ?>">
                            <img width=20 heigth=20 src="https://bit.ly/2UwQb08">
                        </a>
                    </td>
                    <td>
                        <input type="button" value="Modifier" id="<?php echo $row["code_apoge"] ?>" data-toggle="modal" class="btn btn-info btn-xs Open_modifierUnEtudiant">
                    </td>
                </tr>
        <?php
            }
            echo "<tbody>";
            echo "</table>";
        }
        ?>
</div>