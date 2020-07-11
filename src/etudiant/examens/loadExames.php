<?php
include_once '../../../core/init.php';
$db = DB::getInstance();

    $sql = "SELECT Controle.id_controle,Module.intitule,Controle.date,Controle.h_debut,Controle.h_fin
            FROM Controle
            JOIN Module ON Controle.id_module = Module.id_module
            WHERE Controle.type = ? OR Controle.type = ?";
    $results = $db->query($sql, ['exam_finale_normal','exam_finale_ratt']);

    foreach ($results->results() as $row) {
        $data[] = array(
            'id' => $row->id_controle,
            'title' => $row->intitule,
            'start' => $row->date . ' ' . $row->h_debut,
            'end' => $row->date . ' ' . $row->h_fin
        );
    }
    echo json_encode($data);

?>
