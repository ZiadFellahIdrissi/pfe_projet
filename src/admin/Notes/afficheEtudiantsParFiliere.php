<?php
if (!empty($_GET['id_filiere'])) {
    include_once '../../etudiant/fonctions/tools.function.php';
    include '../../connection.php';
?>
    <!-- relvet de notes -->
    <div class="modal fade" id="RelvetDesNotes" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <!-- MODAL BODY -->
                <div class="modal-body">
                    <div class="notes">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border m-5" role="status" id="spinner">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- MODAL FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- tableau des etudiants -->
    <div class="table-responsive-sm">
        <?php
        $sql = "SELECT Utilisateur.id cin, Etudiant.cne, Utilisateur.nom, Utilisateur.prenom,
                        Utilisateur.telephone, Utilisateur.email, Utilisateur.date_naissance,
                        Etudiant.id_filiere, Utilisateur.imagepath
                FROM Utilisateur
                join Etudiant ON Etudiant.id = Utilisateur.id
                WHERE Etudiant.id_filiere=" . $_GET['id_filiere'];
        $resultat = mysqli_query($conn, $sql);
        $resultatcheck = mysqli_num_rows($resultat);
        ?>
            <table class="table table-borderless table-hover mydatatable">
                <thead class="thead-dark">
                    <tr>
                        <th>CNE</th>
                        <th>Nom Complet</th>
                        <th style="text-align: center">Relevé de notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultatcheck > 0) {
                        while ($row = mysqli_fetch_assoc($resultat)) {
                        ?>
                            <tr>
                                <td><?php echo $row["cne"] ?></td>
                                <td><?php echo $row["nom"] . ' ' . $row["prenom"] ?></td>
                                <td>
                                    <div class="table-data-feature">
                                        <button class="openModalNotes" data-toggle="tooltip" data-placement="top" id='<?php echo $row["cin"] ?>' title='Relevé de notes de <?php echo $row["nom"].' '.$row["prenom"] ?>'>
                                            <img src="https://image.flaticon.com/icons/svg/782/782702.svg" width="35">
                                        </button>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                    ?>
                        <tr><td colspan="4" style="text-align: center;">Aucun etudiant n'est inscrit à cette filière.</td></tr>
                    <?php
                    }
                    echo "<tbody>";
                echo "</table>";
                    ?>
    </div>
    <script>
        $('.mydatatable').DataTable();
    </script>
    <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
<?php
}
?>
