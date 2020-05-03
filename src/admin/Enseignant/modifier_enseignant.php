<?php
    include '../../connection.php';

    if(isset($_POST["Modifier"])){
        $id_enseignant=$_POST["id_enseignant"];
        $nom=mysqli_real_escape_string($conn, $_POST["Nom"]);
        $prenom=mysqli_real_escape_string($conn, $_POST["prenom"]);
        $telephone=$_POST["dateN"];
        $email=mysqli_real_escape_string($conn, $_POST["email"]);

        $row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM enseignant
                                                     WHERE id_enseignant=$id_enseignant"));

        if (($row["nom_enseignant"]==$nom&&$row["prenom_enseignant"]==$prenom)&&$row["email_enseignant"]==$email)
            goto success;

        if ($row["nom_enseignant"]==$nom&&$row["prenom_enseignant"]==$prenom)
            goto verificationEmail;

        if($row["email_enseignant"]==$email)
        {
            include 'verificationFullName.php';
            goto success;
        }

        include 'verificationFullName.php';
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