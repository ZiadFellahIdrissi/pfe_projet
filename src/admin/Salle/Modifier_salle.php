<?php
include_once '../../../core/init.php';
$salle = $_POST["Nom_SalleModifier"];
$id_salle = $_POST["id_salle"];

if (DB::getInstance()->query("SELECT salle from Seance where salle = ?", [$id_salle])->count()) {
?>
    <script>
        location.replace("./?pas_autorise");
    </script>
<?php
} else if (DB::getInstance()->query("SELECT salle from Controle where salle = ?", [$id_salle])->count()) {
?>
    <script>
        location.replace("./?pas_autorise");
    </script>
<?php
} else if (DB::getInstance()->query("SELECT salle from salle where salle= ?", [$salle])->count()) {
?>
    <script>
        location.replace("./?dejeExist");
    </script>
<?php
} else {
    DB::getInstance()->query("UPDATE salle set salle = ? where id_salle = ? ", [$salle, $id_salle]);
?>
    <script>
        location.replace("./?modifie_Avec_Succes");
    </script>
<?php
}
?>
