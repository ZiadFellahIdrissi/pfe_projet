<?php 
include_once '../../../core/init.php';
$db = DB::getInstance();
if(isset($_GET["id_controle"])){
    $dateControle=$_GET["dateControle"];
    $heur_debut=$_GET["heur_debut"];
    $heur_fin=$_GET["heur_fin"];
    $id_controle=$_GET["id_controle"];

    $sql="UPDATE Controle
            SET `date`=?,
                h_debut=?,
                h_fin=?
                WHERE id_controle=?";
    $db->query($sql,[$dateControle,$heur_debut,$heur_fin,$id_controle]);
    echo json_encode("");
}
?>