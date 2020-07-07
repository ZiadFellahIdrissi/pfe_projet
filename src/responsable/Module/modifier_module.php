<?php
include '../../connection.php';
include_once '../../../core/init.php';
$db = DB::getInstance();
if (isset($_POST["oldSem"]) && isset($_POST["Filiere"]) && isset($_POST["id_module"]) && isset($_POST["modifier"])) {
	$id_module     = $_POST["id_module"];
	$intitule      = mysqli_real_escape_string($conn, trim($_POST["Nom"]));
	$heures        = $_POST["Heures"];
	$Mysemester    = $_POST['mySemester'];
	$oldSem		   = $_POST['oldSem'];
	$id_enseignant = $_POST["Enseignant"];
	$coeffC		   = $_POST['coeffC'];
	$coeffE	       = $_POST['coeffE'];
	$oldFiliere	   = $_POST["Filiere"];

	$row		   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Module.intitule
																 FROM Module
																 JOIN dispose_de ON Module.id_module = dispose_de.id_module
																 WHERE Module.id_module != $id_module
																 AND dispose_de.id_filiere = $oldFiliere	"));

	foreach ($row as $data) {
		if ($data == $intitule) {
			header("location: ./?errname");
			exit();
		}
	}

	$sql = "UPDATE `Module` 
				SET `intitule` = ? ,
					`heures_sem` = ?,
					`id_enseignant` = ?,
					`id_semestre` = ?
				WHERE `Module`.`id_module` = ?";
	$db->query($sql, [$intitule, $heures, $id_enseignant, $Mysemester, $id_module]);

	$sql = "UPDATE `dispose_de` 
				SET `coeff_examen` = ?,
					`coeff_controle` = ?
				WHERE `dispose_de`.`id_module` = ?";
	$db->query($sql, [$coeffE, $id_filiere, $coeffC, $id_module]);

	header("location: ./?updated");
}
