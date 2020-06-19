<?php
	include '../../connection.php';
	if(isset($_GET["id"])){
		$cin=$_GET["id"];
		$row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_filiere
													 FROM Etudiant
													 WHERE id = '$cin'"));
		$filiere=$row["id_filiere"];
		mysqli_query($conn, "DELETE FROM Etudiant
							 WHERE id = '$cin'        ");
		mysqli_query($conn, "DELETE FROM Utilisateur
							 WHERE id = '$cin'		 ");
		header("location: ./?deleted&idUrlFiliere=$filiere");
	}
