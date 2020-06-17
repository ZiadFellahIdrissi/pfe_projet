<?php
include_once '../../../core/init.php';
$module = $_GET['module'];
$id = $_GET['id'];
?>
<?php
include_once '../../etudiant/fonctions/tools.function.php';
?>
<div class="table-responsive-sm">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Etudiant</th>
                <th>Controles</th>
                <th>Exame finale</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $results = fetchStudents($module);
            foreach ($results->results() as $myRow) {
            ?>
                <tr>
                    <td><?php echo $myRow->prenom . ' ' . $myRow->nom ?></td>
                    <td style="padding:0%">
                        <table class="table">
                            <?php
                            $markcontrole = getMarks('controle', $module, $myRow->id);
                            $i = 1;
                            foreach ($markcontrole as $row) {
                            ?>
                                <tr>
                                    <td style="font-weight:bold;">Controle <?php echo $i ?></td>
                                    <td width="50%" style="text-align: center;"><?php echo $row->note ?></td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </table>
                    </td>
                    <td>
                        <?php
                        $noteExamFinale = -1;
                        $markFinale = getMarks('finale',$module, $myRow->id);
                        foreach ($markFinale as $roww) {
                            echo $roww->note;
                            $noteExamFinale = $roww->note;
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php

?>