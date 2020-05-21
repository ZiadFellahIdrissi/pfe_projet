<?php
    $sqltest1 = "SELECT cne
    			 FROM etudiant
                 WHERE cne = '$cne'
                 AND code_apoge != $oldCode";

    if(mysqli_num_rows(mysqli_query($conn, $sqltest1))){
        header('location: ../Etudiants?inserting=failed?hhh1');
        exit();
    }
?>