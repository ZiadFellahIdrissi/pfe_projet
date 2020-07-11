<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$datesemester = getSemestre();
date('yy/m/d', time());
$db = DB::getInstance();

$id_filiere = $_GET["id_filiere"];

$sql = "SELECT Module.id_module,Module.intitule
        FROM Module
        JOIN dispose_de ON Module.id_module = dispose_de.id_module
        JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
        WHERE dispose_de.id_filiere = ?
        AND Module.etat = ? ";
        // and (select sysdate()) BETWEEN  Semestre.date_debut and  Semestre.date_fin";


$resultat = $db->query($sql, [$id_filiere, 1]);
if ($resultat->count()) {

    foreach ($resultat->results() as $row) {
    ?>
        <option class="mdls" value=<?php echo $row->id_module ?>><?php echo $row->intitule ?>
        </option>
<?php

    }
}
