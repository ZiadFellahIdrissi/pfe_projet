<?php
    include_once '../../../core/init.php';
    $db = DB::getInstance();

    $module = $_GET["module"];
    $datecontrole = $_GET["dateExames"];
    $heur_debut = $_GET["heur_debut"];
    $heur_fin = $_GET["heur_fin"];

    $sql = "SELECT id_module
            FROM Controle
            WHERE `date` = ?
            AND id_module = $module";

    if ($db->query($sql, [$datecontrole])->count()) {
        $error="Vous pouvez pas ajouter plusieurs controles en meme jour!";
        $r=array("error"=>$error);
        echo json_encode($r);
        exit();
    }

    $sql = "SELECT id_module
                FROM Controle
                WHERE id_module = ?
                AND `date` = ?
                AND h_debut = ?";
    
    if ($db->query($sql, [$module, $datecontrole, $heur_debut])->count()) {
        $error="impoo";
        $r=array("error"=>$error);
        echo json_encode($r);
    } else {
        $sql = "INSERT INTO `Controle`( `type`, `date`, `h_debut`, `h_fin`, `id_module`)
                VALUES (?,?,?,?,?)";
        $db->query($sql, ['examfinale', $datecontrole, $heur_debut, $heur_fin, $module]);

        echo json_encode([]);
    }
?>