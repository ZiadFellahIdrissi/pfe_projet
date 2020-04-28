<?php
    include '../connection.php';

    if(isset($_POST['ajouter'])){
        $nom=$_POST['Nom'];
        $prenom=$_POST['prenom'];
        $codeapoge=$_POST['codeapoge'];
        $cin=$_POST['cin'];
        $dateN=$_POST['dateN'];
        $email=$_POST['email'];
        $filiere=$_POST['filiere'];

        $sqltest="SELECT * from etudiant where code_apoge= $codeapoge or cne= '$cin'";
        $resultat=mysqli_query($conn,$sqltest);
        $resultatcount = mysqli_num_rows($resultat);

        if( $resultatcount!=0){
            header('location: ../Etudiants.php?insert=faild');
            exit();
        }else{
        
        $sql="INSERT INTO `etudiant`(`code_apoge`, `cne`, `nom`, `prenom`, `date_naissance`, `email`, `id_filiere`)
         VALUES ($codeapoge,'$cin', '$nom' , '$prenom' , '$dateN', '$email' , $filiere)";
        mysqli_query($conn , $sql);
        header("location: ../Etudiants.php?etudiant=inserted&idUrlFiliere=$filiere");
        }

    }