<?php
if (!empty($_GET['id_filiere'])) {
    include '../../connection.php';
?>
    <!-- ======================================================================== -->
    <div class="col-6 col-md-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Ajouter un Module à ce Filiere</button>
        <br>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="../Modules/ajoute_module.php" method="POST">
                            <div class="form-group">
                                <label for="le_nom" class="col-form-label">Nom du Module</label>
                                <input type="text" class="form-control" name="Nom" id="le_nom" required>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="semesterB" class="col-form-label">Semester</label>
                                        <select name="mySemester" id="semesterB" class="form-control">
                                            <option value='<?php echo $_GET["semester"] ?>'>
                                                <?php
                                                    $sql01 = "SELECT nom_sem
                                                    FROM semester where id_sem=" . $_GET["semester"];
                                                    $resultat01 = mysqli_query($conn, $sql01);
                                                    $row01 = mysqli_fetch_assoc($resultat01);
                                                    echo $row01["nom_sem"];
                                                ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Heures" class="col-form-label">Heures de la semaine</label>
                                        <input type="number" class="form-control" name="Heures" id="Heures" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="codeapo" class="col-form-label">Enseignant du Module</label>
                                <select name="Enseignant" id="Enseignant" class="form-control" required>
                                    <option value=''></option>
                                    <?php
                                    $sql = "SELECT *
                                                FROM enseignant";
                                    $resultat = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                    ?>
                                        <option value='<?php echo $row["id_enseignant"] ?>'>
                                            <?php echo $row["prenom_enseignant"] . ' ' . $row["nom_enseignant"] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- ===================================== -->
                            <div class="modal-footer">
                                <input type="hidden" name="Filiere" value="<?php echo $_GET['id_filiere'] ?>" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modifierUnModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="../Modules/modifier_module.php" method="POST">
                        <div class="form-group">
                            <label for="le_nom2" class="col-form-label">Nom du Module</label>
                            <input type="text" class="form-control" name="Nom" id="le_nom2" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="semesterBl" class="col-form-label">Semester</label>
                                    <select name="mySemester" id="semesterBl" class="form-control">
                                            <option value="100">1ere Semester</option>
                                            <option value="200">2eme Semester</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="Heures2" class="col-form-label">Heures de la semaine</label>
                                    <input type="number" class="form-control" name="Heures" id="Heures2" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Enseignant2" class="col-form-label">Enseignant du Module</label>
                            <select name="Enseignant" id="Enseignant2" class="form-control" required>
                                <option value=''></option>
                                <?php
                                $sql = "SELECT *
                                                FROM enseignant";
                                $resultat = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                    <option value='<?php echo $row["id_enseignant"] ?>'>
                                        <?php echo $row["nom_enseignant"].' '.$row["prenom_enseignant"] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="Filiere" value="<?php echo $_GET['id_filiere'] ?>" class="form-control">
                            <input type="hidden" name="id_module" id="id_module2" value="" class="form-control">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <!-- =========feetcheing all data into a table ================= -->

    <div class="table-responsive-sm">
        <?php
        $id_filiere = $_GET["id_filiere"];
        $semester = $_GET["semester"];
        $sql = "SELECT *
                FROM module
                JOIN enseignant ON module.id_enseignant = enseignant.id_enseignant
                JOIN filiere ON module.id_filiere = filiere.id_filiere
                WHERE module.id_filiere = $id_filiere and module.semester= $semester";

        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        if ($resultatcheck > 0) {
        ?>
            <table class="table table-bordered table-striped mydatatable">
                <thead class="thead-dark">
                    <tr>
                        <th> Nom du Module</th>
                        <th>Enseignant</th>
                        <th>Heures</th>
                        <th>Options</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultat)) {
                    ?>
                        <tr  id=<?php echo $row["id_filiere"]?> >
                            <td><?php echo $row["intitule"] ?></td>
                            <td><?php echo $row["nom_enseignant"] . ' ' . $row["prenom_enseignant"] ?></td>
                            <td><?php echo $row["horaire"] ?></td>
                            <td>
                                <div class="table-data-feature" style="text-align: center">
                                    <button onclick="location.href='../Modules/supprimer_module.php?id=<?php echo $row["id_module"] ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <button data-toggle="tooltip" id="<?php echo $row["id_module"] ?>" data-toggle="modal" class="item Open_modifierUnModule" data-placement="top" title="Modifier">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                    echo "<tbody>";
                    echo "</table>";
                } 
                ?>
    </div>
<?php
}
?>
<script>
    $('.mydatatable').DataTable();
</script>
<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>