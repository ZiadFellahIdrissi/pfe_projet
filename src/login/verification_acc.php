<?php
    include_once '../../core/init.php';
    if (isset($_POST["submit"])) {
        $cin   = $_POST['cin'];
        $cne   = $_POST['cne'];
        $date  = $_POST['dateN'];
        $email = $_POST['email'];
        $user1 = new User_Etudiant();
        // $user2 = new User_Prof(); ylh dirha aaa!
        if ($user1->checkUserExistence($cin, $date, $cne) && $user1->checkUserEmail($cin, $email)) {
            $_sessionCin = Config::get('session/session_cin');
            Session::put($_sessionCin , $cin);
            header("Location: ./?resetPassword");
            exit();
        }

        // if($user2->checkUserExistence($cin, $date, $cne) && $user2->checkUserEmail($email, $cin)){
        //     header("Location: ./?success?$cin"); haanta biyen liya!
        // }

        header("Location: ./?restore&err=invalide");
    }
?>