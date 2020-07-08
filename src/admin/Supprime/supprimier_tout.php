<?php 
include_once '../../../core/init.php';

function deleteTables($table){
    $sql="DELETE from ".$table;
    DB::getInstance()->query($sql,[]);
}
deleteTables("dispose_de");
deleteTables("Controle");
deleteTables("Seance");
deleteTables("assiste");
deleteTables("Module");
deleteTables("Module");
deleteTables("Demandes");
deleteTables("Etudiant");
deleteTables("Filiere");
deleteTables("Personnel");
deleteTables("Utilisateur");

?>
<script>location.replace("../pages/");</script>