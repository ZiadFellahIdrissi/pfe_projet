<?php
    include_once '../core/init01.php';
    if (isset($_POST["login"])) {
        $userProf = new User_Prof();
        $loginProf = $userProf->login($_POST["username"], $_POST["password"]);
        if ($loginProf) {
            if ($userProf->data()->role == 'responsable')
                header("Location: ./responsable/pages/");
            else
                header("Location: ./prof/pages/");
        }
        $User_Etudiant = new User_Etudiant();
        $loginEtudiant = $User_Etudiant->login($_POST["username"], $_POST["password"]);
        if ($loginEtudiant) 
            header("Location: ./etudiant/pages/");

        header("Location: ./login.php?err=invalide");
    }
?>