<?php
    include '../../connection.php';
    $id_module=$_GET["code"];
    $sql = "SELECT Module.id_module,Module.intitule,Module.heures_sem,Module.id_enseignant,dispose_de.coeff_controle,dispose_de.coeff_examen,Semestre.id_semestre,Filiere.id_filiere,Filiere.nom_filiere
            FROM Module
            JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
            JOIN dispose_de ON Module.id_module = dispose_de.id_module
            JOIN Filiere ON dispose_de.id_filiere = Filiere.id_filiere
            WHERE Module.id_module = $id_module";

    $resultat1=mysqli_query($conn,$sql);
    $Myrow = mysqli_fetch_array($resultat1);
    echo json_encode($Myrow);
