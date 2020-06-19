<?php 
    include_once '../../../core/init.php';
    $db = DB::getInstance();
    if(isset($_GET["id_controle"])){
        
        $id_controle=$_GET["id_controle"];

        $sql="DELETE FROM Controle
            WHERE id_controle = ?";
        $db->query($sql,[$id_controle]);
        echo json_encode("");
    }
?>