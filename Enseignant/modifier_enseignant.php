<?php
    include '../connectionDB.php';

    $id_enseignant=$_POST["id_enseignant"];
    $nom=$_POST["Nom"];
    $prenom=$_POST["prenom"];
    $date_naissance=$_POST["dateN"];
    $email=$_POST["email"];


    $sqltest = "SELECT nom_enseignant, prenom_enseignant FROM enseignant
                    WHERE (nom_enseignant='$nom'
                    AND prenom_enseignant='$prenom')";

    if(mysqli_num_rows(mysqli_query($conn,$sqltest))){
        header('location: ../index_enseignant.php?insert=failed');
        exit();
    }

    $sqltest2 = "SELECT email_enseignant FROM enseignant
                 WHERE email_enseignant='$email'";

    if(mysqli_num_rows(mysqli_query($conn,$sqltest2))){
        header('location: ../index_enseignant.php?insert=mailerr');
        exit();
    }

    $sql="UPDATE `enseignant` 
            SET `nom_enseignant` = '$nom',
                `prenom_enseignant` = '$prenom',
                `date_naissance_enseignant` = '$date_naissance',
                `email_enseignant` = '$email',
            WHERE `enseignant`.`id_enseignant` = $id_enseignant;";

    mysqli_query($conn , $sql);

        header('location: ../index_enseignant.php?enseignant=updated');
    }else 
        echo "dore t7wa";

?>