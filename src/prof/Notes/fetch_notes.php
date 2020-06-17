<?php
    include_once '../../../core/init.php';
    $db = DB::getInstance();
    $module = $_GET['module'];
    $id = $_GET['id'];
?>
<?php
$sql = "SELECT Utilisateur.nom, Utilisateur.prenom, passe.note
        FROM passe
        JOIN Controle ON passe.id_controle = Controle.id_controle
        JOIN Utilisateur ON passe.id_etudiant = Utilisateur.id
        JOIN Etudiant ON Utilisateur.id = Etudiant.id
        WHERE Controle.type = ?
        AND Controle.id_module = ?
        AND Etudiant.id_filiere in (SELECT dispose_de.id_filiere
                                    FROM dispose_de
                                    JOIN Module ON dispose_de.id_module = Module.id_module
                                    WHERE Module.id_module = ?
                                    AND Module.id_enseignant = ?                          ) ";
$results = $db->query($sql, ['finale', $module, $module, $id]);
?>
<div class="table-responsive-sm">
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <th>Etudiant</th>
        <th>Examen finale</th>
    </thead>
    <tbody>
<?php
    foreach ($results->results() as $row) {
?>
        <tr>
            <td><?php echo $row->prenom.' '.$row->nom ?></td>
            <td><?php echo $row->note ?></td>
        </tr>
<?php
    }
?>

    </tbody>
</table>
</div>
<?php

?>