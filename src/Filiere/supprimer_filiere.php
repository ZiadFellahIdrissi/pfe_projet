F<?php

	include '../connection.php';

	if(isset($_GET["id"])){
		$id_filiere=$_GET["id"];
		mysqli_query($conn , "DELETE FROM filiere where id_filiere=$id_filiere");
		header('location: ../Filiere.php?filiere=deleted');
	}
	if($_POST["confirmation"] !=''){
		$id_filier=$_POST["confirmation"];
		mysqli_query($conn , "DELETE FROM filiere where id_filiere=$id_filier");
		mysqli_query($conn , "DELETE FROM etudiant where id_filiere=$id_filier");
		header('location: ../Filiere.php?filiere=deleted');
	}else 
        echo "something went wrong!";
?>