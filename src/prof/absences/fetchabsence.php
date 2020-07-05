<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
function getSeance($id_module){
    $db=DB::getInstance();
    $sql='SELECT id_seance, date_seance from Seance where id_module=? AND date_seance between ? and ?';
     $startWeek=  date("Y-m-d",strtotime('monday this week'));
    $endWeek =  date("Y-m-d",strtotime('sunday this week'));
    $resultat=$db->query($sql,[$id_module,$startWeek,$endWeek]);
    return $resultat; 
}
function getAbsence($id,$module){
    $db=DB::getInstance();
    $sql='SELECT assiste.id_seance from assiste join Seance on Seance.id_seance=assiste.id_seance where id_etudiant=? AND Seance.id_module=? AND Seance.date_seance between ? and ?';
     $startWeek=  date("Y-m-d",strtotime('monday this week'));
    $endWeek =  date("Y-m-d",strtotime('sunday this week'));
    $resultat=$db->query($sql,[$id,$module,$startWeek,$endWeek]);
    return $resultat; 
}
$module = $_GET['module'];
?>
<div class="table-responsive-sm">
     <form method="POST" action="ajouterAbsence.php">
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
                    $resultat =getSeance($module);
                     foreach ($resultat->results() as $row){
                        $id_seance=$row->id_seance;

                        echo $row->date_seance;
                     }
            ?></td>
                    <td style="text-align: center;"><input type="checkbox" name="absence[]" 
                        value="<?php echo $myRow->id ?>"  
                        class="form-check-input " <?php if (getAbsence($myRow->id,$module)->count()) {
                           echo "checked";
                        }  ?>></td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
    <div class="float-right" style="padding-top:9px;">
    <button type="submit"  class="btn btn-outline-success" name="valider">Valider</button></div>
    <input type="hidden" name="id_seance" value="<?php echo $id_seance ?>">
    </form>
</div>
<script>
     // $(document).ready(function() {
     //    $('.mydatatable').Tabledit({ 
     //    })
     // })   
</script>
<script src="../../../layout/js/jquery.dataTables.min.js"></script>
<script>
    $('.mydatatable').DataTable();
</script> 
<script src="../../../layout/js/DataTableCustomiser.js"></script>
