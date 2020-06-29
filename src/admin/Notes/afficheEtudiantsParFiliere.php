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
                        <th>Relevé des notes</th>
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
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-app-indicator" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"/>
                                            <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        </svg>
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