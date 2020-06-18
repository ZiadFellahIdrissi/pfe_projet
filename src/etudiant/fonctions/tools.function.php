<?php
include_once '../../../core/init.php';
function controles($id){
    $db=DB::getInstance();
    $sql = "SELECT Module.intitule, Controle.date, Controle.h_debut, TIMEDIFF(Controle.h_fin,Controle.h_debut) as duree
            from Controle 
            JOIN Module on Controle.id_module = Module.id_module 
            JOIN dispose_de on dispose_de.id_module = Module.id_module
            WHERE Controle.type = ?
            AND concat(Controle.date,' ',Controle.h_debut) >= ( SELECT SYSDATE() )
            AND dispose_de.id_filiere in (SELECT Etudiant.id_filiere
                                            FROM Etudiant
                                                WHERE id = ?);";
    $resultat = $db->query($sql, ['controle', $id]);
    return $resultat;
}
function fetchStudents($module)
{
    $db = DB::getInstance();
    $sql = "SELECT Utilisateur.nom, Utilisateur.prenom, Utilisateur.id, Etudiant.cne
            FROM Utilisateur
            join Etudiant ON Etudiant.id = Utilisateur.id
            JOIN dispose_de ON dispose_de.id_filiere=Etudiant.id_filiere
            where dispose_de.id_module=? ";
    $results = $db->query($sql, [$module]);
    return $results;
}
function getMarks($type, $module, $etudiant)
{
    $db1 = DB::getInstance();
    $sql = "SELECT note
            FROM passe
            JOIN Controle ON Controle.id_controle = passe.id_controle
            WHERE passe.id_etudiant = ?
            AND Controle.type = ?
            AND Controle.id_module = ?
            ORDER BY Controle.date";

    $resultats = $db1->query($sql, [$etudiant, $type, $module]);
    return $resultats->results();
}
function getCoiffissient($module)
{
    $db2 = DB::getInstance();
    $sql = "SELECT *
            FROM dispose_de
            WHERE id_module = ?";
    $resultats = $db2->query($sql, [$module]);
    return $resultats->first();
}
function getSemestre()
{
    $db3 = DB::getInstance();
    $sql = "SELECT date_fin
            FROM Semestre
            ORDER BY semestre";
    $resultats = $db3->query($sql, []);
    return $resultats->first();
}
function getMarksByControle($id_controle, $id_etudiant){
    $db = DB::getInstance();
    $sql = "SELECT note
            FROM passe
            WHERE id_controle = ?
            AND id_etudiant = ?";
    $resultats = $db->query($sql, [$id_controle, $id_etudiant]);
    return $resultats->results();
}
?>