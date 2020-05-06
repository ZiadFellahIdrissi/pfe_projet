<?php 
    include '../../connection.php';

    if(isset($_POST["Modifier_inp"])){
        $filiere_id=$_POST["Modifier_inp"];
        $nom=trim(mysqli_real_escape_string($conn, $_POST["Nom"]));
        $resp_id=$_POST["Responsable_modifier"];

        $sql=mysqli_query($conn, " SELECT nom_filiere, responsable_id
                                   FROM filiere
                                   WHERE id_filiere!=$filiere_id      ");

        while ($row=mysqli_fetch_assoc($sql) ){
            foreach ($row as $key => $data)
            {
                if (strcmp($row[$key], $nom)==0 || $row[$key] == $resp_id){
                    header("location: ../pages/Filiere.php?inserting=failed");
                    exit();
                }
            }
        }
        mysqli_query($conn , " UPDATE filiere
                                set responsable_id = $resp_id,
                                    nom_filiere = '$nom'
                                WHERE id_filiere = $filiere_id " );
        header("location: ../pages/Filiere.php?filiere=updated");
    }
?>
