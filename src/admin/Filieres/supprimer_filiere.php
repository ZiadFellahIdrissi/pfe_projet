<?php
	include '../../connection.php';
	if(isset($_GET["id"])){
		$id_filiere=$_GET["id"];
		mysqli_query($conn , "DELETE FROM Filiere
							  WHERE id_filiere=$id_filiere");
		header('location: ./?filiere=deleted');
	}
	
	if($_POST["confirmation"] !=''){
		$id_filiere=$_POST["confirmation"];
		mysqli_query($conn , "DELETE FROM Filiere
								WHERE id_filiere=$id_filiere");
		mysqli_query($conn , "DELETE FROM Etudiant
								WHERE id_filiere=$id_filiere");
		header('location: ./?filiere=deleted');
	}
?>