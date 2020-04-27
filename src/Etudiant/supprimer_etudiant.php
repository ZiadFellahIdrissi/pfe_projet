<?php
	include '../connection.php';
	if(isset($_GET["id"])){
		$codeapoge=$_GET["id"];
		$row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_groupe
													 FROM etudiant
													 WHERE code_apoge = $codeapoge"));
		$id_groupe=$row["id_groupe"];
		mysqli_query($conn , "DELETE FROM etudiant
							  WHERE code_apoge = $codeapoge");
		header("location: ../Etudiants.php?etudiant=deleted&idUrlGroupe=$id_groupe");
	}
?>