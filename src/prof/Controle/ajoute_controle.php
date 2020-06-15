<?php

include_once '../../../core/init.php';
$db = DB::getInstance();

$module = $_GET["module"];
$datecontrole = $_GET["dateControle"];
$heur_debut = $_GET["heur_debut"];
$heur_fin = $_GET["heur_fin"];

$sqltest = "SELECT id_module from Controle where id_module=? and `date`=? and h_debut=?";
if ($db->query($sqltest, [$module, $datecontrole, $heur_debut])->count()) {
    $error="impoo";
    $r=array("error"=>$error);
    echo json_encode($r);
} else {
    $sql = "INSERT INTO `Controle`( `type`, `date`, `h_debut`, `h_fin`, `id_module`)
            VALUES (?,?,?,?,?)";
    $db->query($sql, ['controle', $datecontrole, $heur_debut, $heur_fin, $module]);

    echo json_encode([]);
}
?>