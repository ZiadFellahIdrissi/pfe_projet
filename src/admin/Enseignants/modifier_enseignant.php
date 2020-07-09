<?php
include '../../connection.php';
if (isset($_POST["Modifier"])) {
    $oldCin    = $_POST["oldCin"];
    $nom       = mysqli_real_escape_string($conn, trim($_POST["Nom"]));
    $prenom    = mysqli_real_escape_string($conn, trim($_POST["prenom"]));
    $telephone = mysqli_real_escape_string($conn, trim($_POST["numTel"]));
    $dateN     = $_POST['dateN'];

    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *
                                                     FROM Personnel
                                                     JOIN Utilisateur ON Personnel.id = Utilisateur.id
                                                     WHERE Personnel.id = '$oldCin'"));

    if ($row["telephone"] != $telephone)
        include 'verificationTel.php';

    mysqli_query($conn, "UPDATE Utilisateur
                                SET nom = '$nom',
                                    prenom = '$prenom',
                                    date_naissance = '$dateN',
                                    telephone = '$telephone'
                                WHERE id = '$oldCin'");

    header('location: ./?updated');
}
