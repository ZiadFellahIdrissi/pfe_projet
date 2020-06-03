<?php
if (!empty($_GET['id_filiere'])) {
    include '../../connection.php';
?>
    <!-- ===============Un button pour ajoute un etudiant======================= -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        + Ajouter
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="ajoute_etudiant.php" method="POST">
                        <!-- ======================Nom, Prenom======================= -->
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

                        <!-- =====================CNE,CIN======================= -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="cne" class="col-form-label">Cne</label>
                                    <input type="text" class="form-control" name="cne" id="cne" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="cin" class="col-form-label">Cin</label>
                                    <input type="text" class="form-control" name="cin" id="cin" required>
                                </div>
                            </div>
                        </div>

                        <!-- =====================Date naissance, Telephone======================= -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="date" class="col-form-label">Date Naissance</label>
                                    <input type="date" class="form-control" name="dateN" id="date" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="telephone" class="col-form-label">Telephone</label>
                                    <input type="text" class="form-control" name="telephone" id="telephone" required>
                                </div>
                            </div>
                        </div>

                        <!-- ===================Email================== -->
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="date" required>
                        </div>
                        
                        <!-- modal footer -->
                        <div class="modal-footer">
                            <input type="hidden" name="filiere" value="<?php echo $_GET['id_filiere'] ?>" class="form-control">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ===================================fin ajouter un etudiant============================== -->



    <!-- ===============formulaire pour modifier un etudiant=============== -->
    <div class="modal fade" id="modifierUnEtudiant" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <form action="modifier_etudiant.php" method="POST">
                        <!-- le nom et le prenom-->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="le_nom_modifier" class="col-form-label">Nom </label>
                                    <input type="text" class="form-control" name="Nom" id="le_nom_modifier" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="le_prenom_modifier" class="col-form-label">Prenom </label>
                                    <input type="text" class="form-control" name="prenom" id="le_prenom_modifier" required>
                                </div>
                            </div>
                        </div>

                        <!--code apogee et le cne -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="codeapoge_modifier" class="col-form-label">Cne</label>
                                    <input type="text" class="form-control" name="cne" id="cne_modifier" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="cin_modifier" class="col-form-label">Cin</label>
                                    <input type="text" class="form-control" name="cin" id="cin_modifier" required>
                                </div>
                            </div>
                        </div>

                        <!-- date naissance -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="date_modifier" class="col-form-label">Date Naissance</label>
                                    <input type="date" class="form-control" name="dateN" value="" id="date_modifier" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tel_modifier" class="col-form-label">Telephone</label>
                                    <input type="text" class="form-control" name="tel" id="tel_modifier" required>
                                </div>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="form-group">
                            <label for="email_modifier" class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email_modifier" value="" required>
                        </div>

                        <!-- filiere -->
                        <div class="form-group">
                            <label for="fil">Filière</label>
                            <select name="filiere" id="fil" class="form-control">
                                <?php
                                    $sql = "SELECT id_filiere,nom_filiere
                                            FROM Filiere";
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
                            <input type="hidden" id="oldCin" name="oldCin" value="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
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
        $sql = "SELECT Etudiant.id cin, Etudiant.cne, Utilisateur.date_naissance, Utilisateur.email,
                        Utilisateur.nom, Utilisateur.prenom, Utilisateur.id cin
                FROM Utilisateur 
                join Etudiant ON Etudiant.id = Utilisateur.id
                WHERE Etudiant.id_filiere=" . $_GET['id_filiere'];
        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        if ($resultatcheck > 0) {
        ?>
            <table class="table table table-borderless table-data3 mydatatable">
                <thead>
                    <tr>
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
                            <td><?php echo $row["nom"] ?></td>
                            <td><?php echo $row["prenom"] ?></td>
                            <td><?php echo $row["date_naissance"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td>
                                <button onclick="location.href='supprimer_etudiant.php?id=<?php echo $row['cin'] ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer" >
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <button data-toggle="tooltip" id="<?php echo $row['cin'] ?>" data-toggle="modal" class="item Open_modifierUnEtudiant" data-placement="top" title="Modifier" >
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <!-- <button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id="<?php echo $row["cin"] ?>"  title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>  -->
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