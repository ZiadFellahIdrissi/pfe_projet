<?php
include_once '../../core/init.php';
include_once '../../fonctions/tools.function.php';
if (isset($_POST["login"])) {
    $cin = $_POST["cin"];
    $email = strtolower($_POST["email"]);
    $username = strtolower($_POST["username"]);
    $password = $_POST["password"];
    $activer = new ActiveCompte();

    // see if the user is student or personnel
    $role = "";
    $personnel = getPersonnelInfo($cin);
    if ($personnel->count()) {
        $role = 'personnel';
    } else {
        $role = 'etudiant';
    }
    // End

    $check = $activer->checkEmail($cin, $email);
    if ($check) {
        header("Location: ./?phase2=$cin&emailerr&role=$role");
        exit();
    }
    if (!$activer->signup($cin, $email, $username, $password))
        header("Location: ./bienvenue/?cin=$cin");
    else
        header("Location: ./?phase2=$cin&err=true&role=$role");
}
