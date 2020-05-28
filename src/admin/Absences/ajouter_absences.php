<?php
    include '../../connection.php';
    if(isset($_POST["Ajouter"])){
        $code_apoge=$_POST["id_etu"];
        $module=$_POST["module"];
        $date_absence=$_POST["dateA"];
        $nbHeures=$_POST["nbHeurs"];

        $row = mysqli_fetch_assoc(mysqli_query($conn, " SELECT id_filiere, semester
                                                        FROM module
                                                        WHERE id_module = $module "));

        $id_filiere=$row["id_filiere"];
        $Mysemester=$row["semester"];

        $sql="INSERT INTO absence(id_etudiant, id_module, date_absence, h_absence)
                VALUES($code_apoge, $module, '$date_absence', $nbHeures)";

        mysqli_query($conn , $sql);
        header("location: ../pages/Absences.php?absence=updated&idUrlFiliere=$id_filiere&idUrlSem=$Mysemester");
    }
?>
