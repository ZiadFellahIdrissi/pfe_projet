<?php
function controles($id)
{
    $db = DB::getInstance();
    $sql = "SELECT Module.intitule, Controle.date, Controle.h_debut, TIMEDIFF(Controle.h_fin,Controle.h_debut) as duree
            from Controle
            JOIN Module on Controle.id_module = Module.id_module
            JOIN dispose_de on dispose_de.id_module = Module.id_module
            WHERE Controle.type = ?
            AND concat(Controle.date,' ',Controle.h_debut) >= ( SELECT SYSDATE() )
            AND dispose_de.id_filiere in (SELECT Etudiant.id_filiere
                                            FROM Etudiant
                                                WHERE id = ?)";
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
            where dispose_de.id_module = ? ";
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
    $sql = "SELECT date_fin,date_debut
            FROM Semestre
            ORDER BY id_semestre";
    $resultats = $db3->query($sql, []);
    return $resultats->first();
}
function getMarksByControle($id_controle, $id_etudiant)
{
    $db = DB::getInstance();
    $sql = "SELECT note
            FROM passe
            WHERE id_controle = ?
            AND id_etudiant = ?";
    $resultats = $db->query($sql, [$id_controle, $id_etudiant]);
    return $resultats->results();
}
function getInfos($id)
{
    $db = DB::getInstance();
    $sql = "SELECT *
            FROM Etudiant
            JOIN Utilisateur ON Etudiant.id = Utilisateur.id
            JOIN Filiere ON Etudiant.id_filiere = Filiere.id_filiere
            WHERE Etudiant.id = ?";
    $resultats = $db->query($sql, [$id]);
    return $resultats->first();
}
function getPersonInfo($id)
{
    $db = DB::getInstance();
    $sql = "SELECT * from Utilisateur where id=?";
    $resultats = $db->query($sql, [$id]);
    return $resultats->first();
}
function getStudentsInfo($id)
{
    $db = DB::getInstance();
    $sql = "SELECT cne,Filiere.nom_filiere,Filiere.id_filiere  from Etudiant Join Filiere on Etudiant.id_filiere=Filiere.id_filiere where id=?";
    $resultats = $db->query($sql, [$id]);
    return $resultats;
}
function getPersonnelInfo($id)
{
    $db1 = DB::getInstance();
    $sql2 = "SELECT som,`role` from Personnel where id=?";
    $resultats0 = $db1->query($sql2, [$id]);
    return $resultats0;
}
function getResponsableInfos($id_responsable)
{
    $db = DB::getInstance();
    $sql = "SELECT *
            FROM Personnel
            JOIN Utilisateur ON Personnel.id = Utilisateur.id
            JOIN Filiere ON Utilisateur.id = Filiere.id_responsable
            WHERE Personnel.id = ?";
    $resultats = $db->query($sql, [$id_responsable]);
    return $resultats->first();
}
function getEnseignantInfos($id_enseignant)
{
    $db = DB::getInstance();
    $sql = "SELECT *
            FROM Personnel
            JOIN Utilisateur ON Personnel.id = Utilisateur.id
            WHERE Personnel.id = ?";
    $resultats = $db->query($sql, [$id_enseignant]);
    return $resultats->first();
}
function getFiliereInfos($id_filiere)
{
    $db = DB::getInstance();
    $sql = "SELECT *
            FROM Filiere
            JOIN Utilisateur ON Filiere.id_responsable = Utilisateur.id
            JOIN Personnel ON Utilisateur.id = Personnel.id
            WHERE Filiere.id_filiere = ?";
    $resultats = $db->query($sql, [$id_filiere]);
    return $resultats->first();
}
function getModuleInfos($id_module)
{
    $db = DB::getInstance();
    $sql = "SELECT *
            FROM Module
            JOIN Utilisateur ON Module.id_enseignant = Utilisateur.id
            JOIN Personnel ON Utilisateur.id = Personnel.id
            JOIN dispose_de ON Module.id_module = dispose_de.id_module
            JOIN Filiere ON dispose_de.id_filiere = Filiere.id_filiere
            WHERE Module.id_module = ?";
    $resultats = $db->query($sql, [$id_module]);
    return $resultats->first();
}
function countFiliereStudents($id_filiere)
{
    $db = DB::getInstance();
    $sql = "SELECT *
            FROM Etudiant
            WHERE id_filiere = ?";
    $resultats = $db->query($sql, [$id_filiere]);
    return $resultats->count();
}
function getSeance($id_module)
{
    $db = DB::getInstance();
    $sql = 'SELECT id_seance, date_seance from Seance where id_module=? AND date_seance between ? and ?';
    $startWeek =  date("Y-m-d", strtotime('monday this week'));
    $endWeek =  date("Y-m-d", strtotime('sunday this week'));
    $resultat = $db->query($sql, [$id_module, $startWeek, $endWeek]);
    return $resultat;
}
function getAbsence($id, $module)
{
    $db = DB::getInstance();
    $sql = 'SELECT assiste.id_seance from assiste join Seance on Seance.id_seance=assiste.id_seance where id_etudiant=? AND Seance.id_module=? AND Seance.date_seance between ? and ?';
    $startWeek =  date("Y-m-d", strtotime('monday this week'));
    $endWeek =  date("Y-m-d", strtotime('sunday this week'));
    $resultat = $db->query($sql, [$id, $module, $startWeek, $endWeek]);
    return $resultat;
}
function demandeCheck($id_etudiant, $type_, $etat)
{
    $db = DB::getInstance();
    $type = "";
    switch ($type_) {
        case 'releve':
            $type = "un relevé de notes";
            break;
        case 'attestation':
            $type = "une attestation de scolarité";
            break;
        case 'stage':
            $type = "une autorisation de stage";
            break;
    }
    $sql = "SELECT id
            FROM Demandes
            WHERE id_etudiant = ?
            AND type = ?
            AND etat = ?";
    $resultats = $db->query($sql, [$id_etudiant, $type, $etat]);
    return $resultats->count();
}
function getDatesSemestre($id)
{
    $db3 = DB::getInstance();
    $sql = "SELECT date_fin,date_debut
            FROM Semestre
            where id_semestre=?";
    $resultats = $db3->query($sql, [$id]);
    return $resultats;
}

