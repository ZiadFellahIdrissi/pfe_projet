<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';

//=============get variables from ajax request=====================================================
$message = $_GET["message"];
$my_id = $_GET["my_id"];
$subject = $_GET["subject"];
$id_filiere = $_GET["id_filiere"];

//=============get all student in one `filiere`====================================================
$sql0 = "SELECT etudiant.id
        from etudiant 
        where etudiant.id_filiere =  ?";
$resultat = DB::getInstance()->query($sql0, [$id_filiere]);

//=============sending messages=====================================================================
foreach ($resultat->results() as $row) {
    $sql = "INSERT INTO `messages`( `titre`, `body`, `date`, `sender_id`) VALUES (?,?,SYSDATE(),?)";
    DB::getInstance()->query($sql, [$subject, $message, $my_id]);


    $sqltest = "SELECT messages.id_message FROM `messages` ORDER by messages.id_message desc LIMIT 1";
    $id_message = DB::getInstance()->query($sqltest, [])->first()->id_message;


    $sql2 = "INSERT INTO `message_list`(`id_message`, `user_id`, `isread`) VALUES (?,?,?) ";
    DB::getInstance()->query($sql2, [$id_message, $row->id, 0]);
}

//=============End of file===========================================================================