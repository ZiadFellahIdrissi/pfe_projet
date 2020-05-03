<?php
    include '../../connection.php';

        $id=$_GET["code"];
        $sql="SELECT * FROM enseignant 
                WHERE id_enseignant=$id";
        $resultat1=mysqli_query($conn,$sql);
        $Myrow = mysqli_fetch_array($resultat1);
        echo json_encode($Myrow);
?>