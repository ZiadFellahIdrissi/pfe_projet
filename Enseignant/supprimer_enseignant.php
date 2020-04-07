<?php

include '../connectionDB.php';
if(isset($_GET["id"])){
    
    $id=$_GET["id"];
    $sqlTest="SELECT *
            FROM enseignant
            WHERE id_enseignant in ( SELECT responsable_id
                                    FROM filiere
                                    where responsable_id=$id
                                    )";
    $resultat=mysqli_query($conn,$sqlTest);

    if(mysqli_num_rows($resultat)>0){
        header('location: ../index_enseignant.php?delete=failed'); 
    }else{
    mysqli_query($conn , "DELETE FROM enseignant where id_enseignant=$id");
    header('location: ../index_enseignant.php?enseignant=deleted'); 
    }
}

?>