<?php 
include_once '../../../core/init.php';

function deleteTables($table){
    $sql="DELETE from ".$table;
    DB::getInstance()->query($sql,[]);
}
deleteTables("dispose_de");
deleteTables("passe");
deleteTables("Controle");
deleteTables("assiste");
deleteTables("Seance");
deleteTables("Module");
deleteTables("Demandes");
deleteTables("messag_list");
deleteTables("messages");
deleteTables("Etudiant");
deleteTables("Filiere");
deleteTables("Personnel");
deleteTables("Utilisateur");

?>
<script>location.replace("../pages/");</script>