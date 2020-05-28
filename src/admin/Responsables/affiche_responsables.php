<!-- tableau -->
<div class="table-responsive-sm">
    <?php
    include '../../connection.php';
    $sql = "SELECT Utilisateur.id cin, Utilisateur.nom, Utilisateur.prenom, Utilisateur.email,
                    Utilisateur.date_naissance, Utilisateur.telephone, Filiere.nom_filiere
            FROM Personnel
            JOIN Utilisateur ON Personnel.id = Utilisateur.id
            JOIN Filiere ON Personnel.id = Filiere.id_responsable               ";

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);

    if ($resultatcheck > 0) {
    ?>
        <br>
        <table class="table table table-borderless table-data3 mydatatable">
            <thead>
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
                        <td><?php echo $row["nom"] ?></td>
                        <td><?php echo $row["prenom"] ?></td>
                        <td><?php echo $row["telephone"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["nom_filiere"] ?> </td>
                    </tr>
<?php
                }
                echo "</tbody>";
                echo "</table><br>";
    } else
            echo '<p style="text-align: center" >la vida loca</p>';
?>
</div>
<script>
    $('.mydatatable').dataTable();
</script>
<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
