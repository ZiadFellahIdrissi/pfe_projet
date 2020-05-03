<?php
	include '../../connection.php';
	if(isset($_GET["id"])){
		$id_module = $_GET["id"];
		$row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_filiere
													 FROM module
													 WHERE id_module = $id_module"));
		$id_filiere=$row["id_filiere"];
		mysqli_query($conn , "DELETE FROM module
							  WHERE id_module = $id_module");
		header("location: ../pages/Modules.php?module=deleted&idUrlFiliere=$id_filiere");
	}
?>