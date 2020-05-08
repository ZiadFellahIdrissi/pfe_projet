<?php
include '../../connection.php';

$semester = $_GET["id_semester"];
$sql = "SELECT id_module, intitule
        FROM module where id_module in (select id_module from examen)
        AND semester=$semester 
        order by intitule";

$resultat1 = mysqli_query($conn, $sql);
$show='';
while ($row = mysqli_fetch_assoc($resultat1)) {
    $id_module=$row["id_module"]; $nom_module=$row["intitule"];
    $show.="<option value=$id_module>$nom_module</option>";
}
echo "<option value='' >choise un module</option>".$show;
?>