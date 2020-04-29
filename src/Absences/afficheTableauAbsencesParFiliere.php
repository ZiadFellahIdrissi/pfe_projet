<?php include '../connection.php';
if (!empty($_GET['id_filiere'])) {
?>
    <!-- modification -->
    <div class="modal fade" id="modifierAbsences" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <form action="Absences/modifier_absences.php" method="POST">
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

                        <div class="form-group">
                            <label for="modul">Module</label>
                            <select name="module" id="modul" class="form-control">
                                <?php
                                $sql = "SELECT id_module,intitule FROM module where id_filiere=" . $_GET['id_filiere'];
                                $resultat = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                    <option value='<?php echo $row["id_module"] ?>'><?php echo $row["intitule"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="date_modifier" class="col-form-label">Date</label>
                                    <input type="date" class="form-control" name="date" value="" id="date_modifier" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="nbHeurs_modifier" class="col-form-label">Nombre heures</label>
                                    <input type="text" class="form-control" name="nbHeurs" value="" id="nbHeurs_modifier" required>
                                </div>
                            </div>
                        </div>

                        <!-- modal footer -->
                        <div class="modal-footer">
                            <input type="hidden" id="abs_Id" name="abs_Id" value="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- modification -->
    <div class="table-responsive-sm abs absences">
        <?php

        $sql = 'SELECT nom,prenom,code_apoge,intitule,absence.date_absence,h_absence,absence.id_absence,module.id_module as module
                FROM etudiant 
                join absence on etudiant.code_apoge=absence.id_etudiant
                join module on absence.id_module=module.id_module
                where etudiant.id_filiere=' . $_GET['id_filiere'];
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
                        <th>Supprimer</th>
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
                            <td><?php echo $row["h_absence"] . ' H' ?></td>
                            <th>
                                <a href="Absences/supprimer_absences.php?id_absence=<?php echo $row['id_absence'] ?>">
                                    <img width=20 heigth=20 src="https://bit.ly/2UwQb08">
                                </a>
                            <td>
                                <input type="button" id="<?php echo $row['id_absence'] ?>" value="Modifie" class="btn btn-info btn-xs open_modifierAbsences">
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