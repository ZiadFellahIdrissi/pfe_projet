<?php
include_once '../../../core/init.php';
$sql = "SELECT month(date_seance) mois,count(assiste.id_seance) nbAbsence
        from Seance join assiste on assiste.id_seance = Seance.id_seance
        GROUP by month(date_seance)
        ORDER by mois";
$myrow = DB::getInstance()->query($sql, [])->results();
echo json_encode($myrow);
