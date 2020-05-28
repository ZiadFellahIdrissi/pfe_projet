<?php 
include '../../connection.php';
$sql="SELECT * FROM examen
join module on examen.id_module=module.id_module
 ORDER BY examen.id_examen";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);

foreach($rows as $row){

    $Thedata[] = array(
        'id'    => $row["id_examen"],
        'title' => $row["letype"]." a ".$row["intitule"]." dans " .$row["salle"],
        'start' => $row["date_exame"].' '.$row["heur_debut"],
        'end'   => $row["date_exame"].' '.$row["heur_fin"]
    );
}
echo json_encode($Thedata);
?>