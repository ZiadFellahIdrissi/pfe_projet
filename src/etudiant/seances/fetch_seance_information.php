<?php
include_once '../../../core/init.php';
if (isset($_GET["id_seance"])) {
        $id_seance = $_GET["id_seance"];
        $sql = "SELECT Seance.id_seance,Seance.date_seance,Seance.h_debut,Seance.h_fin,Module.intitule,Salle.salle 
                from Seance 
                Join Module on Seance.id_module = Module.id_module 
                join Salle on Seance.salle = Salle.id_salle 
                where id_seance = ?";
        $row = DB::getInstance()->query($sql,[$id_seance])->first();
        echo json_encode($row);
}
