<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$module = $_GET['module'];
?>
<div class="table-responsive-sm">
    <form method="POST" action="ajouterAbsence.php" id="myform">
        <table class="table table-hover mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>CNE</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Seance</th>
                    <th>Absent(e)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $results = fetchStudents($module);
                foreach ($results->results() as $myRow) {
                ?>
                    <tr>
                        <td><?php echo $myRow->cne ?></td>
                        <td><?php echo $myRow->nom ?></td>
                        <td><?php echo $myRow->prenom ?></td>
                        <td> <?php
                                $resultat = getSeance($module);
                                foreach ($resultat->results() as $row) {
                                    $id_seance = $row->id_seance;

                                    echo $row->date_seance;
                                }
                                ?></td>
                        <td style="text-align: center;"><input type="checkbox" name="absence[]" value="<?php echo $myRow->id ?>" class="form-check-input " <?php if (getAbsence($myRow->id, $module)->count()) {
                                                                                                                                                                echo "checked";
                                                                                                                                                            }  ?>></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="float-right" style="padding-top:9px;">
            <button type="submit" class="btn btn-outline-success valider" name="valider">Valider</button></div>
        <input type="hidden" name="id_seance" value="<?php echo $id_seance ?>">
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#myform").submit(function(event) {
            if (!confirm("vous avez sure ?")) {
                event.preventDefault();
            }
        });
    });
</script>
<script src="../../../layout/js/jquery.dataTables.min.js"></script>
<script>
    $('.mydatatable').DataTable();
</script>
<script src="../../../layout/js/DataTableCustomiser.js"></script>