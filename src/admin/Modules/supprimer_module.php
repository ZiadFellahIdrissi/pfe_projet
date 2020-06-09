<?php
	include '../../connection.php';
	if(isset($_GET["id"])){
		$id_module  = $_GET["id"];
		$row		= mysqli_fetch_assoc(mysqli_query($conn, "SELECT dispose_de.id_filiere, Module.id_semestre
															  FROM Module
															  JOIN dispose_de ON Module.id_module = dispose_de.id_module
															  WHERE Module.id_module = $id_module						"));
		$Mysemester = $row["id_semestre"];
		$id_filiere = $row["id_filiere"];

		mysqli_query($conn , "DELETE FROM Module
							  WHERE id_module = $id_module");

		mysqli_query($conn , "DELETE FROM dispose_de
							  WHERE id_module = $id_module");
							  
		header("location: ./?deleted&idUrlFiliere=$id_filiere&idUrlSem=$Mysemester");
	}
?>