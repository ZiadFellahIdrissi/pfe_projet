<?php 
include_once '../../../core/init.php';
$user = new User_prof();
$user->logout();
header("Location: ../../../index.php");