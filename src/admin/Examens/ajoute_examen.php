<?php
include '../../connection.php';
if(isset($_POST["ajouter"])){
    $module=$_POST["module"];
    $salle=$_POST["salle"];
    $date_examen=$_POST["date_examen"];
    $heur_fin=$_POST["heur_fin"];
    $heur_debut=$_POST["heur_debut"];
    $type=$_POST["type"];


    $sql0 = "INSERT INTO `examen`(`date_exame`, `heur_debut`, `heur_fin`, `salle`, `id_module`, `letype`) 
            VALUES ('$date_examen','$heur_debut','$heur_fin','$salle',$module,'$type')";
    mysqli_query($conn, $sql0);
    
    header('Location: ../pages/CalendrierExamens.php');

}
?>
