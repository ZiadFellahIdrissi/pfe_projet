<?php

include '../connectionDB.php';

$id=$_GET["id"];

mysqli_query($conn , "DELETE FROM enseignant where id_enseignant=$id");

header('location: ../index_enseignant.php?enseignant=deleted');

?>