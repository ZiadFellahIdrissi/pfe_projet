<?php 
include_once '../../core/init.php';
$user = new User_Prof();
$user->logout();
header("Location: ../../../index.php");