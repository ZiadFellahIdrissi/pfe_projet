<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$db = DB::getInstance();

$sql = "SELECT id_salle, salle
        FROM salle
        ORDER BY id_salle";

$resultats = $db->query($sql, []);
?>

<div class="float-left" style="padding:1.5%;">
    <button type="button" class="btn btn-primary" id="ajouteSalleButton">
        + Ajouter
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
                            <div class="table-data-feature">
                                <button class="item supprimier_salle" data-toggle="tooltip" id="<?php echo $row->id_salle ?>" data-placement="top" title="Supprimer">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <button class="item Open_modifierSalle" data-toggle="tooltip" id="<?php echo $row->id_salle ?>" data-placement="top" title="Modifier">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
            <?php
                }
                echo ' </tbody>';
                echo '</table>';
            }
            ?>
