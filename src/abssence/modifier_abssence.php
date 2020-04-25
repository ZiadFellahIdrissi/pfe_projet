<?php
    include '../connection.php';
    if(isset($_POST["modifier"])){
        $date_abssence=$_POST["date"];
        $nbHeurs=$_POST["nbHeurs"];
        $module=$_POST["module"];
        $abss_id=$_POST["abss_Id"];

        

        $sql="UPDATE `abssence` 
              SET 
                `date_abssence` = '$date_abssence',
                `h_abssance` = $nbHeurs,
                `id_module` = $module
                WHERE `abssence`.`id_abssence` =$abss_id;";

        mysqli_query($conn , $sql);

        header('location: ../consulte_abssence.php?etudiant=updated');
    }else 
        echo "dore tkhra";

?>
