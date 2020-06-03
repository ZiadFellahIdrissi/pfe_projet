<?php 
include_once '../../../core/init01.php';
$user = new User_prof();
$user->logout();
header("Location: ../../index.php");