<?php
include_once '../../../core/init.php';
$db = DB::getInstance();
$id = $_GET["id"];
$sql = "SELECT Controle.id_controle,Module.intitule,Controle.date,Controle.h_debut,Controle.h_fin
        FROM Controle
        JOIN Module ON Controle.id_module = Module.id_module
        join dispose_de on Module.id_module = dispose_de.id_module
        where dispose_de.id_filiere = (SELECT id_filiere from Etudiant where id = ?)
        and( Controle.type = ? OR Controle.type = ?)";
$results = $db->query($sql, [$id, 'exam_finale_normal', 'exam_finale_ratt']);

foreach ($results->results() as $row) {
    $data[] = array(
        'id' => $row->id_controle,
        'title' => $row->intitule,
        'start' => $row->date . ' ' . $row->h_debut,
        'end' => $row->date . ' ' . $row->h_fin
    );
}
echo json_encode($data);
