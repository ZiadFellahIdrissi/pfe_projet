<?php
include_once '../../../core/init.php';
$db = DB::getInstance();
$module = $_GET["module"];

$sql = "SELECT id_controle, `type`,`date`
            FROM Controle
            WHERE id_module = ?
            AND date < ( SELECT SYSDATE() )
            ORDER BY `date`";
$resultat = $db->query($sql, [$module]);
?>
<option value=''>Choisissez le type du controle</option>
<?php
$i = 1;
foreach ($resultat->results() as $row) {
?>
    <option value="<?php echo $row->id_controle ?>"><?php if ($row->type == 'controle')
                                                        echo "Controle N°".$i++ . ' ' . $row->date;
                                                    else if ($row->type == '')
                                                        echo "Exame finale Session normal";
                                                    else
                                                        echo "Exame finale Session rattrapage";
                                                    ?></option>
<?php
}
?>