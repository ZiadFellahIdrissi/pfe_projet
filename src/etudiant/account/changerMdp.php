<?php
include_once '../../../core/init.php';
include_once '../fonctions/tools.function.php';
// hnaa zide if isset b roooooooooooooooojola
$cin = $_GET["cin"];
$currentPassword = $_GET["currentPassword"];
$newPassword = $_GET["newPassword"];

$passfromdatabase = getPersonInfo($cin)->password;

if ($currentPassword === $passfromdata!base) {
    if (ActiveCompte::setPassword($cin, $newPassword))
        echo '<br>' . '<div class="alert alert-success" style="text-align: center;" role="alert">
                            mdp ete changer
                        </div>';
    else
        echo '<h2>try again</h2>';
} else
    echo '<br>' . '<div class="alert alert-danger" style="text-align: center;" role="alert">
                        mdp inccorect
                    </div>';
