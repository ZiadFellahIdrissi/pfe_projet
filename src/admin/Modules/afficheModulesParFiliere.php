<?php
include '../../connection.php';
include 'modals.php';
?>
<br>
<div class="table-responsive-sm">
    <?php
    $id_filiere = $_GET["id_filiere"];
    $semester = $_GET["semester"];
    $sql = "SELECT *
            FROM Module
            JOIN Personnel ON Module.id_enseignant = Personnel.id
            JOIN Utilisateur ON Personnel.id = Utilisateur.id
            JOIN Semestre ON Module.id_semestre = Semestre.id_semestre
            JOIN dispose_de ON Module.id_module = dispose_de.id_module
            WHERE dispose_de.id_filiere = $id_filiere
            AND Semestre.id_semestre = $semester
            AND Module.etat = 1";

    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    ?>
    <table class="table table-borderless table-hover mydatatable">
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
                while ($row = mysqli_fetch_assoc($resultat)) {
            ?>
                    <tr>
                        <td><?php echo $row["intitule"] ?></td>
                        <td><?php echo $row["nom"] . ' ' . $row["prenom"] ?></td>
                        <td style="text-align: center;"><?php echo $row["heures_sem"] ?></td>
                        <td>
                            <div class="table-data-feature">
                                <!-- <button onclick="location.href='supprimer_module.php?id=<?php echo $row["id_module"] ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                    <i class="zmdi zmdi-delete"></i>
                                </button> -->
                                <button data-toggle="tooltip" id="<?php echo $row["id_module"] ?>" data-toggle="modal" class="item Open_modifierUnModule" data-placement="top" title="Modifier">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id="<?php echo $row["id_module"] ?>" title="Plus d'informations">
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
            WHERE dispose_de.id_filiere = $id_filiere
            AND Semestre.id_semestre = $semester
            AND Module.etat = 0";

            $resultat = mysqli_query($conn, $sql);
            $resultatcheck = mysqli_num_rows($resultat);
            if ($resultatcheck > 0) {
            ?>
                <br>
                <p>Modules désactivés.</p>
                <table class="table table-borderless table-hover mydatatable2">
                    <thead class="thead-dark">
                        <tr>
                            <th>Intitule</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultat)) {
                            $id_module=$row["id_module"];
                        ?>
                            <tr>
                                <td><?php echo $row["intitule"] ?></td>
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
</script>
<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>