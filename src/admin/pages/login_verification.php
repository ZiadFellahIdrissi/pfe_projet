<?php
    include '../../connection.php';
    include_once '../../../core/init.php';
    if (isset($_POST["login"])) {
        $user = new User_Admin();
        $login = $user->login($_POST["username"], $_POST["password"]);
        if ($login) {
            header("Location: ./");
        } else
            header("Location: ./login.php?err=invalide");
    }
?>