<?php 
    include_once '../../../core/init.php';
    $db = DB::getInstance();
    if(isset($_GET["id_examen"])){
        
        $id_examen=$_GET["id_examen"];

        $sql="DELETE FROM Controle
            WHERE id_controle = ?";
        $db->query($sql,[$id_examen]);
        echo json_encode("");
    }
?>