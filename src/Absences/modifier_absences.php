<?php
    include '../connection.php';
    if(isset($_POST["modifier"])){
        $date_abssence=$_POST["date"];
        $nbHeurs=$_POST["nbHeurs"];
        $module=$_POST["module"];
        $abs_id=$_POST["abs_Id"];

        

        $sql="UPDATE `absence` 
              SET 
                `date_absence` = '$date_absence',
                `h_absence` = $nbHeurs,
                `id_module` = $module
                WHERE `absence`.`id_absence` =$abs_id;";

        mysqli_query($conn , $sql);

        header('location: ../consulter_absences.php?absence=updated');
    }
?>
