<?php
    include '../../connection.php';
    if(isset($_POST["oldSem"]) && isset($_POST["Filiere"]) && isset($_POST["id_module"]) && isset($_POST["modifier"])){
    	$id_filiere=$_POST["filiere_modifier"];
    	$id_module=$_POST["id_module"];
        $intitule = mysqli_real_escape_string($conn, $_POST["Nom"]);
		$heures =$_POST["Heures"];
		$Mysemester=$_POST['mySemester'];
		$oldSem=$_POST['oldSem'];
        $id_enseignant=$_POST["Enseignant"];
		$coeffC=$_POST['coeffC'];
		$coeffE=$_POST['coeffE'];
		$oldFiliere=$_POST["Filiere"];

		$row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT Module.intitule
						                             FROM Module
													 JOIN dispose_de ON Module.id_module = dispose_de.id_module
						                             WHERE Module.id_module != $id_module
													 AND dispose_de.id_filiere = $id_filiere					"));
													 
        foreach ($row as $data)
	    {
	        if ($data == $intitule){
	        	header("location: ./?inserting=failed&idUrlFiliere=$oldFiliere");
            	exit();
	        }
	    }

        mysqli_query($conn , "UPDATE `Module` 
							  SET `intitule` = '$intitule' ,
								  `heures_sem` = $heures,
								  `id_enseignant` = $id_enseignant,
								  `id_semestre` =$Mysemester
							  WHERE `Module`.`id_module` = $id_module");

		mysqli_query($conn , "UPDATE `dispose_de` 
							  SET `coeff_examen` = $coeffE,
							  	  `id_filiere` = $id_filiere,
								  `coeff_controle` = $coeffC
							  WHERE `dispose_de`.`id_module` = $id_module");

        header("location: ../Modules?module=updated&idUrlFiliere=$oldFiliere&idUrlSem=$oldSem");
    }
?>