<?php
include_once '../../../core/init.php';
$db = DB::getInstance();
if (isset($_GET["id"])) {
	$etat = isset($_GET['check']) ? 1 : 0;
  $sql = "UPDATE Demandes
          SET etat = ?
          WHERE id = ?";
  $db->query($sql, [$etat, $_GET['id']]);
	header("Location: ./");
}
