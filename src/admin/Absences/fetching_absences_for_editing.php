<?php
    include '../../connection.php';

    if(!empty($_GET["abs_id"]))
    {
        $abs=$_GET["abs_id"];
        $sql="SELECT *
        FROM etudiant 
        join absence on etudiant.code_apoge=absence.id_etudiant
        join module on absence.id_module=module.id_module
        where absence.id_absence= $abs";

        $resultat1=mysqli_query($conn,$sql);
        $Myrow = mysqli_fetch_array($resultat1);
        echo json_encode($Myrow);
    }
?>