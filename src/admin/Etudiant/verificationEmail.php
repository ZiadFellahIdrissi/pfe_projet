<?php
    $sqltest = "SELECT email
    			 FROM etudiant
                 WHERE email = '$email'";

    if(mysqli_num_rows(mysqli_query($conn, $sqltest))){
        header('location: ../pages/Etudiants.php?inserting=failed');
        exit();
    }
?>