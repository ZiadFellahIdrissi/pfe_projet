<?php
include '../connectionDB.php';
$codeapoge=$_GET["id"];
echo $codeapoge;

mysqli_query($conn , "DELETE FROM etudiant where code_apoge=$codeapoge");

header('location: ../index_etudiant.php?etudiant=deleted');
?>