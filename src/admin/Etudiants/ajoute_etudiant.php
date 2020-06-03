<?php
    include '../../connection.php';
    if(isset($_POST['ajouter'])){
        $nom=mysqli_real_escape_string($conn, $_POST['Nom']);
        $prenom=mysqli_real_escape_string($conn, $_POST['prenom']);
        $cne=mysqli_real_escape_string($conn, $_POST['cne']);
        $cin=$_POST['cin'];
        $dateN=$_POST['dateN'];
        $telephone=$_POST['telephone'];
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $filiere=$_POST['filiere'];

        $oldCin = 0; //hada ghy3wna bch nkhdmo b dok les script dyl verification(modification)
        include 'verificationCin.php';
        include 'verificationCne.php';
        include 'verificationEmail.php';
        include 'verificationTel.php';


        $sql = "INSERT INTO `Utilisateur`(`id`, `nom`, `prenom`, `date_naissance`, `email`, `telephone`)
                    VALUES ($cin, '$nom' , '$prenom' , '$dateN', '$email' , '$telephone')";
        mysqli_query($conn , $sql);

        $sql = "INSERT INTO `Etudiant`(`id`, `cne`, `id_filiere`)
                VALUES ($cin, '$cne' , $filiere)";
        mysqli_query($conn , $sql);

        header("location: ../Etudiants?etudiant=inserted&idUrlFiliere=$filiere");
    }
?>