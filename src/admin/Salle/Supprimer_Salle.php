<?php
include_once '../../../core/init.php';
if (isset($_GET["id_salle"])) {
    $id_salle = $_GET["id_salle"];

    if (DB::getInstance()->query("SELECT salle from Seance where salle = ?", [$id_salle])->count()) {
        echo "pas_autorise";
        exit();
    } else if (DB::getInstance()->query("SELECT salle from Controle where salle = ?", [$id_salle])->count()) {
        echo "pas_autorise";
        exit();
    } else {
        DB::getInstance()->query("DELETE FROM salle where id_salle = ? ", [$id_salle]);
        echo "supprimie_Avec_Succes";
        exit();
    }
}
