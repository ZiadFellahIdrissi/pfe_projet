<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$db = DB::getInstance();

$sql = "SELECT id_salle,salle
        FROM Salle
        order by id_salle";

$resultats = $db->query($sql, []);
?>

<div class="float-left" style="padding:1.5%;">
    <button type="button" class="btn btn-outline-dark" id="ajouteSalleButton">
        <span><i class="fa fa-plus"></i></span> Ajoute Salle
    </button>
</div>

<div class="table-responsive-sm salletable">
    <table class="table table table-borderless table-hover" style="font-size: 17px;">
        <thead class="thead-dark">
            <tr>
                <th>n° Salle</th>
                <th>Salle</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if ($resultats->count()) {
                foreach ($resultats->results() as $row) {
            ?>
                    <tr>
                        <td><?php echo $row->id_salle ?></td>
                        <td><b><?php echo $row->salle ?></b></td>
                        <td>
                            <button class="item supprimier_salle" data-toggle="tooltip" id="<?php echo $row->id_salle ?>" data-placement="top" title="Supprimer">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            <button class="item Open_modifierSalle" data-toggle="tooltip" id="<?php echo $row->id_salle ?>" data-placement="top" title="Modifier">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
            <?php
                }
                echo ' </tbody>';
                echo '</table>';
            }
            ?>