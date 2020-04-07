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

        include 'verification.php';
        
        $sql = "INSERT INTO `enseignant`(`nom_enseignant`, `prenom_enseignant`, `email_enseignant`, `date_naissance_enseignant`)
        		VALUES ('$nom', '$prenom', '$email', '$dateN')";
        mysqli_query($conn , $sql);
        header('location: ../index_enseignant.php?enseignant=inserted');
}

?>