<?php
include_once '../../../core/init.php';
$sql = "SELECT count(assiste.id_seance) nbAbsence, date_seance from Seance join assiste on assiste.id_seance = Seance.id_seance GROUP by date_seance";
$myrow = DB::getInstance()->query($sql, [])->results();
echo json_encode($myrow);
