<?php
    $sqltest1 = "SELECT cne
    			 FROM etudiant
                 WHERE cne = '$cne'";

    if(mysqli_num_rows(mysqli_query($conn, $sqltest1))){
        header('location: ../pages/Etudiants.php?inserting=failed');
        exit();
    }
?>