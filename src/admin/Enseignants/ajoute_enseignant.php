<?php
include '../../connection.php';

if(isset($_POST['ajouter'])){
        $nom=mysqli_real_escape_string($conn, $_POST['Nom']);
        $prenom=mysqli_real_escape_string($conn, $_POST['prenom']);
        $telephone=$_POST['numTel'];
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $dateN=$_POST['dateN'];
        $cin=$_POST['cin'];

        $oldCin=0;
        include 'verificationCin.php';
        include 'verificationEmail.php';
        include 'verificationTel.php';

        mysqli_query($conn , "INSERT INTO `Utilisateur`(`id`, `nom`, `prenom`, `date_naissance`, `telephone`, `email`)
                                VALUES ($cin, '$nom', '$prenom', '$dateN', '$telephone', '$email')");

        mysqli_query($conn , "INSERT INTO `Personnel`(`id`, `role`)
                                VALUES ($cin, 'enseignant')");
        header('location: ../Enseignants?enseignant=inserted');
}

?>