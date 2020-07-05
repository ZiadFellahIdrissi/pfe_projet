<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$db = DB::getInstance();
if (isset($_POST["valider"])) {
	$absence = $_POST["absence"];
	$id_seance = $_POST["id_seance"];

	$sql = 'SELECT id_seance from `assiste` where `id_seance` = ? ';
	if (!$db->query($sql, [$id_seance])->count())
		goto insertingdata;

	$sql = 'DELETE from `assiste` where `id_seance` = ? ';
	$db->query($sql, [$id_seance]);

	insertingdata: foreach ($absence as $absenceEtudiant) {
		if (empty($abseceEtudiant)) {
			$sql = 'INSERT INTO `assiste`(`id_seance`, `id_etudiant`) VALUES (?,?)';
			$db->query($sql, [$id_seance, $absenceEtudiant]);
		}
	}
	header('Location: ./?Bien_Ajoute');
}
