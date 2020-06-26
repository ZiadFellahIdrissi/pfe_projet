<?php
include_once '../../../core/init.php';
$idResponsable = $_GET["idResponsable"];
include 'modal.php';
$db = DB::getInstance();
?>
<div class="table-responsive-sm">
    <?php
    $semester = $_GET["semester"];
    $sql = "SELECT *
            FROM Module
            JOIN Personnel ON Module.id_enseignant = Personnel.id
            JOIN Utilisateur ON Personnel.id = Utilisateur.id
            JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
            JOIN dispose_de ON Module.id_module = dispose_de.id_module
            WHERE dispose_de.id_filiere = (SELECT id_filiere from Filiere where id_responsable=?)
            AND Semestre.id_semestre = ?
            AND Module.etat = ?";

    $resultat = $db->query($sql, [$idResponsable, $semester, 1]);
    $resultatcheck = $resultat->count();
    ?>
    <table class="table table-borderless mydatatable">
        <thead class="thead-dark">
            <tr>
                <th>Intitule</th>
                <th>Enseignant</th>
                <th>Heures <span style="opacity: 0.7">(par semaine)</span></th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultatcheck > 0) {
                foreach ($resultat->results() as $row) {
            ?>
                    <tr>
                        <td><?php echo $row->intitule ?></td>
                        <td><?php echo $row->nom . ' ' . $row->prenom ?></td>
                        <td style="text-align: center;"><?php echo $row->heures_sem ?></td>
                        <td>
                            <div class="table-data-feature">
                                <!-- <button onclick="location.href='supprimer_module.php?id=<?php echo $row->id_module ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                    <i class="zmdi zmdi-delete"></i>
                                </button> -->
                                <button data-toggle="tooltip" id=<?php echo $row->id_module ?> data-toggle="modal" class="item Open_modifierUnModule" data-placement="top" title="Modifier">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id="<?php echo $row->id_module ?>" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php
            }
            echo "<tbody>";
            echo "</table>";

            // ============================================================================================== //
            $sql = "SELECT *
            FROM Module
            JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
            JOIN dispose_de ON Module.id_module = dispose_de.id_module
            WHERE dispose_de.id_filiere = (SELECT id_filiere from Filiere where id_responsable=?)
            AND Semestre.id_semestre = ?
            AND Module.etat = ?";

            $resultat = $db->query($sql, [$idResponsable, $semester, 0]);
            $resultatcheck = $resultat->count();
            if ($resultatcheck > 0) {
            ?>
                <br>
                <p>Modules désactivés.</p>
                <table class="table table-borderless table-data3 mydatatable2">
                    <thead class="thead-dark">
                        <tr>
                            <th>Intitule</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($resultat->results() as $row) {
                            $id_module = $row->id_module;
                        ?>
                            <tr>
                                <td><?php echo $row->intitule ?></td>
                                <td>
                                    <div class="table-data-feature">
                                        <button onclick="location.href='supprimer_module.php?id=<?php echo $id_module ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                        <button class="item open_confirmationActModule" data-toggle="modal" data-toggle="tooltip" id=<?php echo $id_module ?> title="Activer">
                                            <i class="zmdi zmdi-check-circle"></i>
                                        </button>
                                        <!-- <button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id="<?php echo $id_module ?>"  title="More">
                                            <i class="zmdi zmdi-more"></i>
                                        </button> -->
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

    $('.mydatatable2').DataTable();

    $(document).ready(function() {
        $(document).on('click', '.open_confirmationActModule', function() {
            var code = $(this).attr("id");
            console.log(code);
            $.ajax({
                url: "fetch_module_infos.php",
                method: 'GET',
                data: {
                    code: code
                },
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    $('#intitule').val(data.intitule);
                    $('#displaySem').val(data.semestre);
                    $('#sem_act').val(data.id_semestre);
                    $('#heure_act').val(data.heures_sem);
                    $('#coeffC_act').val(data.coeff_controle);
                    $('#coeffE_act').val(data.coeff_examen);
                    $('#displayFil').val(data.nom_filiere);
                    $('#fil_act').val(data.id_filiere);
                    $('#id_mod_act').val(data.id_module);
                    $('#actModal').modal('show');
                },
                error: function() {
                    alert('failure');
                }
            });
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.Open_modifierUnModule', function() {
            var code = $(this).attr("id");
            $.ajax({
                url: "fetch_module_infos.php",
                method: 'GET',
                data: {
                    code: code
                },
                contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    $('#id_module2').val(data.id_module);
                    $('#le_nom2').val(data.intitule);
                    $('#Heures2').val(data.heures_sem);
                    $('#coeffC_modifier').val(data.coeff_controle);
                    $('#coeffE_modifier').val(data.coeff_examen);
                    $('#Enseignant2').val(data.id_enseignant);
                    $('#semesterBl').val(data.id_semestre);
                    $('#oldSem').val(data.id_semestre);
                    $('#filiere_modifier').val(data.id_filiere);
                    $('#displayFil').val(data.nom_filiere);
                    $('#modifierUnModule').modal('show');
                },
                error: function() {
                    alert('failure');
                }
            });
        });
    });
</script>
<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>