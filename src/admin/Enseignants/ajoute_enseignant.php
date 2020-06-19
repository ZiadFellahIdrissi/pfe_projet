<?php
include '../../connection.php';

if(isset($_POST['ajouter'])){
        $nom       = mysqli_real_escape_string($conn, trim($_POST['Nom']));
        $prenom    = mysqli_real_escape_string($conn, trim($_POST['prenom']));
        $telephone = mysqli_real_escape_string($conn, trim($_POST['numTel']));
        $cin       = mysqli_real_escape_string($conn, trim($_POST['cin']));
        $dateN     = $_POST['dateN'];
        $oldCin    = 0;

        include 'verificationCin.php';
        include 'verificationTel.php';

        mysqli_query($conn , "INSERT INTO `Utilisateur`(`id`, `nom`, `prenom`, `date_naissance`, `telephone`, `imagepath`)
                                VALUES ('$cin', '$nom', '$prenom', '$dateN', '$telephone', 'avatar.svg')");

        mysqli_query($conn , "INSERT INTO `Personnel`(`id`, `role`)
                                VALUES ('$cin', 'enseignant')");
                                
        header('location: ./?inserted');
}

?>