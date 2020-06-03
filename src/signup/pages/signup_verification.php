<?php
    include_once '../../../core/init.php';
    if (isset($_POST["login"])) {
        $cin = $_POST['cin'];
        $date = $_POST['dateN'];
        $cne = $_POST['cne'];
        $user = new User_Etudiant();
        if ($user->checkUserExistence($cin, $date, $cne)) {
            if($user->isAlreadyActivated($cin)){
                header("Location: ./?activated");
                exit();
            }

            header("Location: ./?phase2=$cin");
            exit();
        }
        header("Location: ./?err=invalide");
    }
?>