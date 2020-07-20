<?php
include_once '../../../../core/init.php';
include_once '../../../../fonctions/tools.function.php';
$id=$_GET["id"];

$sql = "SELECT COUNT(assiste.id_seance) nbabsence ,Module.intitule module
        FROM assiste 
        JOIN Seance ON assiste.id_seance = Seance.id_seance 
        JOIN Module ON Module.id_module = Seance.id_module 
        JOIN Semestre on Semestre.id_semestre = Module.id_semestre 
        WHERE assiste.id_etudiant= ? AND Semestre.id_semestre= ?
        GROUP BY intitule";

$date_debut_dexieme_Semester = getDatesSemestre(2)->first()->date_debut;
if (date('yy-m-d', time()) > $date_debut_dexieme_Semester)
    $semster = 2;
else
    $semster = 1;

$resultats = DB::getInstance()->query($sql,[$id,$semster])->results();
echo json_encode($resultats);