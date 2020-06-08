<?php
    include_once '../../core/init.php';
    if (isset($_POST["login"])) {
        $cin = $_POST["cin"];
        $email = strtolower($_POST["email"]);
        $username = $_POST["username"];
        $password = $_POST["password"];
        $user = new User_Etudiant();
        $check = $user->checkEmail($cin, $email); //check whether this email is already been used by another student(cin)
        if ($check){
            header("Location: ./?phase2&emailerr");
            exit();
        }
        if(!$user->signup($cin, $email, $username, $password))
            header("Location: ./welcome.php?cin=$cin");
        else    
            header("Location: ./?phase2&err=true");
    }
?>