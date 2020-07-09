<?php
include '../../connection.php';
if (isset($_POST['ajouter'])) {
    $nom       = mysqli_real_escape_string($conn, trim($_POST['Nom']));
    $prenom    = mysqli_real_escape_string($conn, trim($_POST['prenom']));
    $cne       = mysqli_real_escape_string($conn, trim($_POST['cne']));
    $telephone = mysqli_real_escape_string($conn, trim($_POST['telephone']));
    $cin       = mysqli_real_escape_string($conn, trim($_POST['cin']));
    $dateN     = $_POST['dateN'];
    $filiere   = $_POST['filiere'];
    $oldCin    = 0;

    include 'verificationCin.php';
    include 'verificationCne.php';
    include 'verificationTel.php';

    mysqli_query($conn, "INSERT INTO `Utilisateur`(`id`, `nom`, `prenom`, `date_naissance`, `telephone`, `imagepath`)
                                VALUES ('$cin', '$nom' , '$prenom' , '$dateN', '$telephone', 'avatar.svg')");

    mysqli_query($conn, "INSERT INTO `Etudiant`(`id`, `cne`, `id_filiere`)
                                VALUES ('$cin', '$cne' , $filiere)");

    header("location: ../Etudiants?inserted&idUrlFiliere=$filiere");
}
