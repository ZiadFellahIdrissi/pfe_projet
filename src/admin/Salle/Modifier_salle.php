<?php
include_once '../../../core/init.php';
$salle = $_POST["Nom_SalleModifier"];
$id_salle = $_POST["id_salle"];

if (DB::getInstance()->query("SELECT salle from salle where salle= ?", [$salle])->count()) {
?>
    <script>
        location.replace("./?dejeExist");
    </script>
<?php
} else
    $sql = "UPDATE salle set salle = ? where id_salle = ? ";

DB::getInstance()->query($sql, [$salle, $id_salle]);

?>
<script>
    location.replace("./?modifie_Avec_Succes");
</script>