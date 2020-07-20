<?php
include_once '../../../../core/init.php';
include_once '../../../../fonctions/tools.function.php';
$id=$_GET["id"];

$sql = "SELECT Seance.date_seance,Module.intitule from assiste
join Seance on assiste.id_seance = Seance.id_seance
join Module on Module.id_module = Seance.id_module
join Semestre on Semestre.id_semestre = Module.id_semestre
where assiste.id_etudiant=? and Semestre.id_semestre=?
ORDER BY date_seance";


?>
<div class="table-responsive-sm">
    <?php
    $date_debut_dexieme_Semester = getDatesSemestre(2)->first()->date_debut;
    if (date('yy-m-d', time()) > $date_debut_dexieme_Semester)
        $semster = 2;
    else
        $semster = 1;
    $resultat = DB::getInstance()->query($sql,[$id,$semster]);
    ?>
    <table class="table table-hover mydatatable" style="font-size: 15px;">
        <thead class="thead-dark">
            <tr>
                <th>Module</th>
                <th>Date</th>
            </tr>
        </thead>
        <?php
        if ($resultat->count()) {
        ?>
            <tbody>
                <?php
                foreach ($resultat->results() as $row) {
                ?>
                    <tr>
                        <td style="font-weight: bold;"><?php echo $row->intitule ?></td>
                        <td style="text-align: center; "><?php echo $row->date_seance ?></td>
                    </tr>
            <?php
                }
                echo "<tbody>";
                echo "</table>";
            }
            ?>
</div>
<script src="../../../layout/js/jquery.dataTables.min.js"></script>
<script>
    $('.mydatatable').DataTable();
</script>
<script src="../../../layout/js/DataTableCustomiser.js"></script>
