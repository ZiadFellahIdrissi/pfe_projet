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
        $id_filiere=$_POST["filier"];

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

        header("location: index_etudiant?etudiant=updated");
    }else 
        echo "dore tkhra";

?>