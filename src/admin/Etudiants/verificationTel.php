<?php
$sqltest1 = "SELECT Utilisateur.telephone
                 FROM Etudiant
                 JOIN Utilisateur on Etudiant.id = Utilisateur.id
                 WHERE Utilisateur.telephone = '$telephone'
                 AND Etudiant.id != '$oldCin'";

if (mysqli_num_rows(mysqli_query($conn, $sqltest1))) {
    header("location: ./?errtel&idUrlFiliere=$filiere");
    exit();
}
