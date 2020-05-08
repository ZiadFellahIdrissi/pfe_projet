<div class="table-responsive-sm">
    <?php
    include '../../connection.php';
    if (isset($_GET["id_module"])) {
        $module = $_GET["id_module"];
        $type = $_GET["id_type"];

        $sql = "SELECT etudiant.code_apoge,examen.id_examen,filiere.nom_filiere,
        module.intitule,etudiant.nom,etudiant.prenom,examen.date_exame,examen.letype
        from etudiant  
        natural join examen
        NATURAL join module
        join filiere on filiere.id_filiere=etudiant.id_filiere
        where module.id_module=$module and examen.letype='$type'
        and etudiant.code_apoge not in (SELECT id_etudiant from avoir_note 
                                        NATURAL JOIN examen 
                                        Natural join module 
                                        where etudiant.code_apoge=avoir_note.id_etudiant 
                                        and examen.letype='$type'
                                        and module.id_module=$module)";

        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        if ($resultatcheck > 0) {
    ?>
            <table class="table table-bordered table-striped mydatatable">
                <thead class="thead-dark">
                    <tr>
                        <th>Etudiant</th>
                        <th>Filiere</th>
                        <th>Module</th>
                        <th>Date Examen</th>
                        <th>Type</th>
                        <th>Note</th>


                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = mysqli_fetch_assoc($resultat)) {
                    ?>
                        <tr>
                            <td><?php echo $row["nom"] . ' ' . $row["prenom"] ?></t>
                            <td><?php echo $row["nom_filiere"] ?></td>
                            <td><?php echo $row["intitule"] ?></td>
                            <td><?php echo $row["date_exame"] ?></td>
                            <td><?php echo $row["letype"] ?></td>
                            <td>
                                <form action="../Notes/ajoute_note.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="note" id="note">
                                        <input type="hidden" name="id_examen" value=<?php echo $row["id_examen"]  ?>>
                                        <input type="hidden" name="id_etudiant" value=<?php echo $row["code_apoge"]  ?>>
                                    </div>
                                </form>
                            </td>
                        </tr>
            <?php
                    }
                    echo "<tbody>";
                    echo "</table>";
                }
            }
            ?>
</div>
<script>
    $('.mydatatable').DataTable();
</script>

<!-- hada maaaaaaaaazala 5asooo l5admaa chwiya -->