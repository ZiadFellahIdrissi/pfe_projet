<?php
    include '../../connection.php';

        $id=$_GET["code"];
        $sql="SELECT *
        	  FROM Personnel
              JOIN Utilisateur ON Personnel.id = Utilisateur.id
              WHERE Personnel.id = $id";
        $resultat1=mysqli_query($conn,$sql);
        $Myrow = mysqli_fetch_array($resultat1);
        echo json_encode($Myrow);
?>