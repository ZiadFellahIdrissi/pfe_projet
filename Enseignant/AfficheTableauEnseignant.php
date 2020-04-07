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
<?php
                    $sqlF = " SELECT * FROM filiere
                              WHERE responsable_id = '" . $row["id_enseignant"] . "'";
                    $resultatF = mysqli_query($conn, $sqlF);
                    $rowF=mysqli_fetch_assoc($resultatF);
                    $checkF = mysqli_num_rows($resultatF);
                    if ($checkF > 0) {
?>
                        <img id="<?php echo $rowF["nom_filiere"] ?>" style="cursor:pointer;" width=20 heigth=20 src="https://bit.ly/2UwQb08" class="open-confirmation" data-toggle="modal">
<?php
                    } else {
?>
                        <a href="Enseignant/supprimer_enseignant.php?id=<?php echo $row["id_enseignant"] ?>">
                            <img width=20 heigth=20 src="https://bit.ly/2UwQb08">
                        </a>
<?php
                    }
?>
                </td>
                <td>
                    <input type="button" value="Modifier" id="<?php echo $row["id_enseignant"] ?>" data-toggle="modal" class="btn btn-info btn-xs Open_modifierEnseignant">
                </td>
            </tr>
    <?php
        }
        echo "</table>";
    }
    ?>