<?php
    include '../../connection.php';
    if(isset($_POST["modifier"])){
        $date_absence=$_POST["date"];
        $nbHeurs=$_POST["nbHeurs"];
        $module=$_POST["module"];
        $abs_id=$_POST["abs_Id"];

        $row = mysqli_fetch_assoc(mysqli_query($conn, " SELECT etudiant.id_filiere as fil
                                                        FROM absence
                                                        JOIN etudiant ON absence.id_etudiant = etudiant.code_apoge
                                                        WHERE id_absence = $abs_id"));
        $id_filiere=$row["fil"];

        $sql="UPDATE `absence` 
              SET 
                `date_absence` = '$date_absence',
                `h_absence` = $nbHeurs,
                `id_module` = $module
                WHERE `absence`.`id_absence` =$abs_id;";

        mysqli_query($conn , $sql);
        // echo $date_absence .' '.$nbHeurs.' '.$module .' '.$row["fil"];;
        header("location: ../pages/consulter_absences.php?absence=updated&idUrlFiliere=$id_filiere");
    }
?>
