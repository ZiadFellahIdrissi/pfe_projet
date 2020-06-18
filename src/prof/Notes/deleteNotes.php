<?php 
    include_once '../../../core/init.php';
    $db = DB::getInstance();
    $id_controle = $_GET["id_controle"];
    $sql = "DELETE FROM passe
            WHERE id_controle = ?";
    $db->query($sql,[$id_controle]);
    echo json_encode("");
?>