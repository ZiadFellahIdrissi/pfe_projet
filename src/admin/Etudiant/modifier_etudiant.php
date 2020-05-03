<?php
    include '../../connection.php';
    if($_POST["codeapoger"]!=""){
        $oldCode=$_POST["codeapoger"];
        $cin = mysqli_real_escape_string($conn, $_POST["cin"]);
        $code_apoge =$_POST["codeapoge"];
        $nom = mysqli_real_escape_string($conn, $_POST["Nom"]);
        $prenom = mysqli_real_escape_string($conn, $_POST["prenom"]);
        $date_naissance=$_POST["dateN"];
        $email=mysqli_real_escape_string($conn, $_POST["email"]);
        $filiere=$_POST["filiere"];


        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM etudiant
                                                 WHERE cne = $cin
                                                 AND code_apoge = $code_apoge")))
        {
            header('location: ../pages/Etudiants.php?inserting=failed');
            exit();
        }

        $sql="UPDATE `etudiant` 
              SET `code_apoge` = $code_apoge ,
                `cne` = '$cin',
                `nom` = '$nom',
                `prenom` = '$prenom',
                `date_naissance` = '$date_naissance',
                `email` = '$email',
                `id_filiere` = $filiere
                WHERE `etudiant`.`code_apoge` = $oldCode;";

        mysqli_query($conn , $sql);

        header("location: ../pages/Etudiants.php?etudiant=updated&idUrlFiliere=$filiere");
    }
?>
