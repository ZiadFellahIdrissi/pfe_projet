<?php 
    include '../../connection.php';
    if(isset($_POST["Activer"])){
        $id_filiere = $_POST["filiere"];
        $resp_id    = $_POST["responsable"];
        $tarif      = $_POST['tarif'];
        

        mysqli_query($conn , "UPDATE Filiere
                                    SET id_responsable = '$resp_id',
                                        etat = 1,
                                        prix_formation = $tarif
                                    WHERE id_filiere = $id_filiere ");

        mysqli_query($conn, "UPDATE Personnel
                                SET role = 'responsable'
                                WHERE id = '$resp_id'      ");

        header("location: ./?act");
    }
?>
