<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$my_id = $_GET["my_id"];
$id_prof = $_GET["id_prof"];

$sqltest="SELECT messages.id_message FROM `messages` ORDER by messages.id_message desc LIMIT 1";
$id_message=DB::getInstance()->query($sqltest,[])->first()->id_message;

$sql = "SELECT message_list.id_message , messages.body,messages.date , Utilisateur.nom,utilisateur.imagepath , Utilisateur.prenom 
        FROM `message_list` 
        join Messages on message_list.id_message = Messages.id_message 
        join Utilisateur on Utilisateur.id = Messages.sender_id 
        where message_list.user_id = ? and Messages.sender_id=? and message_list.id_message > ?
        order by messages.date limit 1";
if (DB::getInstance()->query($sql, [$my_id,$id_prof,$id_message-1])->count())
    echo 'yes';
else
    echo 'no';
