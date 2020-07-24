<?php
    include_once '../../core/init.php';
    if (isset($_POST["login"])) {
        $user = new User_Etudiant();
        $login = $user->login($_POST["username"], $_POST["password"]);
        if ($login) {
            header("Location: ../etudiant/");
            exit();
        }
        
        $user = new User_Admin();
        $login = $user->login($_POST["username"], $_POST["password"]);
        if ($login){
            header("Location: ../admin/");
            exit();
        }

        $user = new User_Prof();
        $login = $user->login($_POST["username"], $_POST["password"]);
        if ($login) {
            if ($userProf->data()->role == 'responsable')
                header("Location: ../responsable/");
            else
                header("Location: ../prof/");
            exit();
        }

        

        header("Location: ../login?err");
        exit();
    }
?>
    