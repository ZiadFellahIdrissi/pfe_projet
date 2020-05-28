<?php
    $sqltest = " SELECT Utilisateur.email
    			 FROM Etudiant
                 JOIN Utilisateur on Etudiant.id = Utilisateur.id
                 WHERE Utilisateur.email = '$email'
                 AND Etudiant.id != $oldCin";

    if(mysqli_num_rows(mysqli_query($conn, $sqltest))){
        header("location: ./?inserting=failed&idUrlFiliere=$filiere");
        exit();
    }
?>