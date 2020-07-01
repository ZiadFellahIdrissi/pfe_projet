<?php
include_once '../../../core/init.php';
$db = DB::getInstance();
if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $sql = "SELECT Seance.date_seance, Seance.h_debut, Seance.h_fin, Seance.id_seance, Module.intitule
            FROM Seance
            JOIN Module on Module.id_module = Seance.id_module
            where Module.id_enseignant=?";
    $results = $db->query($sql, [$id]);

    foreach ($results->results() as $row) {

        $data[] = array(
            'id' => $row->id_seance,
            'title' => $row->intitule,
            'start' => $row->date_seance . ' ' . $row->h_debut,
            'end' => $row->date_seance . ' ' . $row->h_fin
        );
    }
    echo json_encode($data);
}
