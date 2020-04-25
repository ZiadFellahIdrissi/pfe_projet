<?php
    include '../connection.php';
    if($_POST["codeapoger"]!=""){
        $oldCode=$_POST["codeapoger"];
        $cin = $_POST["cin"];
        $code_apoge =$_POST["codeapoge"];
        $nom =$_POST["Nom"];
        $prenom=$_POST["prenom"];
        $date_naissance=$_POST["dateN"];
        $email=$_POST["email"];
        $groupe=$_POST["groupe"];


        // if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM etudiant
        //                                          WHERE cen = $cin
        //                                          AND code_apoge = $code_apoge")))
        // {
        //     header('location: ../Etudiants.php?insert=failed');
        //     exit();
        // }

        $sql="UPDATE `etudiant` 
              SET `code_apoge` = $code_apoge ,
                `cen` = '$cin',
                `nom` = '$nom',
                `prenom` = '$prenom',
                `date_naissance` = '$date_naissance',
                `email` = '$email',
                `id_groupe` = $groupe
                WHERE `etudiant`.`code_apoge` = $oldCode;";

        mysqli_query($conn , $sql);

        header('location: ../Etudiants.php?etudiant=updated');
    }else 
        echo "dore tkhra";

?>
