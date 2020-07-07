<?php
include '../../connection.php';

if(isset($_POST['ajouter'])){
        $nom       = mysqli_real_escape_string($conn, trim($_POST['Nom']));
        $prenom    = mysqli_real_escape_string($conn, trim($_POST['prenom']));
        $telephone = mysqli_real_escape_string($conn, trim($_POST['numTel']));
        $cin       = mysqli_real_escape_string($conn, trim($_POST['cin']));
        $som       = mysqli_real_escape_string($conn, trim($_POST['som']));
        $dateN     = $_POST['dateN'];
        $oldCin    = 0;

        include 'verificationCin.php';
        include 'verificationSom.php';
        include 'verificationTel.php';

        mysqli_query($conn , "INSERT INTO `Utilisateur`(`id`, `nom`, `prenom`, `date_naissance`, `telephone`, `imagepath`)
                                VALUES ('$cin', '$nom', '$prenom', '$dateN', '$telephone', 'avatar.svg')");

        mysqli_query($conn , "INSERT INTO `Personnel`(`id`, `som`, `role`)
                                VALUES ('$cin', '$som', 'enseignant')");
                                
        header('location: ./?inserted');
}

?>