<?php
	include '../../connection.php';
	if(isset($_GET["id"])){
		$id_module = $_GET["id"];
		$row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_filiere, semester
													 FROM module
													 WHERE id_module = $id_module"));
		$Mysemester=$row["semester"];
		$id_filiere=$row["id_filiere"];
		mysqli_query($conn , "DELETE FROM module
							  WHERE id_module = $id_module");
		header("location: ../Modules?module=deleted&idUrlFiliere=$id_filiere&idUrlSem=$Mysemester");
	}
?>