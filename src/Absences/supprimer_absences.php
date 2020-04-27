<?php 
    include '../connection.php';
    if(!empty($_GET['id_absence'])){
        $id_absence=$_GET['id_absence'];
        $sql = "DELETE FROM absence
        		WHERE id_absence=$id_absence";
        mysqli_query($conn,$sql);
        header('Location: ../consulter_absences.php?absence=supp');
    }
?>