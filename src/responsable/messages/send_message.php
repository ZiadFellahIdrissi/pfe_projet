<?php 
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';

$id_prof = $_GET["id_prof"];
$message = $_GET["message"];
$my_id = $_GET["my_id"];

$sql="INSERT INTO `messages`( `titre`, `body`, `date`, `sender_id`) VALUES (?,?,SYSDATE(),?)";
DB::getInstance()->query($sql,[null ,$message,$my_id ]);


$sqltest="SELECT messages.id_message FROM `messages` ORDER by messages.id_message desc LIMIT 1";
$id_message=DB::getInstance()->query($sqltest,[])->first()->id_message;


$sql2="INSERT INTO `message_list`(`id_message`, `user_id`, `isread`) VALUES (?,?,?) ";
DB::getInstance()->query($sql2,[$id_message,$id_prof,0 ]);


?>