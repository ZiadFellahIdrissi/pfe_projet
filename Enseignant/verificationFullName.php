<?php
    $sqltest = "SELECT nom_enseignant, prenom_enseignant FROM enseignant
                    WHERE (nom_enseignant='$nom'
                    AND prenom_enseignant='$prenom')";

    if(mysqli_num_rows(mysqli_query($conn,$sqltest))){
        header('location: ../index_enseignant.php?insert=failed');
        exit();
    }
?>