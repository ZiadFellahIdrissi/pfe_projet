<div class="table-responsive-sm">
    <?php
    $sql = 'SELECT etudiant.cin,users.date_naissence, users.email, users.nom, users.prenom,etudiant.filiere, filiere.nom_filiere
    FROM users join etudiant on etudiant.infos=users.id
    LEFT JOIN filiere ON etudiant.filiere = filiere.id_filiere';

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    if ($resultatcheck > 0) {
    ?>
        <table class="table table-bordered table-striped mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>Cin</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date Naissance</th>
                    <th>Email</th>
                    <th>Filière</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($resultat)) {
                ?>
                    <tr>
                        <td><?php echo $row["cin"] ?></td>
                        <td><?php echo $row["nom"] ?></td>
                        <td><?php echo $row["prenom"] ?></td>
                        <td><?php echo $row["date_naissence"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["nom_filiere"] ?></td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id="<?php echo $row["cin"] ?>"  title="More">
                                    <i class="zmdi zmdi-more"></i>
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