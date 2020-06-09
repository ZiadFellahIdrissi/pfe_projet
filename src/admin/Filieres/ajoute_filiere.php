<?php
    include '../../connection.php';
    if (!empty($_POST)) {
        $nom     = mysqli_real_escape_string($conn, trim($_POST['Nom']));
        $resp    = $_POST['Responsable'];
        $prix    = $_POST['prix'];

        $sqltest = mysqli_query($conn, "SELECT id_filiere, nom_filiere
                                        FROM Filiere 
                                        WHERE nom_filiere = '".$nom."'");

        if (mysqli_num_rows($sqltest) > 0) {
                header('location: ./?errname');
                exit();
        }

        mysqli_query($conn, "INSERT INTO `Filiere`(`nom_filiere`, `id_responsable`, `prix_formation`)
                                VALUES ('$nom', $resp, $prix)");
                                
        mysqli_query($conn, "UPDATE Personnel
                                SET role = 'responsable'
                                WHERE id = $resp        ");

        header('location: ./?inserted');
    }
?>      
