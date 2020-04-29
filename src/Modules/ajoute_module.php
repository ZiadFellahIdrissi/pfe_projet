<?php
    include '../connection.php';
    if(isset($_POST["ajouter"])){
        $nom=mysqli_real_escape_string($conn, $_POST["Nom"]);
        $id_enseignant=$_POST["Enseignant"];
        $id_filiere=$_POST["Filiere"];
        $heures=$_POST["Heures"];
        $sqltest="SELECT *
                  FROM module
                  WHERE intitule = '$nom'
                  AND id_filiere = $id_filiere";
        $resultat=mysqli_query($conn, $sqltest);
        $resultatcount = mysqli_num_rows($resultat);
        if( $resultatcount>0 ){
            header("location: ../Modules.php?inserting=failed&idUrlFiliere=$id_filiere");
            exit();
        }
        $sql1 = "INSERT INTO `module`(`intitule`, `id_enseignant`, `horaire`, `id_filiere`)
                    VALUES ('$nom', $id_enseignant, $heures, $id_filiere)";   //TODO: fixer le probleme ou le nom inseré
                                                                                //comporte un apostrophe
        mysqli_query($conn, $sql1);
        header("location: ../Modules.php?module=inserted&idUrlFiliere=$id_filiere");
    }
?>