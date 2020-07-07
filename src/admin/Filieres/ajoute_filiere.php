<?php
    include '../../connection.php';
    if (!empty($_POST)) {
        $nom     = mysqli_real_escape_string($conn, trim($_POST['Nom']));
        $resp    = $_POST['Responsable'];
        $prix    = $_POST['prix'];

        $sqltest = mysqli_query($conn, "SELECT nom_filiere
                                        FROM Filiere");

        while($row = mysqli_fetch_assoc($sqltest)){
            if($row["nom_filiere"] === $nom){
                header('location: ./?errname');
                exit();
            }
        }

        mysqli_query($conn, "INSERT INTO `Filiere`(`nom_filiere`, `id_responsable`, `prix_formation`, `etat`)
                                VALUES ('$nom', '$resp', $prix, 1)");
                                
        mysqli_query($conn, "UPDATE Personnel
                                SET role = 'responsable'
                                WHERE id = '$resp'        ");

        header('location: ./?inserted');
    }
?>      
