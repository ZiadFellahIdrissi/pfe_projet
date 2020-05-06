<?php include '../../connection.php';
if (!empty($_GET['id_filiere'])) {
?>
    <!-- modification -->
    <div class="modal fade" id="modifierAbsences" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <form action="../Absences/modifier_absences.php" method="POST">
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
                        <!-- <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="semesterBl" class="col-form-label">Semester</label>
                                    <select name="mySemester" id="semesterBl" class="form-control">
                                        <option value="100">1ere Semester</option>
                                        <option value="200">2eme Semester</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->

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
        $semester = $_GET["semester"];
        $filiere = $_GET['id_filiere'];

        $sql = "SELECT nom,prenom,code_apoge,intitule,absence.date_absence,h_absence,absence.id_absence,module.id_module as module
                FROM etudiant 
                join absence on etudiant.code_apoge=absence.id_etudiant
                join module on absence.id_module=module.id_module
                where etudiant.id_filiere=$filiere and module.semester=$semester";
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
                        <th>Options</th>
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
                            <td>
                                <div class="table-data-feature" style="text-align: center">
                                    <button data-toggle="tooltip" id="<?php echo $row['id_absence'] ?>" data-toggle="modal" class="item open_modifierAbsences" data-placement="top" title="Modifier">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <a href="../Absences/supprimer_absences.php?id_absence=<?php echo $row['id_absence'] ?>">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Supprimier">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </a>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
            <?php
                    }
                    echo "<tbody>";
                    echo "</table> </div>";
                } else
                    echo '<div class="alert alert-warning" role="alert">
                            <b>Acun absnece dans cette filiere</b>
                        </div>';
            } else
                echo '<p class="text-danger"><b>Choisir un groupe ..!</b></p>';
            ?>
    </div>
    <script>
        $('.mydatatable').DataTable();
    </script>
    <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
    <!-- =========================================================================================================== -->