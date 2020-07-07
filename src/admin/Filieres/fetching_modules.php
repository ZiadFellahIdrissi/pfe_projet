<?php
    include '../../../core/init.php';
    $db = DB::getInstance();
    $id_filiere = $_POST["id_filiere"];
    $sql = "SELECT Module.intitule, Semestre.semestre
            FROM Module
            JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
            JOIN dispose_de ON Module.id_module = dispose_de.id_module
            WHERE dispose_de.id_filiere = ?
            ORDER BY Module.id_semestre";

    $resultat = $db->query($sql, [$id_filiere]);
?>
    <table class="table table table-borderless table-data3 mydatatable">
        <thead class="thead-dark">
        <tr>
            <th>Intitule</th>
            <th>Semestre</th>
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
                <td><?php echo $row->intitule ?></t>
                <td><?php echo $row->semestre ?></td>
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