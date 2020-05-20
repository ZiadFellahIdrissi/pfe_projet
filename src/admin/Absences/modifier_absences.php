<?php
    include '../../connection.php';
    if(isset($_POST["modifier"])){
        $date_absence=$_POST["date"];
        $nbHeurs=$_POST["nbHeurs"];
        $module=$_POST["module"];
        $abs_id=$_POST["abs_Id"];

        $row = mysqli_fetch_assoc(mysqli_query($conn, " SELECT etudiant.id_filiere, module.semester
                                                        FROM absence
                                                        JOIN etudiant ON absence.id_etudiant = etudiant.code_apoge
                                                        JOIN module ON absence.id_module = module.id_module
                                                        WHERE id_absence = $abs_id                                  "));

        $id_filiere=$row["id_filiere"];
        $Mysemester=$row["semester"];

        $sql="UPDATE absence 
              SET 
                date_absence = '$date_absence',
                h_absence = $nbHeurs,
                id_module = $module
                WHERE id_absence = $abs_id;";

        mysqli_query($conn , $sql);
        header("location: ../pages/Absences.php?absence=updated&idUrlFiliere=$id_filiere&idUrlSem=$Mysemester");
    }
?>
