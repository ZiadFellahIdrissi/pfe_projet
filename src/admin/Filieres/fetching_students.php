<?php
    include '../../connection.php';
    $sql = "SELECT Etudiant.id, Utilisateur.nom, Utilisateur.prenom
            FROM Etudiant
            JOIN Utilisateur ON Etudiant.id = Utilisateur.id
            where Etudiant.id_filiere =".$_POST["id_filiere"];

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    if($resultatcheck>0){
?>
    <table class="table table table-borderless table-data3 mydatatable">
        <thead class="thead-dark">
        <tr>
            <th>Cin</th>
            <th>Nom</th>
            <th>Prenom</th>
        </tr>
        </thead>
        <tbody>
        <?php

        while ($row = mysqli_fetch_assoc($resultat)) {
        ?>
            <tr>
                <td><?php echo $row["id"] ?></t>
                <td><?php echo $row["nom"] ?></td>
                <td><?php echo $row["prenom"] ?></td>
            </tr>
    <?php
        }
        echo '</tbody>';
        echo "</table>";
    }
?>