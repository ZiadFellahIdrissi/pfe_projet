<?php
include_once '../../../core/init.php';
include_once '../../etudiant/fonctions/tools.function.php';
$module = $_GET['module'];
$id_controle = $_GET['id_controle'];
?>
<div class="table-responsive-sm">
    <table class="table table-hover mydatatable">
        <thead class="thead-dark">
            <tr>
                <th>CIN</th>
                <th>CNE</th>
                <th>Nom</th>
                <th>Moyenne <button id="del" class="float-right" style="color: red;">DEL</button></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $results = fetchStudents($module);
            foreach ($results->results() as $myRow) {
            ?>
                <tr>
                    <td><?php echo $myRow->id ?></td>
                    <td><?php echo $myRow->cne ?></td>
                    <td><?php echo $myRow->prenom . ' ' . $myRow->nom ?></td>
                    <td>
                        <?php
                        $noteExamFinale = -1;
                        $markFinale = getMarksByControle($id_controle, $myRow->id);
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
<script>

    $(document).ready(function() {
        $('.mydatatable').Tabledit({
            url: 'editNotes.php?id_controle=<?php echo $id_controle; ?>&module=<?php echo $module; ?>',
            editButton: false,
            deleteButton: false,
            hideIdentifier: true,
            columns: {
                identifier: [0, 'CIN'],
                editable: [[3, 'moyenne']]
            }
        });

        $('#del').click(function() {
            $.ajax({
                url: 'deleteNotes.php?id_controle=<?php echo $id_controle; ?>',
                method: "GET",
                dataType: "text",
                success: function(data) {
                    window.location.reload(false);
                }
            });
        });
    });

</script>
<script src="../../../layout/js/jquery.dataTables.min.js"></script>
<script>
    $('.mydatatable').DataTable();
</script>
<script src="../../../layout/js/DataTableCustomiser.js"></script>

<?php

?>