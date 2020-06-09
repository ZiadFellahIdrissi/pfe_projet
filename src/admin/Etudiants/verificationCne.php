<?php
    $sqltest1 = "SELECT cne
    			 FROM Etudiant
                 WHERE cne = '$cne'
                 AND id != $oldCin";

    if(mysqli_num_rows(mysqli_query($conn, $sqltest1))){
        header("location: ./?errcne&idUrlFiliere=$filiere");
        exit();
    }
?>