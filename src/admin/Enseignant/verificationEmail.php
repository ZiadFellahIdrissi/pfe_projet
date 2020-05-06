<?php
    $sqltest = "SELECT email_enseignant
    			 FROM enseignant
                 WHERE email_enseignant = '$email'";

    if(mysqli_num_rows(mysqli_query($conn,$sqltest))){
        header('location: ../pages/Enseignant.php?inserting=failed');
        exit();
    }
?>