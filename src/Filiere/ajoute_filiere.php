<?php

        include '../connection.php';

        if (!empty($_POST)) {
                $nom = $_POST['Nom'];
                $resp = $_POST['Responsable'];

                $sqltest = "SELECT id_filiere, nom_filiere
                                FROM filiere 
                                where nom_filiere = '" . $nom."'";
                                
                $resultatTest = mysqli_query($conn, $sqltest);

                if (mysqli_num_rows($resultatTest) > 0) {
                        header('location: ../Filiere.php?inserting=failed');
                        exit();
                } else {
                        $sql = "INSERT INTO `filiere`(`nom_filiere`, `responsable_id`)
                                VALUES ('$nom', $resp)";
                        mysqli_query($conn, $sql);
                        header('location: ../Filiere.php?filiere=inserted');
                }
        }
?>      
