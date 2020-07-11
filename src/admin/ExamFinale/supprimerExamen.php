<?php
include_once '../../../core/init.php';
$db = DB::getInstance();
if (isset($_GET["id_examen"])) {

    $id_examen = $_GET["id_examen"];
    if (DB::getInstance()->query("SELECT id_controle from passe where id_controle= ?", [$id_examen])->count()) {
        $error="Vous pouvez pas supprimer cette examen !";
        $r=array("error"=>$error);
        echo json_encode($r);
        exit();
    } else {
        $sql = "DELETE FROM Controle
            WHERE id_controle = ?";
        $db->query($sql, [$id_examen]);
        echo json_encode([]);
    }
}
