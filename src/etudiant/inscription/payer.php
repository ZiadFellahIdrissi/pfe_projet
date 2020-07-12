<?php
include_once '../../../core/init.php';

$db = DB::getInstance();
if (isset($_POST["montant"]) && isset($_POST["id"])) {

    $sql = "UPDATE Etudiant
            SET somme = somme + ?
            WHERE id = ?";
    $db->query($sql, [$_POST["montant"], $_POST["id"]]);
    header('Location: ./?paysuccess');
} else
    header('Location: ./?payfailed');
?>
