<?php 
include_once '../../../core/init.php';
$db = DB::getInstance();
if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $sql = "SELECT *
            FROM Seance
            JOIN Module ON Seance.id_module = Module.id_module
            JOIN dispose_de ON Module.id_module = dispose_de.id_module
            JOIN Filiere ON dispose_de.id_filiere = Filiere.id_filiere
            AND Filiere.id_responsable = ?";
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
?>