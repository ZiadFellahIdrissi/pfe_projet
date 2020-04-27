<?php 
    include '../connection.php';
    if(!empty($_GET['id_abssence'])){
        $id_abssence=$_GET['id_abssence'];
        $sql="DELETE FROM abssence where id_abssence=$id_abssence";
        mysqli_query($conn,$sql);
        header('Location: ../consulte_abssence.php?abssence=supp');
    }
?>