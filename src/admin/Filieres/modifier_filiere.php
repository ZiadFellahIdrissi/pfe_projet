<?php 
    include '../../connection.php';
    if(isset($_POST['Modifier_inp'])){
        $id_filiere = $_POST['Modifier_inp'];
        $nom        = trim(mysqli_real_escape_string($conn, trim($_POST["Nom"])));
        $resp_id    = $_POST['Responsable_modifier'];
        $oldResp    = $_POST['oldResp'];
        $prix       = $_POST['prix'];
        $sql        = mysqli_query($conn, "SELECT nom_filiere, id_responsable
                                           FROM Filiere
                                           WHERE id_filiere != $id_filiere    ");

        while ($row=mysqli_fetch_assoc($sql) ){
            foreach ($row as $key => $data)
            {
                if (strcmp($row[$key], $nom)==0){
                    header("location: ./?errname");
                    exit();
                }
                if ($row[$key] == $resp_id){
                    header("location: ./?errresp");
                    exit();
                }
            }
        }

        mysqli_query($conn , "UPDATE Filiere
                                SET id_responsable = '$resp_id',
                                    nom_filiere = '$nom',
                                    prix_formation = $prix
                                WHERE id_filiere = $id_filiere ");
        mysqli_query($conn, "UPDATE Personnel
                                SET role = 'enseignant'
                                WHERE id = '$oldResp'     ");

        mysqli_query($conn, "UPDATE Personnel
                                SET role = 'responsable'
                                WHERE id = '$resp_id'      ");
                                
        header("location: ./?updated");
    }
?>
