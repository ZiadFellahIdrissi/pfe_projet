<?php
    include '../../connection.php';
    if(isset($_POST["ajouter"])){
        $Mysemester=$_POST['mySemester'];
        $nom=mysqli_real_escape_string($conn, $_POST["Nom"]);
        $id_enseignant=$_POST["Enseignant"];
        $id_filiere=$_POST["Filiere"];
        $heures=$_POST["Heures"];
        $coeffC=$_POST["coeffC"];
        $coeffE=$_POST["coeffE"];

        $resultatcount = mysqli_num_rows(mysqli_query($conn, "SELECT *
                                                              FROM Module
                                                              JOIN dispose_de ON Module.id_module = dispose_de.id_module
                                                              WHERE Module.intitule = '$nom'
                                                              AND dispose_de.id_filiere = $id_filiere                   "));

        if( $resultatcount>0 ){
            header("location: ./?inserting=failed&idUrlFiliere=$id_filiere"); //doesnt redirect to the "filiere"
                                                                              //despite the id being shown in the url
            exit();
        }

        mysqli_query($conn, "INSERT INTO `Module`(`intitule`, `id_enseignant`, `heures_sem`, `id_semestre`)
                                VALUES ('$nom', $id_enseignant, $heures, $Mysemester)                       ");

        mysqli_query($conn, "INSERT INTO `dispose_de`(`id_filiere`, `id_module`, `coeff_examen`, `coeff_controle`)
                                SELECT $id_filiere, id_module, $coeffE, $coeffC
                                FROM Module
                                WHERE intitule='$nom'");

        header("location: ./?module=inserted&idUrlFiliere=$id_filiere&idUrlSem=$Mysemester");
    }
?>