<?php
    include '../connection.php';

    if(isset($_POST["ajouter"])){
        $nom=$_POST["Nom"];
        $id_enseignant=$_POST["Enseignant"];
        $id_filiere=$_POST["Filiere"];
        $heures=$_POST["Heures"];

        $sqltest="SELECT *
                  FROM module
                  WHERE intitule = '$nom'
                  AND id_filiere = $id_filiere";
        $resultat=mysqli_query($conn,$sqltest);
        $resultatcount = mysqli_num_rows($resultat);

        if( $resultatcount!=0){
            header('location: ../Modules.php?insert=failed');
            exit();
        }

        $sql="INSERT INTO `Module`(`intitule`, `id_enseignant`, `horaire`, `id_filiere`)
                VALUES ('$nom', $id_enseignant, $heures, $id_filiere)";
        mysqli_query($conn, $sql);
        header('location: ../Modules.php?etudiant=inserted');
    }
?>