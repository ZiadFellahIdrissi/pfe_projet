<?php
include_once '../../../core/init.php';
$sql = "SELECT count(passe.id_etudiant) nb, controle.type t
            from passe join Controle on passe.id_controle = controle.id_controle
            join module on module.id_module = controle.id_module
            join semestre on semestre.id_semestre = module.id_semestre
            where controle.type=? or controle.type=?
            GROUP by  semestre.semestre , controle.type
            order by semestre.semestre , controle.type";
echo json_encode(DB::getInstance()->query($sql, ['exam_finale_normal','exam_finale_ratt'])->results());
