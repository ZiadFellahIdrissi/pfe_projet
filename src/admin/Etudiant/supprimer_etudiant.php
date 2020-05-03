<?php
	include '../../connection.php';
	if(isset($_GET["id"])){
		$codeapoge=$_GET["id"];
		$row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_filiere
													 FROM etudiant
													 WHERE code_apoge = $codeapoge"));
		$id_filiere=$row["id_filiere"];
		mysqli_query($conn , "DELETE FROM etudiant
							  WHERE code_apoge = $codeapoge");
		header("location: ../pages/Etudiants.php?etudiant=deleted&idUrlFiliere=$id_filiere");
	}
