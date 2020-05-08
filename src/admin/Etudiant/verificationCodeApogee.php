<?php
    $sqltest2 = "SELECT code_apoge
    			 FROM etudiant
                 WHERE code_apoge = '$code_apoge'
                 AND code_apoge != $oldCode";

    if(mysqli_num_rows(mysqli_query($conn, $sqltest2))){
        header('location: ../pages/Etudiants.php?inserting=failed?hhh2');
        exit();
    }
?>