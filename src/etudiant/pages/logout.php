<?php
include_once '../../../core/init.php';
$user = new User_Etudiant();
$user->logout();
header("Location: ../../../");
