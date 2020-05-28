<div class="table-responsive-sm">
    <?php
    $sql = "SELECT Etudiant.cne, Utilisateur.date_naissance, Utilisateur.email,
                Utilisateur.nom, Utilisateur.prenom, Utilisateur.id cin, Etudiant.id_filiere, Filiere.nom_filiere
            FROM Utilisateur 
            JOIN Etudiant ON Etudiant.id = Utilisateur.id
            JOIN Filiere ON Etudiant.id_filiere = Filiere.id_filiere";

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    if ($resultatcheck > 0) {
    ?>
        <table class="table table table-borderless table-data3 mydatatable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date Naissance</th>
                    <th>Email</th>
                    <th>Filière</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($resultat)) {
                ?>
                    <tr>
                        <td><?php echo $row["nom"] ?></td>
                        <td><?php echo $row["prenom"] ?></td>
                        <td><?php echo $row["date_naissance"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["nom_filiere"] ?></td>
                        <td>
                            <!-- <div class="table-data-feature">
                                <button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id="<?php echo $row["cin"] ?>"  title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </div> -->
                        </td>
                    </tr>
            <?php
                }
                echo "<tbody>";
                echo "</table>";
            }
            ?>
</div>