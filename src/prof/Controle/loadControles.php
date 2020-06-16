<?php 
include_once '../../../core/init.php';
$db = DB::getInstance();
if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $sql = "SELECT Controle.id_controle,Module.intitule,Controle.date,Controle.h_debut,Controle.h_fin
            FROM Controle
            JOIN Module ON Controle.id_module = Module.id_module
            WHERE Controle.type=? 
            AND Module.id_enseignant in (SELECT id
                                        FROM Personnel
                                            where id=?)";
    $results = $db->query($sql, ['controle',$id]);

    foreach ($results->results() as $row) {
        $data[] = array(
            'id' => $row->id_controle,
            'title' => $row->intitule,
            'start' => $row->date . ' ' . $row->h_debut,
            'end' => $row->date . ' ' . $row->h_fin
        );
    }
    echo json_encode($data);
}
?>