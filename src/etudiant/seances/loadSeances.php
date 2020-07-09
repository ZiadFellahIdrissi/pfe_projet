<?php
include_once '../../../core/init.php';
$db = DB::getInstance();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT Seance.date_seance, Seance.h_debut, Seance.h_fin, Seance.id_seance, Module.intitule
            FROM Seance
            JOIN Module ON Seance.id_module = Module.id_module
            JOIN dispose_de ON Module.id_module = dispose_de.id_module
            WHERE dispose_de.id_filiere = ( SELECT id_filiere
                                            FROM Etudiant
                                            WHERE id = ? )";
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
