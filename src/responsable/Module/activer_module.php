<?php
include_once '../../../core/init.php';
$db = DB::getInstance();
if (isset($_POST["Activer"])) {
    $heures_sem    = $_POST["heure_act"];
    $coeffc        = $_POST["coeffC_act"];
    $coeffe        = $_POST["coeffE_act"];
    $id_enseignant = $_POST["ens_act"];
    $id_module     = $_POST["id_mod_act"];
    $id_semestre   = $_POST["sem_act"];
    $id_filiere    = $_POST["fil_act"];

    $sql = "UPDATE Module 
                SET id_enseignant = ?,
                    etat = ?,
                    heures_sem    = ?
                WHERE id_module   = ?";
    $db->query($sql, [$id_enseignant, 1, $heures_sem, $id_module]);


    $sql1 = "UPDATE dispose_de
                SET coeff_examen   = $coeffe,
                    coeff_controle = $coeffc
                WHERE id_module    = $id_module";

    $db->query($sql1, [$coeffe, $coeffc, $id_module]);

    header("location: ./");
}
