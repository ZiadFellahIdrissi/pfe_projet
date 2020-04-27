<?php
	include '../connection.php';
	if(isset($_GET["id"])){
		$id_module = $_GET["id"];
		mysqli_query($conn , "DELETE FROM module
							  WHERE id_module = $id_module");
		header('location: ../Modules.php?module=deleted');
	}
?>