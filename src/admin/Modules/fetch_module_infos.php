<?php
    include '../../connection.php';
    $id_module=$_GET['code'];
    $sql = "SELECT *
    		FROM module 
            WHERE id_module=$id_module";
    $resultat1=mysqli_query($conn,$sql);
    $Myrow = mysqli_fetch_array($resultat1);
    echo json_encode($Myrow);
?>