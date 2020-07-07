<!-- ===============un button pour ajoute un enseignant======================= -->
<div class="col-6 col-md-4">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
    + Ajouter</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="ajoute_enseignant.php" method="POST">
                        <!-- =======================nom et prenom======================= -->
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

                        <!-- =================== cin, date naissance ======================= -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="cin" class="col-form-label">Cin</label>
                                    <input type="text" class="form-control" name="cin" id="cin" pattern="[A-Za-z][A-Za-z0-9][0-9]{6}" required>
                                </div>
                                <div class="col">
                                    <label for="dateN" class="col-form-label">Date Naissance</label>
                                    <input type="date" class="form-control" name="dateN" id="dateN" required>
                                </div>
                            </div>
                        </div>

                        <!-- =================== telephone, som ======================= -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="tel_modifier" class="col-form-label">Numéro du téléphone</label>
                                    <input type="text" class="form-control" name="numTel" id="numTel" pattern="[0-9]{10}" required>
                                </div>
                                <div class="col">
                                    <label for="som" class="col-form-label">Numéro de SOM</label>
                                    <input type="text" class="form-control" name="som" id="som" pattern="[a-zA-Z][0-9]{9}" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- =====================formilar poir modifier un enseignant==================== -->

<div class="modal fade" id="modifierUnEnseignant" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="modifier_enseignant.php" method="POST">
                    <!-- =======================bloc de le nom et le prenom======================= -->
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

                    <!-- =================== cin, date naissance ======================= -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="cin_modifier" class="col-form-label">Cin</label>
                                <input type="text" class="form-control" id="cin_modifier" readonly="readonly">
                            </div>
                            <div class="col">
                                <label for="dateN_modifier" class="col-form-label">Date Naissance</label>
                                <input type="date" class="form-control" name="dateN" id="dateN_modifier" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="tel_modifier" class="col-form-label">Numéro du téléphone</label>
                                <input type="text" class="form-control" name="numTel" id="tel_modifier" pattern="[0-9]{10}" required>
                            </div>
                            <div class="col">
                                <label for="som" class="col-form-label">Numéro de SOM</label>
                                <input type="text" class="form-control" id="som_modifier" readonly="readonly">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type=hidden value="" name="oldCin" id="id_enseignant">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary" name="Modifier">Modifier</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- ======================end modifier un enseignant======================== -->

<br>
<!-- confirmation de la suppression du responsable -->
<div class="modal fade" id="confermationR" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p style="color:#c0392b;">cet <strong>Enseignant</strong> est le responsable du filiere <strong id="fil"></strong>!</p>
                <span>Veuillez d'abord l'omettre de la responsabilité avant de le supprimer.</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<!-- confirmation de la suppression d'enseignant d'un module -->
<div class="modal fade" id="confermationE" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p style="color:#c0392b;">cet <strong>Enseignant</strong> est celui qui est en charge du module <strong id="module"></strong>!</p>
                <span>Veuillez d'abord le dispenser de la responsabilité avant de le supprimer.</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>