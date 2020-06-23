<!-- tableau -->
<div class="table-responsive-sm">
    <?php
    include '../../connection.php';
    $sql = "SELECT *
            FROM Personnel
            JOIN Utilisateur ON Personnel.id = Utilisateur.id
            JOIN Filiere ON Personnel.id = Filiere.id_responsable";

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);

    if ($resultatcheck > 0) {
    ?>
        <br>
        <table class="table table table-borderless table-data3 mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>Nom Complet</th>
                    <th>Telephone</th>
                    <th>Filière</th>
                </tr>
            </thead>
            <tbody>
<?php

                while ($row = mysqli_fetch_assoc($resultat)) {
?>
                    <tr>
                        <td><?php echo $row["nom"].' '.$row["prenom"] ?></td>
                        <td style="text-align: center;"><?php echo $row["telephone"] ?></td>
                        <td><?php echo $row["nom_filiere"] ?> </td>
                    </tr>
<?php
                }
                echo "</tbody>";
                echo "</table><br>";
    }
?>
</div>
<script>
    $('.mydatatable').dataTable();
</script>
<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
