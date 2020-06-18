<?php 
    include_once '../../../core/init.php';
    $db = DB::getInstance();
    $cin=$_POST["CIN"];
    $moyenne=$_POST["moyenne"];
    $module=$_GET["module"];
    $id_controle=$_GET["id_controle"];

    $sql = "DELETE FROM passe
            WHERE id_etudiant = ?
            AND id_controle = ?";
    $db->query($sql, [$cin, $id_controle]);

    $sql = "INSERT INTO passe
                VALUES(?, ?, ?)";

    $db->query($sql,[$cin, $id_controle, $moyenne]);

    echo json_encode("");
?>