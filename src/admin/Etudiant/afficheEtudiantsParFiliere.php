<?php
if (!empty($_GET['id_filiere'])) {
    include '../../connection.php';
?>
    <!-- ===============un button pour ajoute un etudiant======================= -->
    <div class="col-6 col-md-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Ajouter un Etudiant à ce Filière</button>
        <br>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="../Etudiant/ajoute_etudiant.php" method="POST">
                            <!-- =======================bloc de le nom et le prenom======================= -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="le_nom" class="col-form-label">Nom </label>
                                        <input type="text" class="form-control" name="Nom" id="le_nom" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="le_prenom" class="col-form-label">Prenom </label>
                                        <input type="text" class="form-control" name="prenom" id="le_prenom" required>
                                    </div>
                                </div>
                            </div>
                            <!-- ===================fin bloc de le nom et le prenom======================= -->

                            <!-- =====================bloc code apogee et le cne======================= -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="codeapo" class="col-form-label">Code apouge</label>
                                        <input type="text" class="form-control" name="codeapoge" id="codeapo" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cin" class="col-form-label">Cne</label>
                                        <input type="text" class="form-control" name="cin" id="cin" required>
                                    </div>
                                </div>
                            </div>
                            <!-- ===================fin bloc de code apogee et le cne================== -->

                            <div class="form-group">
                                <label for="date" class="col-form-label">Date Naissance</label>
                                <input type="date" class="form-control" name="dateN" id="date" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="date" required>
                            </div>


                            <div class="form-group">
                                <input type="hidden" name="filiere" value="<?php echo $_GET['id_filiere'] ?>" class="form-control">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ===============le bloc de botton pour ajoute un etudiant terminer=============== -->

    <!-- ===============formulaire pour modifier un etudiant=============== -->
    <div class="modal fade" id="modifierUnEtudiant" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <form action="../Etudiant/modifier_etudiant.php" method="POST">
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

                        <!--code apogee et le cne -->
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
                            <label for="fil">Filière</label>
                            <select name="filiere" id="fil" class="form-control">
                                <?php
                                $sql = "SELECT id_filiere,nom_filiere FROM filiere";
                                $resultat = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                    <option value='<?php echo $row["id_filiere"] ?>'><?php echo $row["nom_filiere"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <!-- modal footer -->
                        <div class="modal-footer">
                            <input type="hidden" id="codeapoger" name="codeapoger" value="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="ajouter">Modifier</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =====================================end formulaire pour modifier un etudiant====================================== -->

    <br>


    <!-- =========feetcheing all data into a table ================= -->

    <div class="table-responsive-sm">
        <?php
        $sql = 'SELECT cne, code_apoge,date_naissance,email,nom,prenom,id_filiere
                FROM etudiant WHERE id_filiere=' . $_GET['id_filiere'];

        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        if ($resultatcheck > 0) {
        ?>
            <table class="table table-bordered table-striped mydatatable">
                <thead class="thead-dark">
                    <tr>
                        <th>Code Apoge</th>
                        <th>Cin</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date Naissance</th>
                        <th>Email</th>
                        <th>Options</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = mysqli_fetch_assoc($resultat)) {
                    ?>
                        <tr>
                            <td><?php echo $row["code_apoge"] ?></t>
                            <td><?php echo $row["cne"] ?></td>
                            <td><?php echo $row["nom"] ?></td>
                            <td><?php echo $row["prenom"] ?></td>
                            <td><?php echo $row["date_naissance"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td>
                                <div class="table-data-feature" style="text-align: center">
                                    <button data-toggle="tooltip" id="<?php echo $row["code_apoge"] ?>" data-toggle="modal" class="item Open_modifierUnEtudiant" data-placement="top" title="Modifier">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <a href="../Etudiant/supprimer_etudiant.php?id=<?php echo $row["code_apoge"] ?>">
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
                    echo "</table>";
                }
                ?>
    </div>
    <script>
        $('.mydatatable').DataTable();
    </script>
    <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
<?php
}
?>