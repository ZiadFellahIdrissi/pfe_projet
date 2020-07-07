<?php
include_once '../../core/init.php';
if (isset($_POST["submit"])) {
    $cin   = $_POST['cin'];
    $cne   = $_POST['cne'];
    $date  = $_POST['dateN'];
    $email = $_POST['email'];
    $som = $_POST['som'];
    $activer = new ActiveCompte();
    if (isset($_POST['cne']) && trim($_POST['cne']) !== "") {
        if ($activer->checkStudentExistence($cin, $date, $cne) && $activer->checkUserEmail($cin, $email)) {
            $_sessionCin = Config::get('session/session_cin');
            Session::put($_sessionCin, $cin);
            header("Location: ./?role=etudiant&resetPassword");
            exit();
        } else {
            header("Location: ./?restore&err&role=etudiant");
        }
    } else {
        if ($activer->checkProfExistence($cin, $date, $som) && $activer->checkUserEmail($cin, $email)) {
            $_sessionCin = Config::get('session/session_cin');
            Session::put($_sessionCin, $cin);
            header("Location: ./?role=personnel&resetPassword");
            exit();
        } else {
            header("Location: ./?restore&err&role=personnel");
        }
    }
}
