<?php
if (!empty($_GET['id_filiere'])) {
    include_once '../../etudiant/fonctions/tools.function.php';
    include '../../connection.php';
?>
    <!-- relvet de notes -->
    <div class="modal fade" id="RelvetDesNotes" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <!-- MODAL HEADER -->
                <div class="modal-header">
                    <!-- <div class="image">
                        <img style="width: 10%; border-radius:50%" id="studentPicture" />
                    </div> -->
                    <h5 class="modal-title" id="largeModalLabel">Relve de notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

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
        if ($resultatcheck > 0) {
        ?>
            <table class="table table table-borderless table-data3 mydatatable">
                <thead>
                    <tr>
                        <th>CIN</th>
                        <th>CIN</th>
                        <th>Nom Complet</th>
                        <th>Relvet De Note</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = mysqli_fetch_assoc($resultat)) {
                    ?>
                        <tr>
                            <td><?php echo $row["cin"] ?></td>
                            <td><?php echo $row["cne"] ?></td>
                            <td><?php echo $row["nom"] . ' ' . $row["prenom"] ?></td>
                            <td style="font-size: large; width:20%">
                                <button class="item openModalNotes" data-toggle="tooltip" data-placement="top" id="<?php echo $row["cin"] ?>" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
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