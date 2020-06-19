<?php
    include '../../connection.php';
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        mysqli_query($conn , "DELETE FROM Personnel
                              WHERE id = '$id'        ");
        mysqli_query($conn , "DELETE FROM Utilisateur
                              WHERE id = '$id'        ");
        header('location: ./?deleted'); 
    }
?>
