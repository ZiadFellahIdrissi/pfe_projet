<?php 
include_once '../../../core/init.php';
$user = new User_Admin();
$user->logout();
header("Location: ../../../index.php");