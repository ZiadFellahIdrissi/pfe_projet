<?php
include_once '../../core/init.php';
require_once '../../fonctions/tools.function.php';

$db = DB::getInstance();
if (isset($_GET["id"]) && isset($_GET['type'])) {
  $type;
	switch($_GET['type']){
    case 'releve'       : $type = "un relevé de notes"; break;
    case 'attestation'  : $type = "une attestation de scolarité"; break;
    case 'stage'        : $type = "une autorisation de stage"; break;
    case 'attestationR' : $type = "une attestation de réussite"; break;
  }
  if(demandeCheck($id, $_GET['type'], 0)){
    $sql = "UPDATE Demandes
            SET etat = ?
            WHERE id_etudiant = ?
            AND type = ?";
    $db->query($sql, [-1, $_GET['id'], $type]);
  } else {
    $sql = "INSERT INTO Demandes(id_etudiant, type, date, etat)
            VALUES(?,?,SYSDATE(),?)";
    $db->query($sql, [$_GET['id'], $type, -1]);
  }
  switch($_GET['type']){
    case 'releve'       : header("Location: ./notes/"); break;
    case 'attestation'  : header("Location: ./inscription/"); break;
    case 'stage'        : header("Location: ./stages"); break;
    case 'attestationR' : header("Location: ./notes/"); break; //hna dir fin baghi trje3 ila kant attestation de reussite
  }

}
