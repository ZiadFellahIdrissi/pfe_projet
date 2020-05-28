<?php
    include '../../connection.php';
    if($_POST["oldCin"]!="" && isset($_POST['modifier'])){
        $oldCin = $_POST["oldCin"];
        $cin = mysqli_real_escape_string($conn, trim($_POST["cin"]));
        $cne = $_POST["cne"];
        $nom = mysqli_real_escape_string($conn, trim($_POST["Nom"]));
        $prenom = mysqli_real_escape_string($conn, trim($_POST["prenom"]));
        $date_naissance=$_POST["dateN"];
        $email=mysqli_real_escape_string($conn, trim($_POST["email"]));
        $telephone=mysqli_real_escape_string($conn, trim($_POST["tel"]));
        $filiere=$_POST["filiere"];

        $row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT *
                                                     FROM Etudiant
                                                     JOIN Utilisateur ON Etudiant.id = Utilisateur.id
                                                     WHERE Etudiant.id = $oldCin                      "));
        
        if($oldCin==$cin && $row["cne"]==$cne && $row["email"]==$email && $row["telephone"]==$telephone)
            goto success;

        if($oldCin==$cin && $row["email"]==$email && $row["telephone"]==$telephone)
            goto verificationCne;

        if($oldCin==$cin && $row["email"]==$email)
            goto verificationTel;

        if($oldCin==$cin && $row["telephone"]==$telephone){
            include 'verificationEmail.php';
            goto verificationCne;
        }

        if($oldCin==$cin)
            goto verificationEmail;
            
        include 'verificationCin.php';
verificationEmail:
        include 'verificationEmail.php';
verificationTel:
        include 'verificationTel.php';
verificationCne:
        include 'verificationCne.php';
success:

        //fetching confidentials infos
        $row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT username, password
                                                        FROM Utilisateur
                                                        WHERE Utilisateur.id = $oldCin"));
        $username=$row['username'];
        $password=$row['password'];

        //modification(insert and delete the old row because of the PK constraint thingy)
        mysqli_query($conn, "DELETE FROM Etudiant
                                WHERE id = $oldCin");
        mysqli_query($conn, "DELETE FROM Utilisateur
                                WHERE id = $oldCin");

        mysqli_query($conn, "INSERT INTO `Utilisateur`(`id`, `nom`, `prenom`, `date_naissance`, `email`, `telephone`, `username`, `password`)
                                VALUES ($cin, '$nom' , '$prenom' , '$date_naissance', '$email' , '$telephone', '$username', '$password')     ");
        mysqli_query($conn , "INSERT INTO `Etudiant`(`id`, `cne`, `id_filiere`)
                                VALUES ($cin, '$cne' , $filiere)                ");
        
        header("location: ./?etudiant=updated&idUrlFiliere=$filiere");
    }
?>
