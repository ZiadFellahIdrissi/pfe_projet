<?php
	include 'connectionDB.php';
	if($_POST["confirmation"] !=''){
		$id_filier=$_POST["confirmation"];
		mysqli_query($conn , "DELETE FROM filiere where id_filiere=$id_filier");
		mysqli_query($conn , "DELETE FROM etudiant where id_filiere=$id_filier");
		header('location: index_filiere.php?filiere=deleted');
	}else 
        echo "somthing goes wrong";
?>