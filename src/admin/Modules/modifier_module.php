<?php
    include '../../connection.php';
    if($_POST["Filiere"]!=""){
    	$id_filiere=$_POST["Filiere"];
    	$id_module=$_POST["id_module"];
        $intitule = mysqli_real_escape_string($conn, $_POST["Nom"]);
		$heures =$_POST["Heures"];
		$Mysemester=$_POST['mySemester'];
        $id_enseignant=$_POST["Enseignant"];

        $row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT intitule
						                             FROM module
						                             WHERE id_module != $id_module
						                             AND id_filiere = $id_filiere"));

        foreach ($row as $data)
	    {
	        if ($data == $intitule){
	        	header("location: ../pages/Modules.php?inserting=failed&idUrlFiliere=$id_filiere");
            	exit();
	        }
	    }

		$sql =" UPDATE `module` 
				SET `intitule` = '$intitule' ,
					`horaire` = $heures,
					`id_enseignant` = $id_enseignant,
					semester=$Mysemester
				WHERE `module`.`id_module` = $id_module";
        mysqli_query($conn , $sql);

        header("location: ../pages/Modules.php?module=updated&idUrlFiliere=$id_filiere");
    }
?>