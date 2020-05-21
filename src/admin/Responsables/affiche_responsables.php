<!-- tableau -->
<div class="table-responsive-sm">
    <?php
    include '../../connection.php';

    $sql = "SELECT enseignant.nom_enseignant, enseignant.prenom_enseignant,
                enseignant.email_enseignant , enseignant.telephone_enseignant,
                filiere.nom_filiere from filiere 
                join enseignant on filiere.responsable_id=enseignant.id_enseignant";

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);

    if ($resultatcheck > 0) {
    ?>
        <table class="table table-bordered table-striped mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>filiere</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($resultat)) {
                ?>
                    <tr>
                        <td><?php echo $row["nom_enseignant"] ?></td>
                        <td><?php echo $row["prenom_enseignant"] ?></td>
                        <td><?php echo $row["telephone_enseignant"] ?></td>
                        <td><?php echo $row["email_enseignant"] ?></td>
                        <td><?php echo $row["nom_filiere"] ?> </td>
                    </tr>
            <?php
                }
                echo "</tbody>";
                echo "</table>";
            }
            ?>
</div>
<script>
    $('.mydatatable').dataTable();
</script>
<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>