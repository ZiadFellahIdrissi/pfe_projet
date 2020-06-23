<?php
	include '../../connection.php';
	if(isset($_GET["id"])  || isset($_GET["idDesact"])){ //|| isset($_POST["confirmation"])
		// if(isset($_POST["confirmation"])){
		// 	$id_filiere = $_POST["confirmation"];

		// 	// suppression des etudiants de la filiere
		// 	mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

		// 	mysqli_query($conn, "DELETE FROM Utilisateur
		// 							WHERE id in ( SELECT id
		// 										  FROM Etudiant
		// 										  WHERE id_filiere = $id_filiere ) ");
														  
		// 	mysqli_query($conn , "DELETE FROM Etudiant
		// 							WHERE id_filiere = $id_filiere ");

		// 	// suppression des module de la filiere
		// 	mysqli_query($conn, "DELETE FROM Module
		// 							WHERE id_module in ( SELECT id_module
		// 												 FROM dispose_de
		// 												 WHERE id_filiere = $id_filiere ) ");

		// 	mysqli_query($conn, "DELETE FROM dispose_de
		// 							WHERE id_filiere = $id_filiere");

		if (isset($_GET["idDesact"])){
			
			$id_filiere = $_GET["idDesact"];

			mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

			mysqli_query($conn , "DELETE FROM Module
								 	WHERE id_module in (SELECT id_module
									 					FROM dispose_de
														WHERE id_filiere = $id_filiere)");
			
			mysqli_query($conn, "DELETE FROM dispose_de
									WHERE id_filiere = $id_filiere");

			mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");
		}

	} 
	// else {
	// 	$id_filiere = $_GET["id"];
	// }
		
		// //fetching the responsable id in order to make him a mere teacher
		// $idFetch = mysqli_query($conn, "SELECT id
		// 								FROM Personnel
		// 								JOIN Filiere ON Personnel.id = Filiere.id_responsable
		// 								WHERE Filiere.id_filiere = $id_filiere");

		// if(mysqli_num_rows($idFetch)>0){
		// 	$row=mysqli_fetch_assoc($idFetch);
		// 	$resp = $row['id'];
		// 	echo mysqli_query($conn, "UPDATE Personnel
		// 							SET role = 'enseignant'
		// 							WHERE id = '$resp'         ");
		// }
		// suppression de la filiere
		mysqli_query($conn , "DELETE FROM Filiere
								WHERE id_filiere = $id_filiere");

		header('location: ./?deleted');
?>