<?php
    include '../../connection.php';

        $code_apoger=$_GET["code"];
        $sql="SELECT * FROM etudiant 
                WHERE code_apoge=$code_apoger";

        $resultat1=mysqli_query($conn,$sql);
        $Myrow = mysqli_fetch_array($resultat1);
        echo json_encode($Myrow);
    
       
?>