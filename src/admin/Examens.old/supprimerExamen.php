<?php
include '../../connection.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sqlDelet = "DELETE FROM examen where id_examen=$id ";
    mysqli_query($conn,$sqlDelet);
    echo json_encode("d");
    header('Location: ../pages/consulte_Examen.php');
}
