<?php 
    include '../connection.php';
    if(!empty($_GET['id_absence'])){
        $id_absence = $_GET['id_absence'];
        $row = mysqli_fetch_assoc(mysqli_query($conn, " SELECT etudiant.id_filiere as fil
													 	FROM absence
													 	JOIN etudiant ON absence.id_etudiant = etudiant.code_apoge
													 	WHERE id_absence = $id_absence"));
		$id_filiere=$row["fil"];
        $sql = "DELETE FROM absence
        		WHERE id_absence=$id_absence";
        mysqli_query($conn,$sql);
        header("Location: ../consulter_absences.php?absence=deleted&idUrlFiliere=$id_filiere");
    }
?>