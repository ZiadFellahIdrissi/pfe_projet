<?php
    include '../../connection.php';
    if($_POST["codeapoger"]!="" && isset($_POST['modifier'])){
        $oldCode = $_POST["codeapoger"];
        $cne = mysqli_real_escape_string($conn, trim($_POST["cin"]));
        $code_apoge = $_POST["codeapoge"];
        $nom = mysqli_real_escape_string($conn, trim($_POST["Nom"]));
        $prenom = mysqli_real_escape_string($conn, trim($_POST["prenom"]));
        $date_naissance=$_POST["dateN"];
        $email=mysqli_real_escape_string($conn, trim($_POST["email"]));
        $filiere=$_POST["filiere"];

        $row=mysqli_num_rows(mysqli_query($conn, " SELECT *
                                                    FROM etudiant
                                                    WHERE code_apoge = $oldCode "));

        if($oldCode==$code_apoge && $row["cne"]==$cne && $row["email"]==$email)
            goto success;

        if($oldCode==$code_apoge && $row["email"]==$email)
            goto verificationCne;

        if($oldCode==$code_apoge)
            goto verificationEmail;
        
        include 'verificationCodeApogee.php';
verificationEmail:
        include 'verificationEmail.php';
verificationCne:
        include 'verificationCne.php';
success:
        $sql="UPDATE `etudiant` 
              SET `code_apoge` = $code_apoge ,
                `cne` = '$cne',
                `nom` = '$nom',
                `prenom` = '$prenom',
                `date_naissance` = '$date_naissance',
                `email` = '$email',
                `id_filiere` = $filiere
                WHERE `etudiant`.`code_apoge` = $oldCode;";

        mysqli_query($conn , $sql);

        header("location: ../Etudiants?etudiant=updated&idUrlFiliere=$filiere");
    }
?>
