<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';


$date_debut_premier_semestre = $_POST["date_debut_premier_semestre"];
$date_fin_premier_semestre = $_POST["date_fin_premier_semestre"];
$date_debut_dexieme_semestre = $_POST["date_debut_dexieme_semestre"];
$date_fin_dexieme_semestre = $_POST["date_fin_dexieme_semestre"];
function updateSemster($date_debut, $date_fin, $id_semester)
{
    $sql = "UPDATE semestre set date_debut=? , date_fin=? where id_semestre=?";
    DB::getInstance()->query($sql, [$date_debut, $date_fin, $id_semester]);
}

updateSemster($date_debut_premier_semestre, $date_fin_premier_semestre, 1);
updateSemster($date_debut_dexieme_semestre, $date_fin_dexieme_semestre, 2);
?>
<script>
    location.replace("./");
</script>