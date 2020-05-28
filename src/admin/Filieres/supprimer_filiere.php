<?php
	include '../../connection.php';
	if(isset($_GET["id"]) || $_POST["confirmation"] !=''){
		if($_POST["confirmation"] !=''){
			$id_filiere=$_POST["confirmation"];

			//fetching all students of the "Filiere" !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			// $row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT id
			// 											 FROM Etudiant
			// 											 WHERE id_filiere = $id_filiere "));
			// foreach($row as $data){
			// 	mysqli_query($conn, "DELETE FROM Utilisateur
			// 							WHERE id =  $id");
			// }
			mysqli_query($conn , "DELETE FROM Etudiant
									WHERE id_filiere = $id_filiere ");
			
		} else {
			$id_filiere=$_GET["id"];
		}

		//fetching the responsable id in order to make him a mere teacher
		$row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT id
                                                     FROM Personnel
                                                     JOIN Filiere ON Personnel.id = Filiere.id_responsable
                                                     WHERE Filiere.id_filiere = $id_filiere"));
		$resp = $row['id'];
		mysqli_query($conn, "UPDATE Personnel
                                SET role = 'enseignant'
								WHERE id = $resp         ");

		//fetching all "Modules" of this "Filiere" !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// $row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_module
		// 											 FROM dispose_de
		// 											 WHERE id_filiere = $id_filiere "));
		// foreach($row as $data){
		// 	mysqli_query($conn, "DELETE FROM Module
		// 							WHERE id_module = $data");
		// }

		mysqli_query($conn, "DELETE FROM dispose_de
								WHERE id_filiere = $id_filiere");

		
		mysqli_query($conn , "DELETE FROM Filiere
							  WHERE id_filiere=$id_filiere");
		
		header('location: ./?filiere=deleted');
	}
?>