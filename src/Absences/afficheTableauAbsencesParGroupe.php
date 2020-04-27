<?php include '../connection.php'; 
    if (!empty($_GET['id_groupe'])) {
?>
    <div class="modal fade" id="modifierabsence" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form action="abssence/modifier_absences.php" method="POST">
                        <!-- le nom et le prenom-->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="le_nom_modifier" class="col-form-label">Nom </label>
                                    <input type="text" class="form-control" name="Nom" value="" id="le_nom_modifier" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="le_prenom_modifier" class="col-form-label">Prenom </label>
                                    <input type="text" class="form-control" name="prenom" value="" id="le_prenom_modifier" disabled>
                                </div>
                            </div>
                        </div>

                        <!-- modules -->
                        <div class="form-group">
                            <label for="modul">Module</label>
                            <select name="module" id="modul" class="form-control">
                                <?php
                                $sql = "SELECT id_module,intitule FROM module where id_groupe=".$_GET['id_groupe'];
                                $resultat = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                    <option value='<?php echo $row["id_module"] ?>'><?php echo $row["intitule"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <!--la date et nombre heurs d'abssence -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="date_modifier" class="col-form-label">Date</label>
                                    <input type="date" class="form-control" name="date" value="" id="date_modifier" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="nbHeurs_modifier" class="col-form-label">Nombre heurs</label>
                                    <input type="text" class="form-control" name="nbHeurs" value="" id="nbHeurs_modifier" required>
                                </div>
                            </div>
                        </div>

                        <!-- modal footer -->
                        <div class="modal-footer">
                            <input type="text" id="abs_Id" name="abs_Id" value="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive-sm">
<?php

        $sql = 'SELECT nom,prenom,intitule,date_abssence,h_absence,abssence.id_abssence,module.id_module as module
                FROM etudiant 
                join absence on etudiant.code_apoge=absence.id_etudiant
                join module on absence.id_module=module.id_module
                where etudiant.id_groupe=' . $_GET['id_groupe'];
        error_reporting(0);
        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        error_reporting(E_ALL);
        if ($resultatcheck > 0) {
?>
            <table class="table table-bordered table-striped mydatatable">
                <thead class="thead-dark">
                    <tr>
                        <th>Etudiant</th>
                        <th>Module</th>
                        <th>Date</th>
                        <th>Nombre heures</th>
                        <th>Supprimier</th>
                        <th>Modifier</th>
                    </tr>
                </thead>
                <tbody>
<?php

                    while ($row = mysqli_fetch_assoc($resultat)) {
?>
                        <tr>
                            <td><?php echo $row["nom"] . " " . $row["prenom"] ?></td>
                            <td><?php echo $row["intitule"] ?></td>
                            <td><?php echo $row["date_absence"] ?></td>
                            <td><?php echo $row["h_absence"] .' H' ?></td>
                            <th>
                                <a href="supprimer_absences.php?id_absence=<?php echo $row['id_abssence'] ?>">
                                    <img width=20 heigth=20 src="https://bit.ly/2UwQb08">
                                </a>
                            <td>
                                <input type="button" data-info="<?php echo $row['id_absence'] ?>" data-id="<?php echo $row["module"] ?>" id="<?php echo $_GET['id_groupe'] ?>" value="Modifie" class="btn btn-info btn-xs open_modifierabsence">
                            </td>
                            </th>
                        </tr>
<?php
}
                    echo "<tbody>";
                echo "</table> </div>";
            } else
                echo '<p class="text-warning"><b>Aucune absence dans cette groupe ..</b></p>';
            } else
                echo '<p class="text-danger"><b>Choisir un groupe ..!</b></p>';
            ?>
</div>
<!-- =========================================================================================================== -->