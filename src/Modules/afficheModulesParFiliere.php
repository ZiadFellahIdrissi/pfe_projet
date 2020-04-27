<?php
if (!empty($_GET['id_filiere'])) {
    include '../connection.php';
?>
    <!-- ======================================================================== -->
    <!-- ===============un button pour ajoute un etudiant======================= -->
    <div class="col-6 col-md-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Ajouter un Module à ce Filiere</button>
        <br>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="Modules/ajoute_module.php" method="POST">
                            <!-- =======================bloc de le nom et le prenom======================= -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="le_nom" class="col-form-label">Nom du Module</label>
                                        <input type="text" class="form-control" name="Nom" id="le_nom" required>
                                    </div>
                                </div>
                            </div>
                            <!-- ===================fin bloc de le nom et le prenom======================= -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Heures" class="col-form-label">Heures de la semaine</label>
                                        <input type="number" class="form-control" name="Heures" id="Heures" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="codeapo" class="col-form-label">Enseignant du Module</label>
                                        <select name="Enseignant" id="Enseignant" class="form-control" required>
                                            <option value=''></option>
                                            <?php
                                                $sql = "SELECT *
                                                        FROM Enseignant";
                                                $resultat = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($resultat)) {
                                            ?>
                                                    <option value='<?php echo $row["id_enseignant"] ?>'>
                                                        <?php echo $row["prenom_enseignant"].' '.$row["nom_enseignant"] ?>
                                                    </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- ===================================== -->
                            <div class="modal-footer">
                                <input type="hidden" name="Filiere" value="<?php echo $_GET['id_filiere'] ?>" class="form-control" >
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====================================================================================================================================================== -->
    <!-- =============================le bloc de botton pour ajoute un etudiant terminer======================================================================= -->

    <!-- =====================================formilar pour modifier un etudiant========================================== -->
    <div class="modal fade" id="modifierUnEtudiant" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <form action="Etudiant/modifier_etudiant.php" method="POST">
                        <!-- le nom et le prenom-->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="le_nom_modifier" class="col-form-label">Nom </label>
                                    <input type="text" class="form-control" name="Nom" value="" id="le_nom_modifier" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="le_prenom_modifier" class="col-form-label">Prenom </label>
                                    <input type="text" class="form-control" name="prenom" value="" id="le_prenom_modifier" required>
                                </div>
                            </div>
                        </div>

                        <!--code apuge et le cne -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="codeapoge_modifier" class="col-form-label">Code apogee</label>
                                    <input type="text" class="form-control" name="codeapoge" value="" id="codeapoge_modifier" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="cin_modifier" class="col-form-label">Cne</label>
                                    <input type="text" class="form-control" name="cin" value="" id="cin_modifier" required>
                                </div>
                            </div>
                        </div>

                        <!-- date naissance -->
                        <div class="form-group">
                            <label for="date_modifier" class="col-form-label">Date Naissance</label>
                            <input type="date" class="form-control" name="dateN" value="" id="date_modifier" required>
                        </div>

                        <!-- email -->
                        <div class="form-group">
                            <label for="email_modifier" class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email_modifier" value="" required>
                        </div>

                        <!-- groupe -->
                        <div class="form-group">
                            <label for="grou">Groupe</label>
                            <select name="groupe" id="grou" class="form-control">
                                <?php
                                $sql = "SELECT id_groupe,groupe_nom FROM groupe";
                                $resultat = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                    <option value='<?php echo $row["id_groupe"] ?>'><?php echo $row["groupe_nom"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <!-- modal footer -->
                        <div class="modal-footer">
                            <input type="hidden" id="id_module" name="id_module" value="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="ajouter">Modifier</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =====================================end formilar poir modifier un etudiant====================================== -->

    <br>


    <!-- =========feetcheing all data into a table ================= -->

    <div class="table-responsive-sm">
        <?php
        $id_filiere = $_GET["id_filiere"];
        $sql = "SELECT *
                FROM Module
                JOIN Enseignant ON Module.id_enseignant = Enseignant.id_enseignant
                JOIN Filiere ON Module.id_filiere = Filiere.id_filiere
                WHERE Module.id_filiere = $id_filiere";

        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        if ($resultatcheck > 0) {
        ?>
            <table class="table table-bordered table-striped mydatatable">
                <thead>
                    <tr>
                        <th>Nom du Module</th>
                        <th>Enseignant</th>
                        <th>Filiere</th>
                        <th>Supprimer</th>
                        <th>Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultat)) {
                    ?>
                        <tr>
                            <td><?php echo $row["intitule"] ?></t>
                            <td><?php echo $row["nom_enseignant"].' '.$row["prenom_enseignant"] ?></td>
                            <td><?php echo $row["nom_filiere"] ?></td>
                            <td>
                                <a href="Modules/supprimer_module.php?id=<?php echo $row["id_module"] ?>">
                                    <img width=20 heigth=20 src="https://bit.ly/2UwQb08">
                                </a>
                            </td>
                            <td>
                                <input type="button" value="Modifier" id="<?php echo $row["id_module"] ?>" data-toggle="modal" class="btn btn-info btn-xs Open_modifierUnModule">
                            </td>
                        </tr>
                <?php
                    }
                    echo "<tbody>";
                    echo "</table>";
                }
                ?>
    </div>
    <script>
        $('.mydatatable').DataTable();
    </script>
<?php
}
?>