<?php 
    include_once '../../../core/init.php';
    $db = DB::getInstance();
    if(isset($_GET["id"])){
        
        $id = $_GET["id"];

        $sql = "DELETE FROM Seance
                WHERE id_seance = ?";
        $db->query($sql,[$id]);
        echo json_encode("");
    }
?>