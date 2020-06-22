<div class="col-6 col-md-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
        + Ajouter</button>
        <br>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="../Modules/ajoute_module.php" method="POST">
                            <div class="form-group">
                                <label for="le_nom" class="col-form-label">Intitule</label>
                                <input type="text" class="form-control" name="Nom" id="le_nom" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="semesterB" class="col-form-label">Semestre</label>
                                        <select name="mySemester" id="semesterB" class="form-control">
                                            <option value='<?php echo $_GET["semester"] ?>'>
                                                <?php
                                                    $sql = "SELECT semestre
                                                            FROM Semestre
                                                            WHERE id_semestre = ".$_GET["semester"];
                                                    $resultat = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_assoc($resultat);
                                                    echo $row['semestre'];
                                                ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Heures" class="col-form-label">Heures de la semaine</label>
                                            <input type="number" class="form-control" name="Heures" id="Heures" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <b>Coefficients</b>
                                <table class="table-bordered table">
                                    <tr>
                                        <td>
                                            <label for="coeffC" class="col-form-label">Coefficient du Controle</label>
                                            <input type="number" step="0.01" max=1 min=0 class="form-control" name="coeffC" id="coeffC" required>
                                        </td>
                                        <td>
                                            <label for="coeffE" class="col-form-label">Coefficient d'Examen</label>
                                            <input type="number" step="0.01" max=1 min=0 class="form-control" name="coeffE" id="coeffE" required>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="form-group">
                                <label for="Enseignant" class="col-form-label">Enseignant du Module</label>
                                <select name="Enseignant" id="Enseignant" class="form-control" required>
                                    <option value=''></option>
                                    <?php
                                    $sql = "SELECT Personnel.id, Utilisateur.nom, Utilisateur.prenom
                                            FROM Personnel
                                            JOIN Utilisateur ON Personnel.id = Utilisateur.id        ";
                                    $resultat = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                    ?>
                                        <option value='<?php echo $row["id"] ?>'>
                                            <?php echo $row["nom"].' '.$row["prenom"] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- ===================================== -->
                            <div class="modal-footer">
                                <input type="hidden" name="Filiere" value="<?php echo $_GET['id_filiere'] ?>" class="form-control">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
                            <label for="le_nom2" class="col-form-label">Intitule</label>
                            <input type="text" class="form-control" name="Nom" id="le_nom2" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="semesterBl" class="col-form-label">Semestre</label>
                                    <select name="mySemester" id="semesterBl" class="form-control">
                                        <?php
                                            $sql = "SELECT id_semestre, semestre
                                                    FROM Semestre               ";
                                            $resultat = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($resultat)) {
                                        ?>
                                                <option value='<?php echo $row["id_semestre"] ?>'>
                                                    <?php echo $row["semestre"] ?>
                                                </option>
                                        <?php
                                            }
                                        ?>
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
                            <b>Coefficients</b>
                            <table class="table-bordered table">
                                <tr>
                                    <td>
                                        <label for="coeffC_modifier" class="col-form-label">Coefficient du Controle</label>
                                        <input type="number" step="0.01" max=1 min=0 class="form-control" name="coeffC" id="coeffC_modifier" required>
                                    </td>
                                    <td>
                                        <label for="coeffE_modifier" class="col-form-label">Coefficient d'Examen</label>
                                        <input type="number" step="0.01" max=1 min=0 class="form-control" name="coeffE" id="coeffE_modifier" required>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group">
                            <label for="Enseignant2" class="col-form-label">Enseignant du Module</label>
                            <select name="Enseignant" id="Enseignant2" class="form-control" required>
                                <option value=''></option>
                                <?php
                                    $sql = "SELECT Personnel.id, Utilisateur.nom, Utilisateur.prenom
                                            FROM Personnel
                                            JOIN Utilisateur ON Personnel.id = Utilisateur.id";
                                    $resultat = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                        <option value='<?php echo $row["id"] ?>'>
                                            <?php echo $row["nom"].' '.$row["prenom"] ?>
                                        </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="filiere_modifier" class="col-form-label">Filière</label>
                            <select name="filiere_modifier" id="filiere_modifier" class="form-control" required>
                                <option value=''></option>
                                <?php
                                    $sql = "SELECT id_filiere, nom_filiere
                                            FROM Filiere                    ";
                                    $resultat = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                        <option value='<?php echo $row["id_filiere"] ?>'>
                                            <?php echo $row["nom_filiere"] ?>
                                        </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="Filiere" value="<?php echo $_GET['id_filiere'] ?>">
                            <input type="hidden" name="oldSem" id="oldSem">
                            <input type="hidden" name="id_module" id="id_module2">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- activation module -->
<div class="modal fade" id="actModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- =============================================== -->
                <form action="activer_module.php" method="POST">
                        <div class="form-group">
                            <label for="intitule" class="col-form-label">Intitule</label>
                            <input type="text" class="form-control" id="intitule" disabled>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="sem_act" class="col-form-label">Semestre</label>
                                    <input id="displaySem" class="form-control" readonly="readonly">
                                    <input id="sem_act" name="sem_act" class="form-control" hidden>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="heure_act" class="col-form-label">Heures de la semaine</label>
                                    <input type="number" class="form-control" name="heure_act" id="heure_act" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <b>Coefficients</b>
                            <table class="table-bordered table">
                                <tr>
                                    <td>
                                        <label for="coeffC_act" class="col-form-label">Coefficient du Controle</label>
                                        <input type="number" step="0.01" max=1 min=0 class="form-control" name="coeffC_act" id="coeffC_act" required>
                                    </td>
                                    <td>
                                        <label for="coeffE_act" class="col-form-label">Coefficient d'Examen</label>
                                        <input type="number" step="0.01" max=1 min=0 class="form-control" name="coeffE_act" id="coeffE_act" required>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group">
                            <label for="ens_act" class="col-form-label">Enseignant du Module</label>
                            <select name="ens_act" id="ens_act" class="form-control" required>
                                <option value=''></option>
                                <?php
                                    $sql = "SELECT Personnel.id, Utilisateur.nom, Utilisateur.prenom
                                            FROM Personnel
                                            JOIN Utilisateur ON Personnel.id = Utilisateur.id";
                                    $resultat = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                        <option value='<?php echo $row["id"] ?>'>
                                            <?php echo $row["nom"].' '.$row["prenom"] ?>
                                        </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fil_act" class="col-form-label">Filière</label>
                            <select id="fil_act" name="fil_act" class="form-control" readonly="readonly">
                                <option value=''></option>
                                <?php
                                    $sql = "SELECT id_filiere, nom_filiere
                                            FROM Filiere                    ";
                                    $resultat = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                        <option value='<?php echo $row["id_filiere"] ?>'>
                                            <?php echo $row["nom_filiere"] ?>
                                        </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_mod_act" id="id_mod_act">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" name="Activer">Activer</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- end activation module -->