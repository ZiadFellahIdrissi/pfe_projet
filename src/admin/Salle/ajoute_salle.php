<?php
include_once '../../../core/init.php';

$Nom_Salle = $_POST["Nom_Salle"];
if (DB::getInstance()->query("SELECT salle from Salle where salle= ?", [$Nom_Salle])->count()) {
?>
    <script>
        location.replace("./?dejeExist");
    </script>
<?php
} else
    DB::getInstance()->query("INSERT INTO `Salle`(`salle`) VALUES (?)", [$Nom_Salle]);
?>
<script>
    location.replace("./?ajoute_Avec_Succes");
</script>