<?php
    $sqltest = "SELECT Utilisateur.email
    			FROM Personnel
                JOIN Utilisateur ON Personnel.id = Utilisateur.id
                WHERE Utilisateur.email = '$email'
                AND Personnel.id != '$oldCin'";

    if(mysqli_num_rows(mysqli_query($conn,$sqltest))){
        header('location: ../Enseignants?inserting=failed');
        exit();
    }
?>