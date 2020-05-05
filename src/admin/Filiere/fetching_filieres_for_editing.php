<?php
    include '../../connection.php';

        $id=$_GET["code"];
        $sql="SELECT *
        	  FROM filiere 
              WHERE id_filiere=$id";
        $resultat1=mysqli_query($conn,$sql);
        $Myrow = mysqli_fetch_array($resultat1);
        echo json_encode($Myrow);
?>