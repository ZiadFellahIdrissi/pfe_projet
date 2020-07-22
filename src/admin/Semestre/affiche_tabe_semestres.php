<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$db = DB::getInstance();

$sql = "SELECT id_semestre,date_fin,date_debut,semestre
        FROM Semestre
        order by id_semestre";

$resultats = $db->query($sql, []);
?>
<div class="table-responsive-sm">
    <table class="table table table-borderless table-hover" style="font-size: 17px;">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th>Date Debut</th>
                <th>Date Fin</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if ($resultats->count()) {
                $i = 1;
                foreach ($resultats->results() as $row) {
            ?>
                    <tr>
                        <td><?php echo $row->semestre ?></td>
                        <td><b><?php echo $row->date_debut ?></b></td>
                        <td><b><?php echo $row->date_fin ?></b></td>
                    </tr>
            <?php
                }
                echo ' </tbody>';
                echo '</table>';
            }
            ?>
            <?php
            if(date('YY-m-d' ,time()) > getDatesSemestre(2)->first()->date_fin){
            ?>
            <hr>
            <div class="float-right table-data-feature" style="padding-bottom:1.4%; padding-right:1%;">
                <button type="button" class="item" id="ModifierButton">
                    <span><i class="zmdi zmdi-edit"></i></span>
                </button>
            </div>
            <?php
            }
            ?>
