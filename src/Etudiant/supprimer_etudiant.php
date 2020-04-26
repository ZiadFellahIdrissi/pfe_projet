<?php
include '../connection.php';
$codeapoge=$_GET["id"];
echo $codeapoge;

mysqli_query($conn , "DELETE FROM etudiant where code_apoge=$codeapoge");

header('location: ../Etudiants.php?etudiant=deleted');
?>