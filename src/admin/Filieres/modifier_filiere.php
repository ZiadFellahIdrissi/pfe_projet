<?php 
    include '../../connection.php';
    if(isset($_POST["Modifier_inp"])){
        $id_filiere=$_POST["Modifier_inp"];
        $nom=trim(mysqli_real_escape_string($conn, $_POST["Nom"]));
        $resp_id=$_POST["Responsable_modifier"];
        $prix=$_POST['prix_modifier'];

        $sql=mysqli_query($conn, " SELECT nom_filiere, id_responsable
                                   FROM Filiere
                                   WHERE id_filiere != $id_filiere    ");

        while ($row=mysqli_fetch_assoc($sql) ){
            foreach ($row as $key => $data)
            {
                if (strcmp($row[$key], $nom)==0 || $row[$key] == $resp_id){
                    header("location: ./?inserting=failed");
                    exit();
                }
            }
        }

        mysqli_query($conn , " UPDATE Filiere
                                set id_responsable = $resp_id,
                                    nom_filiere = '$nom'
                                WHERE id_filiere = $id_filiere " );
        header("location: ./?filiere=updated");
    }
?>
