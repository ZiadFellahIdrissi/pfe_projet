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

    $sql="UPDATE `etudiant` 
          SET `code_apoge` = $code_apoge ,
            `cin` = '$cin',
            `nom` = '$nom',
            `prenom` = '$prenom',
            `date_naissance` = '$date_naissance',
            `email` = '$email',
            `id_filiere` = $id_filiere
            WHERE `etudiant`.`code_apoge` = $oldCode;";

    mysqli_query($conn , $sql);

        header('location: ../index_etudiant.php?etudiant=updated');
    }else 
        echo "dore tkhra";

?>