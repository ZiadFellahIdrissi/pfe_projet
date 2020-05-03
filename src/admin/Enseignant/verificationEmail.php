<?php
    $sqltest2 = "SELECT email_enseignant FROM enseignant
                WHERE email_enseignant='$email'";

    if(mysqli_num_rows(mysqli_query($conn,$sqltest2))){
        header('location: ../pages/Enseignant.php?insert=mailerr');
        exit();
    }
?>