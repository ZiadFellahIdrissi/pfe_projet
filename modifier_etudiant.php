<?php
    include 'connectionDB.php';
    if($_POST["codeapoger"]!=""){
        $oldCode=$_POST["codeapoger"];
        $cin = $_POST["cin"];
        $code_apoge =$_POST["codeapoge"];
        $nom =$_POST["Nom"];
        $prenom=$_POST["prenom"];
        $date_naissance=$_POST["dateN"];
        $email=$_POST["email"];
        $id_filiere=$_POST["fil"];


        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM etudiant
                                                 WHERE cin = $cin
                                                 AND code_apoge = $code_apoge")))
        {
            header('location: index_etudiant.php?insert=failed');
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

        header('location: index_etudiant.php?etudiant=updated');
    }else 
        echo "dore tkhra";

?>