<?php
    include '../../connection.php';
    if (!empty($_POST)) {
        $nom = mysqli_real_escape_string($conn, $_POST['Nom']);
        $resp = $_POST['Responsable'];
        $prix = $_POST['prix'];

        $sqltest = "SELECT id_filiere, nom_filiere
                    FROM Filiere 
                    WHERE nom_filiere = '".$nom."'";
                        
        $resultatTest = mysqli_query($conn, $sqltest);

        if (mysqli_num_rows($resultatTest) > 0) {
                header('location: ./?inserting=failed');
                exit();
        } else {

                mysqli_query($conn, "INSERT INTO `Filiere`(`nom_filiere`, `id_responsable`, `prix_formation`)
                                        VALUES ('$nom', $resp, $prix)");
                                        
                mysqli_query($conn, "UPDATE Personnel
                                        SET role = 'responsable'
                                        WHERE id = $resp        ");

                header('location: ./?filiere=inserted');
        }
    }
?>      
