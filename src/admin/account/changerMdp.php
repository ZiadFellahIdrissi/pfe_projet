<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';

$username = $_GET["username"];
$currentPassword = $_GET["currentPassword"];
$newPassword = $_GET["newPassword"];

$passfromdatabase = getAdminInfo($username)->password;

if ($currentPassword === $passfromdatabase) {
    if (!User_Admin::setAdminPassword($username, $newPassword))
        echo '<div class="alert alert-success" style="text-align: center;" role="alert">
                Mot de passe à étè bien changé.
                </div>
                <script>$("#buttonsubmit").hide();</script>';
    else
        echo "<h2>Une erreur s'est produite, Essayer encore.</h2>";
} else
    echo 'error';
