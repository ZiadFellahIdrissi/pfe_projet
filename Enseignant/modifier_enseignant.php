<?php
    include '../connectionDB.php';

    if(isset($_POST["Modifier"])){
        $id_enseignant=$_POST["id_enseignant"];
        $nom=$_POST["Nom"];
        $prenom=$_POST["prenom"];
        $date_naissance=$_POST["dateN"];
        $email=$_POST["email"];

        $row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM enseignant
                                                     WHERE id_enseignant=$id_enseignant"));

        if (($row["nom_enseignant"]==$nom&&$row["prenom_enseignant"]==$prenom)&&$row["email_enseignant"]==$email)
            goto success;

        if($row["email_enseignant"]==$email&&($row["nom_enseignant"]!=$nom||$row["prenom_enseignant"]!=$prenom))
            goto verificationFullName;

        include 'verificationEmail.php';
verificationFullName:
        include 'verificationFullName.php';
success:
        $sql="UPDATE enseignant
                SET nom_enseignant = '$nom',
                    prenom_enseignant = '$prenom',
                    date_naissance_enseignant = '$date_naissance',
                    email_enseignant = '$email'
                WHERE id_enseignant = $id_enseignant";

        mysqli_query($conn,$sql);
        header('location: ../index_enseignant.php?enseignant=updated');
    }
?>