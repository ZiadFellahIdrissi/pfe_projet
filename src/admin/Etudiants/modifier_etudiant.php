<?php
    include '../../connection.php';
    if(isset($_POST["oldCin"]) && isset($_POST['modifier'])){
        $oldCin    = $_POST["oldCin"];
        $cin       = mysqli_real_escape_string($conn, trim($_POST["cin"]));
        $nom       = mysqli_real_escape_string($conn, trim($_POST["Nom"]));
        $prenom    = mysqli_real_escape_string($conn, trim($_POST["prenom"]));
        $telephone = mysqli_real_escape_string($conn, trim($_POST["tel"]));
        $cne       = $_POST["cne"];
        $dateN     = $_POST["dateN"];
        $filiere   = $_POST["filiere"];
        $row       = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *
                                                             FROM Etudiant
                                                             JOIN Utilisateur ON Etudiant.id = Utilisateur.id
                                                             WHERE Etudiant.id = $oldCin                      "));

        if($oldCin==$cin && $row["cne"]==$cne &&$row["telephone"]==$telephone)
            goto success;

        if($oldCin==$cin && $row["telephone"]==$telephone)
            goto verificationCne;

        if($oldCin==$cin)
            goto verificationTel;
            
        include 'verificationCin.php';
verificationTel:
        include 'verificationTel.php';
verificationCne:
        include 'verificationCne.php';
success:

        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

        mysqli_query($conn, "UPDATE Utilisateur
                                SET id = '$cin',
                                    nom = '$nom',
                                    prenom = '$prenom',
                                    date_naissance = '$dateN',
                                    telephone = '$telephone'
                                WHERE id = $oldCin");

        mysqli_query($conn, "UPDATE Etudiant
                                SET id = '$cin',
                                    cne = '$cne',
                                    id_filiere = $filiere
                                WHERE id = $oldCin");

        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");
        
        header("location: ./?updated&idUrlFiliere=$filiere");
    }
?>
