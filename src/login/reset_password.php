<?php
    include_once '../../core/init.php';
    if (isset($_POST['reset'])) {
        $cin      = $_POST['cin'];
        $password = $_POST['password'];
        $user     = new User_Etudiant();
        $user->setPassword($cin, $password);
        header("Location: ../?resetsuccess");
    }
?>