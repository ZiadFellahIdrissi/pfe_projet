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

        if ($row["email_enseignant"]==$email && $row["telephone_enseignant"]==$telephone)
            goto success;

        if ($row["telephone_enseignant"]==$telephone)
            goto verificationEmail;
        
        include 'verificationTel.php';
verificationEmail:
        include 'verificationEmail.php';
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