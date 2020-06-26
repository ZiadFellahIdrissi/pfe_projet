<?php
    include '../../connection.php';
    include 'modals.php';
?>
<br>
<br>
<div class="table-responsive-sm">
    <?php
    $id_filiere = $_GET['id_filiere'];
    $sql = "SELECT Utilisateur.id cin, Etudiant.cne, Utilisateur.nom, Utilisateur.prenom,
                    Utilisateur.telephone, Utilisateur.email, Utilisateur.date_naissance,
                    Etudiant.id_filiere, Utilisateur.imagepath
            FROM Utilisateur 
            join Etudiant ON Etudiant.id = Utilisateur.id
            WHERE Etudiant.id_filiere = $id_filiere";
    $resultat = mysqli_query($conn, $sql);
    $resultatcheck = mysqli_num_rows($resultat);
    ?>
        <table class="table table table-borderless table-hover mydatatable">
            <thead class="thead-dark">
                <tr>
                    <th>CNE</th>
                    <th>Nom Complet</th>
                    <th>Telephone</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultatcheck > 0) {
                    while ($row = mysqli_fetch_assoc($resultat)) {
                    ?>
                        <tr>
                            <td><?php echo $row["cne"] ?></td>
                            <td><?php echo $row["nom"].' '.$row["prenom"] ?></td>
                            <td style="text-align: center;"><?php echo $row["telephone"] ?></td>
                            <td>
                                <div class="table-data-feature">
                                    <button onclick="location.href='supprimer_etudiant.php?id=<?php echo $row['cin'] ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Supprimer" >
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <button data-toggle="tooltip" id="<?php echo $row['cin'] ?>" data-toggle="modal" class="item Open_modifierUnEtudiant" data-placement="top" title="Modifier" >
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item openModalInformation" data-toggle="tooltip" data-placement="top" id="<?php echo $row["cin"] ?>"  title="Plus d'informations">
                                        <i class="zmdi zmdi-more"></i>
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
<script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