function getAdminInfo($username)
{
    $db = DB::getInstance();
    $sql = "SELECT *
               FROM Administrateur
               WHERE username = ?";
    $resultats = $db->query($sql, [$username]);
    return $resultats->first();
}
function is_there_ratt_mark_for_student($id, $id_module)
{
    $sql = "SELECT passe.id_etudiant from passe 
               join Controle on Controle.id_controle=passe.id_controle
               where passe.id_etudiant=?
              and Controle.type=?
              and Controle.id_module=?";
    return DB::getInstance()->query($sql, [$id, 'exam_finale_ratt', $id_module]);
}

function is_there_ratt_exam_for_student($id, $id_module)
{
    $sql = "SELECT passe.id_etudiant from passe 
               join Controle on Controle.id_controle=passe.id_controle
               where passe.id_etudiant=?
               and Controle.type=?
               and passe.note < ?
               and Controle.id_module=?";
    return DB::getInstance()->query($sql, [$id, 'exam_finale_normal', 12, $id_module]);
}

//=======================================================================
$max_Exame_finale = "";
$min_Exame_finale = "";
$date_Fin_Premier_Semester = getSemestre()->date_fin;
if (date('yy/m/d', time()) < $date_Fin_Premier_Semester) {
    $dateSemsetre = date_create(getDatesSemestre(2)->first()->date_fin);
    date_add($dateSemsetre, date_interval_create_from_date_string('30 days'));

    $max_Exame_finale = date_format($dateSemsetre, 'Y-m-d');
    $min_Exame_finale = getDatesSemestre(2)->first()->date_fin;
} else {
    $min_Exame_finale = getDatesSemestre(1)->first()->date_fin;
    $max_Exame_finale = getDatesSemestre(2)->first()->date_debut;
}
//====================================================================================