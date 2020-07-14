<?php
include_once '../../../core/init.php';
$sql = "SELECT count(passe.id_etudiant) nb, Controle.type t
            from passe join Controle on passe.id_controle = Controle.id_controle
            join Module on Module.id_module = Controle.id_module
            join Semestre on Semestre.id_semestre = Module.id_semestre
            where Controle.type=? or Controle.type=?
            GROUP by  Semestre.semestre , Controle.type
            order by Semestre.semestre , Controle.type";
echo json_encode(DB::getInstance()->query($sql, ['exam_finale_normal','exam_finale_ratt'])->results());
