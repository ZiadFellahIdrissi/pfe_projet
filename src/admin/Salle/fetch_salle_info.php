<?php
include '../../../core/init.php';
$id_salle = $_GET["id_salle"];
$sql = "SELECT *
                FROM Salle
                WHERE id_salle = ?";
$resultat1 = DB::getInstance()->query($sql, [$id_salle]);
$Myrow = $resultat1->first();
echo json_encode($Myrow);
