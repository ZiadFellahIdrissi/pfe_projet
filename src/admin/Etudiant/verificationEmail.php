<?php
    $sqltest = "SELECT email
    			 FROM etudiant
                 WHERE email = '$email'
                 AND code_apoge != $oldCode";

    if(mysqli_num_rows(mysqli_query($conn, $sqltest))){
        header('location: ../pages/Etudiants.php?inserting=failed?hhh3');
        exit();
    }
?>