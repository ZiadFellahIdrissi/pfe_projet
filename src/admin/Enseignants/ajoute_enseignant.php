<?php
include '../../connection.php';

if(isset($_POST['ajouter'])){
        $nom=mysqli_real_escape_string($conn, $_POST['Nom']);
        $prenom=mysqli_real_escape_string($conn, $_POST['prenom']);
        $tel=$_POST['numTel'];
        $email=mysqli_real_escape_string($conn, $_POST['email']);

        $sqltest="SELECT nom_enseignant, prenom_enseignant 
                  FROM enseignant
		  WHERE nom_enseignant='$nom'
		  AND prenom_enseignant='$prenom'";

        include 'verificationFullName.php';
        include 'verificationEmail.php';
        include 'verificationTel.php';

        $sql = "INSERT INTO `enseignant`(`nom_enseignant`, `prenom_enseignant`, `email_enseignant`, `telephone_enseignant`)
        		VALUES ('$nom', '$prenom', '$email', '$tel')";
        mysqli_query($conn , $sql);
        header('location: ../Enseignants?enseignant=inserted');
}

?>