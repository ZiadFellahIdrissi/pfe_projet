<?php
    include_once '../../../core/init.php';
    if (isset($_POST["login"])) {
        $cin = $_POST["cin"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $user = new User_Etudiant();
        $check = $user->checkEmail($cin, $email); //check whether this email is already been used by another student(cin)
        if ($check){
            header("Location: ./?phase2&emailerr");
            exit();
        }
        $user->signup($cin, $email, $username, $password);
        header("Location: ./welcom?cin=$cin");
    }
?>