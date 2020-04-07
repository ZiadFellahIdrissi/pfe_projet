<?php
include '../connectionDB.php';

if(isset($_POST['ajouter'])){
        $nom=$_POST['Nom'];
        $prenom=$_POST['prenom'];
        $dateN=$_POST['dateN'];
        $email=$_POST['email'];

        $sqltest = "SELECT nom_enseignant, prenom_enseignant FROM enseignant
        			WHERE (nom_enseignant='$nom'
        			AND prenom_enseignant='$prenom')";

        if(mysqli_num_rows(mysqli_query($conn,$sqltest))){
            header('location: ../index_enseignant.php?insert=failed');
            exit();
        }

        $sqltest2 = "SELECT email_enseignant FROM enseignant
        			 WHERE email_enseignant='$email'";

        if(mysqli_num_rows(mysqli_query($conn,$sqltest2))){
            header('location: ../index_enseignant.php?insert=failed');
            exit();
        }
        
        $sql = "INSERT INTO `enseignant`(`nom_enseignant`, `prenom_enseignant`, `email_enseignant`, `date_naissance_enseignant`)
        		VALUES ('$nom', '$prenom', '$email', '$dateN')";
        mysqli_query($conn , $sql);
        header('location: ../index_enseignant.php?enseignant=inserted');
}

?>