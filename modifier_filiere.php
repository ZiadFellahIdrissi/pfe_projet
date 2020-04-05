<?php 
    include 'connectionDB.php';

    if(isset($_POST["Modifier_inp"])){
        $responsable_id=$_POST["Modifier_inp"];
        if( $_POST["Responsable_modifier"]==""){  //hade lifi dartha ila 3zal dike l option "choise un respo
            header("location: index_filiere.php?update=failed");
        }else{
            mysqli_query($conn , "UPDATE filiere set responsable_id = ".$_POST["Responsable_modifier"]);
            header("location: index_filiere.php?filiere=updated");
        }
    }else 
    header("location: index_filiere.php?error");
?>