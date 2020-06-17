<?php
    include '../../connection.php';
    if(isset($_POST["Modifier"])){
        $oldCin    = $_POST["oldCin"];
        $nom       = mysqli_real_escape_string($conn, trim($_POST["Nom"]));
        $prenom    = mysqli_real_escape_string($conn, trim($_POST["prenom"]));
        $telephone = mysqli_real_escape_string($conn, trim($_POST["numTel"]));
        $cin       = mysqli_real_escape_string($conn, trim($_POST['cin']));
        $dateN     = $_POST['dateN'];

        $row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT *
                                                     FROM Personnel
                                                     JOIN Utilisateur ON Personnel.id = Utilisateur.id
                                                     WHERE Personnel.id = '$oldCin'"));

        if ($oldCin==$cin  && $row["telephone"]==$telephone)
            goto success;

        if($oldCin==$cin)
            goto verificationTel;

        include 'verificationCin.php';
verificationTel:
        include 'verificationTel.php';
success:

        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

        mysqli_query($conn, "UPDATE Utilisateur
                                SET nom = '$nom',
                                    prenom = '$prenom',
                                    id = '$cin',
                                    date_naissance = '$dateN',
                                    telephone = '$telephone'
                                WHERE id = '$oldCin'");

        mysqli_query($conn, "UPDATE Personnel
                                SET id = '$cin'
                                WHERE id = '$oldCin'");

		mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

        header('location: ./?updated');
    }
?>