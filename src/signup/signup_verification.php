<?php
include_once '../../core/init.php';
if (isset($_POST["login"])) {
    $cin = $_POST['cin'];
    $date = $_POST['dateN'];
    $cne = $_POST['cne'];
    $som = $_POST['som'];
    $activer = new ActiveCompte();
    if (isset($_POST['cne']) && trim($_POST['cne']) !== "") {
        echo 'hada rahe etudiant';
        if ($activer->checkStudentExistence($cin, $date, $cne)) {
            if ($activer->isAlreadyActivated($cin)) {
                header("Location: ./?activated&role=etudiant");
                exit();
            }
            header("Location: ./?phase2=$cin&role=etudiant");
            exit();
        }
        header("Location: ./?err=invalide&role=etudiant");
    }
    else{
        if ($activer->checkProfExistence($cin, $date, $som)) {
            if ($activer->isAlreadyActivated($cin)) {
                header("Location: ./?activated&role='personnel'");
                exit();
            }
            header("Location: ./?phase2=$cin&role='personnel'");
            exit();
        }
        header("Location: ./?err=invalide&role='personnel'");
    }
}
