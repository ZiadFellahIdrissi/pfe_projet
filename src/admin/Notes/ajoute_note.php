<?php
    include '../../connection.php';
        $note =$_POST['note'];
        $id_etudiant=$_POST['id_etudiant'];
        $id_examen=$_POST['id_examen'];

        $sql="INSERT INTO `avoir_note`(`note`, `id_examen`, `id_etudiant`) 
         VALUES ($note , $id_examen,$id_etudiant)";
        mysqli_query($conn , $sql);

        echo $note.' '.$id_etudiant.' '.$id_examen;
        header("location: ../pages/ajoute_notes.php?note=inserted");
        

    