<?php
include '../../connection.php';
if(isset($_GET["id"])){

    $date_examen=$_GET["dateExam"];
    $heur_fin=$_GET["heur_fin"];
    $heur_debut=$_GET["heur_debut"];
    $id=$_GET["id"];


    $sql0 = " UPDATE examen 
    set date_exame='$date_examen',
    heur_debut='$heur_debut',
    heur_fin='$heur_fin'
    WHERE id_examen=$id;";
    mysqli_query($conn, $sql0);
    echo json_encode('');
}
?>