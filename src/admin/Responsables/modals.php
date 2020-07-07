<!-- =====================modifier un enseignant==================== -->

<div class="modal fade" id="modifierUnResponsable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="modifier_responsable.php" method="POST">
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