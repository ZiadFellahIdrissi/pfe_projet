<?php 
    include '../../connection.php';
    if(isset($_POST["Activer"])){
        $heures_sem    = $_POST["heure_act"];
        $coeffc        = $_POST["coeffC_act"];
        $coeffe        = $_POST["coeffE_act"];
        $id_enseignant = $_POST["ens_act"];
        $id_module     = $_POST["id_mod_act"];
        $id_semestre   = $_POST["sem_act"];
        $id_filiere    = $_POST["fil_act"]; 
        
        mysqli_query($conn , "UPDATE Module
                                    SET id_enseignant = '$id_enseignant',
                                        etat = 1,
                                        heures_sem    = $heures_sem
                                    WHERE id_module   = $id_module");

        mysqli_query($conn, "UPDATE dispose_de
                                SET coeff_examen   = $coeffe,
                                    coeff_controle = $coeffc
                                WHERE id_module    = $id_module");

        header("location: ./?act&idUrlFiliere=$id_filiere&idUrlSem=$id_semestre");
    }
?>
