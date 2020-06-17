<?php
    include '../../connection.php';
    $cin=$_GET['cin'];
    $sql = "SELECT Utilisateur.nom, Utilisateur.prenom, Utilisateur.telephone,
                    Utilisateur.email, Utilisateur.date_naissance, Etudiant.id cin, Etudiant.id_filiere, Etudiant.cne
            FROM Etudiant
            JOIN Utilisateur ON Utilisateur.id = Etudiant.id
            WHERE Etudiant.id = '$cin'";

    $resultat1=mysqli_query($conn,$sql);
    $Myrow = mysqli_fetch_array($resultat1);
    echo json_encode($Myrow);
?>