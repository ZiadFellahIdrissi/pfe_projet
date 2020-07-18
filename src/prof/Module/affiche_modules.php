<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$my_id = $_GET["my_id"];
?>
<div class="table-responsive-sm">
    <?php
    $date_debut_dexieme_Semester = getDatesSemestre(2)->first()->date_debut;
    if (date('yy-m-d', time()) > $date_debut_dexieme_Semester)
        $semster = 2;
    else
        $semster = 1;

    $sql = "SELECT *
                FROM Module
                JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
                JOIN dispose_de ON Module.id_module = dispose_de.id_module
                JOIN Filiere ON dispose_de.id_filiere = Filiere.id_filiere
                WHERE id_enseignant = ? and Semestre.id_semestre = ?";
    $query = DB::getInstance()->query($sql, array($my_id, $semster));
    ?>
    <table class="table table-hover table-bordered mydatatable">
        <thead class="thead-dark">
            <tr>
                <th>Module</th>
                <th>Filiere</th>
                <th>Semester</th>
                <th>Support du cour</th>
            </tr>
        </thead>
        <?php
        if ($query->count()) {
        ?>
            <tbody>
                <?php
                foreach ($query->results() as $row) {
                ?>
                    <tr>
                        <td style="font-weight: bold;"><?php echo $row->intitule ?></td>
                        <td><?php echo $row->nom_filiere ?></td>
                        <td><?php echo $row->semestre ?></td>
                        <td style="text-align: center; font-size: 23px">
                            <button class="item open_Ajoute_support" data-toggle="tooltip" data-placement="top" id="<?php echo $row->id_module ?>" title="Ajoute support de cour">
                                <?php if (DB::getInstance()->query("SELECT support_cour from Module where id_module = ? ", [$row->id_module])->first()->support_cour == null) { ?>
                                    <i class="zmdi zmdi-plus-circle-o"></i>
                                <?php } else { ?>
                                    <i class="zmdi zmdi-edit"></i>
                                <?php }  ?>
                            </button>
                        </td>
                    </tr>
            <?php
                }
                echo "<tbody>";
                echo "</table>";
            }
            ?>
</div>
<script>
    $('.mydatatable').DataTable();
</script>
<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>