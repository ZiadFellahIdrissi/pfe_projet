<div class="table-responsive-sm">
    <?php
    
    $sql = "SELECT etudiant.nom,etudiant.prenom,filiere.nom_filiere,module.intitule,
     avoir_note.note,module.id_module,avoir_note.id_etudiant 
     FROM avoir_note join etudiant on avoir_note.id_etudiant=etudiant.code_apoge 
     join examen on examen.id_examen=avoir_note.id_examen 
     join module on examen.id_module=module.id_module 
     JOIN filiere on module.id_filiere=filiere.id_filiere 
     where examen.letype='Controle'
    ORDER BY avoir_note.id";

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    if ($resultatcheck > 0) {
    ?>
        <table class="table table-bordered table-striped mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>Etudiant</th>
                    <th>Filiere</th>
                    <th>Modulet</th>
                    <th>Controle</th>
                    <th>Exame Finale</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($resultat)) {
                ?>
                    <tr>
                        <td><?php echo $row["nom"].' '.$row["prenom"] ?></t>
                        <td><?php echo $row["nom_filiere"] ?></td>
                        <td><?php echo $row["intitule"] ?></td>
                        <td><?php echo $row["note"] ?></td>
                        <td>
                            <?php
                                $etudiant=$row["id_etudiant"];
                                $module=$row["id_module"];
                                $sql2="SELECT * from avoir_note
                                join examen on examen.id_examen=avoir_note.id_examen 
                                join module on examen.id_module=module.id_module
                                where id_etudiant= $etudiant and examen.letype='Exam Final' and module.id_module=$module;";
                                $row2=mysqli_fetch_assoc(mysqli_query($conn, $sql2));
                                echo $row2["note"];
                            ?>
                        </td>
                    </tr>
            <?php
                }
                echo "<tbody>";
                echo "</table>";
            }
            ?>
</div>
