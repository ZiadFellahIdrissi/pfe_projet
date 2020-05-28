<?php
    include '../../connection.php';

        $id_filiere=$_GET["id_filiere"];
        $sql="SELECT *
        	  FROM Filiere 
              WHERE id_filiere = $id_filiere";
        $resultat1=mysqli_query($conn,$sql);
        $Myrow = mysqli_fetch_array($resultat1);
        echo json_encode($Myrow);
?>