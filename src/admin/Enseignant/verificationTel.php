<?php
    $sqltest1 = "SELECT telephone_enseignant
    			FROM enseignant
                WHERE telephone_enseignant = '$telephone'";

    if(mysqli_num_rows(mysqli_query($conn,$sqltest1))){
        header('location: ../pages/Enseignant.php?inserting=failed');
        exit();
    }
?>