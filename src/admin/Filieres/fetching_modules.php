<?php
    include '../../connection.php';
    $id_filiere = $_POST["id_filiere"];
    $sql = "SELECT Module.intitule, Semestre.semestre
            FROM Module
            JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
            JOIN dispose_de ON Module.id_module = dispose_de.id_module
            WHERE dispose_de.id_filiere = $id_filiere
            ORDER BY Module.id_semestre";

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    if($resultatcheck>0){
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

        while ($row = mysqli_fetch_assoc($resultat)) {
        ?>
            <tr>
                <td><?php echo $row["intitule"] ?></t>
                <td><?php echo $row["semestre"] ?></td>
            </tr>
    <?php
        }
        echo '</tbody>';
        echo "</table>";
    }
?>