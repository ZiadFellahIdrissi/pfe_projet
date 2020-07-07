<?php
    include '../../../core/init.php';
    $db = DB::getInstance();
    $id_filiere = $_POST["id_filiere"];
    $sql = "SELECT Etudiant.cne, Utilisateur.nom, Utilisateur.prenom
            FROM Etudiant
            JOIN Utilisateur ON Etudiant.id = Utilisateur.id
            where Etudiant.id_filiere = ?";

    $resultat = $db->query($sql, [$id_filiere]);
?>
    <table class="table table table-borderless table-data3 mydatatable">
        <thead class="thead-dark">
        <tr>
            <th>CNE</th>
            <th>Nom</th>
        </tr>
        </thead>
        <tbody>
<?php
    $totale = $resultat->count();
    if($totale){
        $i=2;
        foreach($resultat->results() as $row) {
            if($i--==0) break;
        ?>
            <tr>
                <td><?php echo $row->cne ?></t>
                <td><?php echo $row->nom.' '.$row->prenom ?></td>
            </tr>
    <?php
        }
    ?>
            <tr>
                <td colspan=2 style="text-align: center;"><span style="color: red">* </span><?php echo $totale ?> au totale.</td>
            </tr>
    <?php
    }
        echo '</tbody>';
    echo "</table>";
?>