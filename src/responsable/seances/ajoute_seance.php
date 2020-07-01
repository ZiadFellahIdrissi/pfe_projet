<?php
    include_once '../../../core/init.php';
    $db = DB::getInstance();

    $module = $_GET["module"];
    $date = $_GET["date"];
    $salle = $_GET["salle"];
    $heure_debut = $_GET["heure_debut"];
    $heure_fin = $_GET["heure_fin"];

    // $sql = "SELECT id_module
    //         FROM Controle
    //         WHERE `date` = ?
    //         AND id_module = $module";

    // if ($db->query($sql, [$datecontrole])->count()) {
    //     $error="Vous pouvez pas ajouter plusieurs controles en meme jour!";
    //     $r=array("error"=>$error);
    //     echo json_encode($r);
    //     exit();
    // }

    // $sql = "SELECT id_module
    //             FROM Controle
    //             WHERE id_module = ?
    //             AND `date` = ?
    //             AND h_debut = ?";
    
    // if ($db->query($sql, [$module, $datecontrole, $heure_debut])->count()) {
    //     $error="impoo";
    //     $r=array("error"=>$error);
    //     echo json_encode($r);
    // } else {
        $sql = "INSERT INTO `Seance`(`h_debut`, `h_fin`, `date_seance`, `salle`, `id_module`)
                VALUES (?,?,?,?,?)";
        $db->query($sql, [$heure_debut, $heure_fin, $date, $salle, $module]);

        echo json_encode([]);
    // }
?>