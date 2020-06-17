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

                    </td>
                    <td>
        
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