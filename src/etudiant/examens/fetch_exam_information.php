<?php
include_once '../../../core/init.php';
if (isset($_GET["id_examen"])) {
        $id_examen = $_GET["id_examen"];
        $sql = "SELECT Controle.id_controle,Controle.type,Controle.date,Controle.h_debut,Controle.h_fin,Module.intitule,Salle.salle 
                from Controle 
                Join Module on Controle.id_module = Module.id_module 
                join Salle on Controle.salle = Salle.id_salle 
                where id_controle = ?";
        $row = DB::getInstance()->query($sql,[$id_examen])->first();
        echo json_encode($row);
}
