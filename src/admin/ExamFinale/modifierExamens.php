<?php
include_once '../../../core/init.php';
$db = DB::getInstance();
if(isset($_GET["id_Examen"])){
    $dateExamen=$_GET["dateExamen"];
    $heur_debut=$_GET["heur_debut"];
    $heur_fin=$_GET["heur_fin"];
    $id_Examen=$_GET["id_Examen"];

    $sql = "UPDATE Controle
            SET `date` = ?,
                h_debut = ?,
                h_fin = ?
            WHERE id_controle = ?";
    $db->query($sql,[$dateExamen,$heur_debut,$heur_fin,$id_Examen]);
    echo json_encode("");
}
?>
