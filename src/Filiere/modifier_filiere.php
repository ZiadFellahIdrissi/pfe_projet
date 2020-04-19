<?php 
    include '../connection.php';

    if(isset($_POST["Modifier_inp"])){
        $filiere_id=$_POST["Modifier_inp"];
        $respo_id=$_POST["Responsable_modifier"];
        if( $respo_id==""){
            header("location: ../Filiere.php?update=failed");
        }else{
            mysqli_query($conn , "UPDATE filiere set responsable_id = $respo_id WHERE id_filiere =". $filiere_id  );
            header("location: ../Filiere.php?filiere=updated");
        }
    }else 
    header("location: ../Filiere.php?error");
?>