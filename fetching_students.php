<?php

    include 'connectionDB.php';

    $sql = "SELECT code_apoge,nom,prenom
            FROM etudiant 
            where etudiant.id_filiere =" . $_POST["filier_id"];

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    if($resultatcheck>0){
?>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Code Apoge</th>
            <th>Nom</th>
            <th>Prenom</th>
        </tr>
        </thead>
        <tbody>
        <?php

        while ($row = mysqli_fetch_assoc($resultat)) {
        ?>
            <tr>
                <td><?php echo $row["code_apoge"] ?></t>
                <td><?php echo $row["nom"] ?></td>
                <td><?php echo $row["prenom"] ?></td>
            </tr>
    <?php
        }
        echo '</tbody>';
        echo "</table>";
    }
?>