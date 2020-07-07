<?php 
include_once '../../../core/init.php';
$db = DB::getInstance();
if(isset($_GET["id"])){
    $date=$_GET["date"];
    $heure_debut=$_GET["heure_debut"];
    $heure_fin=$_GET["heure_fin"];
    $id=$_GET["id"];

    $sql = "UPDATE Seance
            SET date_seance = ?,
                h_debut = ?,
                h_fin = ?
            WHERE id_seance = ?";
    $db->query($sql,[$date,$heure_debut,$heure_fin,$id]);
    echo json_encode("");
}
?>