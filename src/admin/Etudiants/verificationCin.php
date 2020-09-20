<?php
$sqltest2 = "SELECT id
    			 FROM Utilisateur
                 WHERE id = '$cin'
                 AND id != '$oldCin'";

if (mysqli_num_rows(mysqli_query($conn, $sqltest2))) {
    header("location: ./?errcin&idUrlFiliere=$filiere");
    exit();
}
