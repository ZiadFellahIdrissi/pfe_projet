<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
function fetch_Ratt_Students($module)
{
    $db = DB::getInstance();
    $sql = "SELECT Utilisateur.nom, Utilisateur.prenom, Utilisateur.id, Etudiant.cne
                FROM Utilisateur
                join Etudiant ON Etudiant.id = Utilisateur.id
                join passe on passe.id_etudiant=Etudiant.id
                JOIN Controle on Controle.id_controle=passe.id_controle
                where Controle.type=?
                and passe.note < ?
                and Controle.id_module = ? ";
    $results = $db->query($sql, ['exam_finale_normal', 12, $module]);
    return $results;
}
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
                <th>Moyenne <button id="del" class="float-right" style="color: red;">Reset</button></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT Controle.type from Controle where id_controle=?";
            if (DB::getInstance()->query($sql, [$id_controle])->first()->type == 'exam_finale_ratt')
                $results = fetch_Ratt_Students($module);
            else
                $results = fetchStudents($module);

            foreach ($results->results() as $myRow) {
            ?>
                <tr>
                    <td><?php echo $myRow->id ?></td>
                    <td><?php echo $myRow->cne ?></td>
                    <td><?php echo $myRow->prenom . ' ' . $myRow->nom ?></td>
                    <td style="width:17%; border-left: 1px solid rgba(0, 0, 0, .1)">
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
            url: 'editNotes.php?id_controle=<?php echo $id_controle; ?>',
            editButton: false,
            deleteButton: false,
            hideIdentifier: true,
            columns: {
                identifier: [0, 'CIN'],
                editable: [
                    [3, 'moyenne']
                ]
            }
        });

        $('#del').click(function() {
            if (!confirm("Tous les Notes vont être supprimé, êtes-vous sure?")) {
                return false;
            } else {
                $.ajax({
                    url: 'deleteNotes.php?id_controle=<?php echo $id_controle; ?>',
                    method: "GET",
                    dataType: "text",
                    success: function(data) {
                        window.location.replace('./?del&mod=<?php echo $module ?>');
                    }
                });
            }
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