<?php
	include '../connection.php';
	if(isset($_GET["id"])){
		$codeapoge=$_GET["id"];
		mysqli_query($conn , "DELETE FROM etudiant where code_apoge=$codeapoge");
		header('location: ../Etudiants.php?etudiant=deleted');
	}
?>