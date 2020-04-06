<?php

$sql = "SELECT *
        FROM enseignant";

$resultat = mysqli_query($conn, $sql);
$resultatcheck = mysqli_num_rows($resultat);
if ($resultatcheck > 0) {
?>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date Naissance</th>
            <th>Email</th>
            <th>supprimer</th>
            <th>Modifier</th>
        </tr>
        <?php

        while ($row = mysqli_fetch_assoc($resultat)) {
        ?>
            <tr>
                <td><?php echo $row["nom_enseignant"] ?></t>
                <td><?php echo $row["prenom_enseignant"] ?></td>
                <td><?php echo $row["date_naissance_enseignant"] ?></td>
                <td><?php echo $row["email_enseignant"] ?></td>
                <td>
                    <a href="Enseignant/supprimer_enseignant.php?id=<?php echo $row["id_enseignant"] ?>">
                        <img width=20 heigth=20 src="https://bit.ly/2UwQb08">
                    </a>
                </td>
                <td>
                    <input type="button" value="Modifier" id="<?php echo $row["code_apoge"] ?>" data-toggle="modal" class="btn btn-info btn-xs Open_modifierUnEtudiant">
                </td>
            </tr>
    <?php
        }
        echo "</table>";
    }
    ?>