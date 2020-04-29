<?php
    include '../connection.php';

    if(isset($_GET["abs_id"]))
    {
        $ab_Id=$_GET["abs_id"];
        $code_apoge=$_GET["code_apoge"];
        $sql1="SELECT nom, prenom, code_apoge, intitule, date_absence, h_absence, absence.id_module as module
                FROM etudiant 
                join absence on etudiant.code_apoge=absence.id_etudiant
                join module on absence.id_module=module.id_module
                where absence.id_absence= $ab_Id";

        $Myresultat=mysqli_query($conn,$sql1);
        $Myrow = mysqli_fetch_array($Myresultat);
        echo json_encode($Myrow);
    }
?>