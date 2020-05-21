<?php
    include '../../connection.php';
    if (!empty($_POST)) {
        $nom = mysqli_real_escape_string($conn, $_POST['Nom']);
        $resp = $_POST['Responsable'];

        $sqltest = "SELECT id_filiere, nom_filiere
                    FROM filiere 
                    where nom_filiere = '" . $nom."'";
                        
        $resultatTest = mysqli_query($conn, $sqltest);

        if (mysqli_num_rows($resultatTest) > 0) {
                header('location: ../Filieres?inserting=failed');
                exit();
        } else {
                $sql = "INSERT INTO `filiere`(`nom_filiere`, `responsable_id`)
                        VALUES ('$nom', $resp)";
                mysqli_query($conn, $sql);
                header('location: ../Filieres?filiere=inserted');
        }
    }
?>      
