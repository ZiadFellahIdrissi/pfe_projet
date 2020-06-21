<!-- =====================ajoute========================== -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+ Ajouter</button>
<br><br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- =============================================== -->
                <form action="ajoute_filiere.php" method="POST">
                    <div class="form-group">
                        <label for="Nom" class="col-form-label">Nom de la filière</label>
                        <input type="text" class="form-control" name="Nom" id="Nom" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="prix" class="col-form-label">Tarif</label>
                                <input type="number" class="form-control" name="prix" id="prix" required>
                            </div>
                            <div class="col">
                                <label for="Responsable">Responsable</label>
                                <select name="Responsable" id="Responsable" class="form-control" required>
                                    <option value=""></option>
                                    <?php
                                        $sql = "SELECT Personnel.id, Utilisateur.nom, Utilisateur.prenom
                                                FROM Personnel
                                                JOIN Utilisateur ON Personnel.id = Utilisateur.id
                                                WHERE Personnel.role = 'enseignant'
                                                AND Personnel.id not in ( SELECT id_responsable
                                                                            FROM Filiere          )";
                                        $resultat = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($resultat) > 0) {
                                            while ($row = mysqli_fetch_assoc($resultat)) {
                                    ?>
                                                <option value="<?php echo $row['id'] ?>">
                                                    <strong><?php echo $row['nom'] . " " . $row["prenom"] ?></strong>
                                                </option>';
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" id="ajouter" class="btn btn-primary" value="Ajouter" name="ajouter" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- =====================fin ajoute========================== -->

<!-- =======================modification============================ -->
<div class="modal fade" id="modifierModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="modifier_filiere.php" method="POST">
                    <div class="form-group">
                        <label for="Nom" class="col-form-label">Nom de la filière</label>
                        <input type="text" class="form-control" name="Nom" id="Nom_modifier">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="prix" class="col-form-label">Tarif</label>
                                <input type="number" class="form-control" name="prix" id="prix_modifier" required>
                            </div>
                            <div class="col">
                                <label for="Responsable_modifier">Responsable</label>
                                <select name="Responsable_modifier" id="Responsable_modifier" class="form-control">
                                    <?php
                                        $sqlOptions = " SELECT Personnel.id, Utilisateur.nom, Utilisateur.prenom
                                                        FROM Personnel
                                                        JOIN Utilisateur ON Personnel.id = Utilisateur.id         ";
                                        $resultat = mysqli_query($conn, $sqlOptions);
                                        $resultatcheck = mysqli_num_rows($resultat);
                                        while ($row = mysqli_fetch_assoc($resultat)) {
                                            echo '<option value="'.$row["id"].'">
                                                        <strong>'.$row["nom"].' '.$row["prenom"].'</strong>
                                                    </option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="Modifier_inp" id="Modifier_inp" value="" />
                        <input type="hidden" name="oldResp" id="oldResp" value="" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" id="Modifier" class="btn btn-primary" value="Modifier" name="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================fin modification======================== -->

<!-- ====================asking for permission Modal==================== -->
<div class="modal fade" id="confermationAle" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="./supprimer_filiere.php" method="POST">
                <div class="modal-header" style="background-color: #dc3545">
                    <h5 class="modal-title text-white">
                        En supprimant cette <span style="opacity: 0.9;">Filière</span> Tu vas également supprimer tous ces
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        Modules
                    </div>
                    <div class="container mb-3 mt-3" id="affiche_modules">
                        <!-- l'affichage des modules qui va être supprimé
                            si l'utilisateur veut supprimer leur filiere -->
                    </div>
                    <div class="container">
                        Etudiants
                    </div>
                    <div class="container mb-3 mt-3" id="affiche_etudiants">
                        <!-- l'affichage des etudiants qui va être supprimé
                            si l'utilisateur veut supprimer leur filiere -->
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="confirmation" id="confirmation" value="" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger">Confirmer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ====================end of asking for permission ==================== -->
