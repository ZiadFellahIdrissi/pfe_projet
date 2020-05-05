<?php
    include '../../connection.php';

    if(isset($_POST["Modifier"])){
        $id_enseignant=$_POST["id_enseignant"];
        $nom=mysqli_real_escape_string($conn, $_POST["Nom"]);
        $prenom=mysqli_real_escape_string($conn, $_POST["prenom"]);
        $telephone=$_POST["numTel"];
        $email=mysqli_real_escape_string($conn, $_POST["email"]);

        $row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT *
                                                     FROM enseignant
                                                     WHERE id_enseignant=$id_enseignant"));

        if (($row["nom_enseignant"]==$nom&&$row["prenom_enseignant"]==$prenom)&&$row["email_enseignant"]==$email&&$row["telephone_enseignant"]==$telephone)
            goto success;

        if ($row["nom_enseignant"]==$nom&&$row["prenom_enseignant"]==$prenom&&$row["email_enseignant"]==$email)
            goto verificationTel;

        if ($row["nom_enseignant"]==$nom&&$row["prenom_enseignant"]==$prenom&&$row["telephone_enseignant"]==$telephone)
        {
            include 'verificationEmail.php';
            goto success;
        }

        if($row["email_enseignant"]==$email&&$row["telephone_enseignant"]==$telephone)
        {
            include 'verificationFullName.php';
            goto success;
        }

        include 'verificationEmail.php';
        include 'verificationFullName.php';
verificationTel:
        include 'verificationTel.php';
success:
        $sql="UPDATE enseignant
                SET nom_enseignant = '$nom',
                    prenom_enseignant = '$prenom',
                    telephone_enseignant = '$telephone',
                    email_enseignant = '$email'
                WHERE id_enseignant = $id_enseignant";

        mysqli_query($conn, $sql);
        header('location: ../pages/Enseignant.php?enseignant=updated');
    }
?>