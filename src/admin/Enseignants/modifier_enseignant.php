<?php
    include '../../connection.php';

    if(isset($_POST["Modifier"])){
        $oldCin=$_POST["oldCin"];
        $nom=mysqli_real_escape_string($conn, trim($_POST["Nom"]));
        $prenom=mysqli_real_escape_string($conn, trim($_POST["prenom"]));
        $telephone=$_POST["numTel"];
        $email=mysqli_real_escape_string($conn, trim($_POST["email"]));
        $dateN=$_POST['dateN'];
        $cin=$_POST['cin'];

        $row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT *
                                                     FROM Personnel
                                                     JOIN Utilisateur ON Personnel.id = Utilisateur.id
                                                     WHERE Personnel.id = $oldCin"));

        if ($oldCin==$cin && $row["email"]==$email && $row["telephone"]==$telephone)
            goto success;

        if ($oldCin==$cin && $row["telephone_enseignant"]==$telephone)
            goto verificationEmail;

        if($oldCin==$cin)
            goto verificationTel;

        include 'verificationCin.php';
verificationTel:
        include 'verificationTel.php';
verificationEmail:
        include 'verificationEmail.php';
success:

        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

        mysqli_query($conn, "UPDATE Utilisateur
                                SET nom = '$nom',
                                    prenom = '$prenom',
                                    id = '$cin',
                                    date_naissance = '$dateN',
                                    telephone = '$telephone',
                                    email = '$email'
                                WHERE id = $oldCin");

        mysqli_query($conn, "UPDATE Personnel
                                SET id = '$cin'
                                WHERE id = $oldCin");

		mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

        header('location: ./?enseignant=updated');

    }
?>