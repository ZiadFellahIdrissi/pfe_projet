<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
// hnaa zide if isset b roooooooooooooooojola, hh la
$cin = $_GET["cin"];
$currentPassword = $_GET["currentPassword"];
$newPassword = $_GET["newPassword"];

$passfromdatabase = getPersonInfo($cin)->password;
if (password_verify($currentPassword,$passfromdatabase)) {
    if (!ActiveCompte::setPassword($cin, $newPassword))
        echo '<div class="alert alert-success" style="text-align: center;" role="alert">
                Mot de passe à étè bien changé.
                </div>
                <script>$("#buttonsubmit").hide();</script>';
    else
        echo "<h2>Une erreur s'est produite, Essayer encore.</h2>";
} else
    echo 'error';
