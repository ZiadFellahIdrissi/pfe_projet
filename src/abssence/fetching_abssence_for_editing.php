<?php
    include '../connection.php';

    if(!empty($_GET["groupeId"]) AND !empty($_GET["moduleId"]))
    {
        $groupeID=$_GET["groupeId"];
        $moduleId=$_GET["moduleId"];
        $sql="SELECT nom,prenom,intitule,date_abssence,h_abssance,abssence.id_module as module
        FROM etudiant 
        join abssence on etudiant.code_apoge=abssence.id_etudiant
        join module on abssence.id_module=module.id_module
        where etudiant.id_groupe=$groupeID and abssence.id_module= $moduleId";

        $resultat1=mysqli_query($conn,$sql);
        $Myrow = mysqli_fetch_array($resultat1);
        echo json_encode($Myrow);
    }
        
    
       
?>