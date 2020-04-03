<?php
    include 'connectionDB.php';

    if(isset($_POST['ajouter'])){
        $nom=$_POST['Nom'];
        $prenom=$_POST['prenom'];
        $codeapoge=$_POST['codeapoge'];
        $cin=$_POST['cin'];
        $dateN=$_POST['dateN'];
        $email=$_POST['email'];
        $filier=$_POST['filier'];

        $sqltest="SELECT * from etudiant where code_apoge= $codeapoge or cin= '$cin'";
        $resultat=mysqli_query($conn,$sqltest);
        $resultatcount = mysqli_num_rows($resultat);

        if( $resultatcount!=0){
            header('location: index_etudiant.php?insert=faild');
            exit();
        }else{
        
        $sql="INSERT INTO `etudiant`(`code_apoge`, `cin`, `nom`, `prenom`, `date_naissance`, `email`, `id_filiere`)
         VALUES ($codeapoge,'$cin', '$nom' , '$prenom' , '$dateN', '$email' , $filier)";
        mysqli_query($conn , $sql);
        header('location: index_etudiant.php?etudiant=inserted');
        }

    }