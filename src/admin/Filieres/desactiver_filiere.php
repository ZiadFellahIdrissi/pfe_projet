<?php 
    include '../../connection.php';
    $id_filiere = $_GET["id_filiere"];
    $id_responsable = $_GET["id_responsable"];


    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

    mysqli_query($conn , "UPDATE Module
                            JOIN dispose_de ON Module.id_module = dispose_de.id_module
                            SET Module.etat = '0',
                                Module.id_enseignant = ''
                            WHERE dispose_de.id_filiere = $id_filiere");

    mysqli_query($conn, "UPDATE Personnel
                            SET role = 'enseignant'
                         WHERE id = '$id_responsable'");

    mysqli_query($conn , "UPDATE Filiere
                            SET etat = '0',
                                id_responsable = ''
                          WHERE id_filiere = $id_filiere ");

    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");
                            
    header("location: ./?desact");
?>