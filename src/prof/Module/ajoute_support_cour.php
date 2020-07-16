<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';

//================================================================
$lien = $_GET["lien"];
$code = $_GET["code"];
$id_module = $_GET["id_module"];
$my_id = $_GET["my_id"];

//================================================================
if (DB::getInstance()->query("SELECT support_cour from Module where id_module = ? ", [$row->id_module])->first()->support_cour == null)
    $msg = "Bonjour j'ai ajoute un lien drive pour le support de cour go check it";
else
    $msg = "Attention j'ai modifier le support de cour :)";

//================================================================
$newLien = $lien . '$' . $code;
DB::getInstance()->query("UPDATE module set Module.support_cour = ? where id_module=?", [$newLien, $id_module]);

//=============get all student in one `filiere`====================================================
$sql0 = "SELECT Etudiant.id 
        from Etudiant 
        join dispose_de on dispose_de.id_filiere = Etudiant.id_filiere 
        where dispose_de.id_module =  ?";
$resultat = DB::getInstance()->query($sql0, [$id_module]);

//=============sending messages=====================================================================
foreach ($resultat->results() as $row) {
    $sql = "INSERT INTO `messages`( `titre`, `body`, `date`, `sender_id`) VALUES (?,?,SYSDATE(),?)";
    DB::getInstance()->query($sql, [null, $msg, $my_id]);


    $sqltest = "SELECT messages.id_message FROM `messages` ORDER by messages.id_message desc LIMIT 1";
    $id_message = DB::getInstance()->query($sqltest, [])->first()->id_message;


    $sql2 = "INSERT INTO `message_list`(`id_message`, `user_id`, `isread`) VALUES (?,?,?) ";
    DB::getInstance()->query($sql2, [$id_message, $row->id, 0]);
}
//=============End of file===========================================================================


