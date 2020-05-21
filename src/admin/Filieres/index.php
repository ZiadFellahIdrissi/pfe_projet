<?php
    include '../../connection.php';
    include_once '../../../core/init.php';
    $user = new User_Admin();
    if (!$user->isLoggedIn()) {
        header('Location: ../pages/login.php');
    }else{
        $nom=$user->data()->username;
        $email=$user->data()->email;
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../../layout/css/animation.css" rel="stylesheet" type="text/css" />
    <title>Filières</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />

    <!-- lib CSS-->
    <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">
</head>
<style>
    .modal-header {
        background-color: #dcdde1;
    }

    .modal-body {
        background: #f5f5f5;
    }

    .nov {
        background: #f5f5f5;
    }
</style>

<body class=""> <!--animsition-->
    <div class="page-wrapper">
        <?php
            include '../pages/header.php';
        ?>
        <div class="main-content ">
            <?php
                include '../../DML_Commentator.php';
                DMLCommentator('filiere');
            ?>
            <div class="container mb-3">
                <nav aria-label="breadcrumb nov ">
                    <ol class="breadcrumb nov ">
                        <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Filières</li>
                    </ol>
                </nav>

                <!-- =====================ajoute un filier========================== -->
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="col-6 col-md-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter une filière</button>
                            <br><br>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <!-- =============================================== -->
                                            <form action="ajoute_filiere.php" method="POST">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="Nom" class="col-form-label">Nom de la filière</label>
                                                            <input type="text" class="form-control" name="Nom" id="Nom" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Responsable">Responsable</label>
                                                    <select name="Responsable" id="Responsable" class="form-control" required>
                                                        <option value=""></option>
                                                        <?php
                                                            $sql = "SELECT `id_enseignant`,nom_enseignant,prenom_enseignant
                                                                            FROM enseignant
                                                                            WHERE `id_enseignant` not in ( SELECT responsable_id
                                                                                                            FROM filiere )";
                                                            $resultat = mysqli_query($conn, $sql);
                                                            if (mysqli_num_rows($resultat) > 0) {
                                                                while ($row = mysqli_fetch_assoc($resultat)) {
                                                        ?>
                                                                    <option value="<?php echo $row['id_enseignant'] ?>">
                                                                        <strong><?php echo $row['nom_enseignant'] . " " . $row["prenom_enseignant"] ?></strong>
                                                                    </option>';
                                                        <?php
                                                                }
                                                            }
                                                        ?>
                                                    </select>
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
                        </div>
                        <!-- liste des filieres -->
                        <?php
                            include 'AfficheTableauFiliere.php';
                        ?>
                    </div>
                </div>
                
                <!-- =======================modal pour la modification============================ -->
                <div class="modal fade" id="modifierModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="modifier_filiere.php" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nom" class="col-form-label">Nom de la filière</label>
                                                <input type="text" class="form-control" name="Nom" value="" id="Nom_modifier">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Responsable_modifier">Responsable</label>
                                        <select name="Responsable_modifier" id="Responsable_modifier" value="" class="form-control">
                                            <?php
                                                $sqlOptions = "SELECT id_enseignant,nom_enseignant,prenom_enseignant
                                                                FROM enseignant ";
                                                $resultat = mysqli_query($conn, $sqlOptions);
                                                $resultatcheck = mysqli_num_rows($resultat);
                                                while ($row = mysqli_fetch_assoc($resultat)) {
                                                    echo '<option value="' . $row["id_enseignant"] . '">
                                                        <strong>' . $row["nom_enseignant"] . ' ' . $row["prenom_enseignant"] . '</strong>
                                                    </option>';
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="hidden" name="Modifier_inp" id="Modifier_inp" value="" />
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" id="Modifier" class="btn btn-primary" value="Modifier" name="Modifier">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================fin la modification======================== -->

                <!-- ====================asking for permission Modal==================== -->
                <div class="modal fade" id="confermationAle" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="../Filiere/supprimer_filiere.php" method="POST">
                                <div class="modal-header">
                                    <h4 style="color:#c0392b;" class="modal-title" id="exampleModalScrollableTitle">Tu vas supprimer tous ces Etudiants dans cette filière!</h6>
                                </div>
                                <div class="modal-body">
                                    <div class="container mb-3 mt-3" id="affiche_etudiant">
                                        <!-- l'affichage des etudiants qui va être supprimé
                                            si l'utilisateur veut supprimer leur filiere -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="confirmation" id="confirmation" value="" />
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                    <button type="submit" class="btn btn-primary">Oui je confirme</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ====================end of asking for permission ==================== -->
            </div>
        </div>
    </div>
    </div> <!-- hade div daroori tb9a hitache dyal wahde dive ma7loola fl header   -->

    <script type="text/javascript" src="../../../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JS-->
    <script type="text/javascript" src="../../../layout/js/bootstrap.min.js "></script>
    <!-- lib JS   -->
    <script type="text/javascript" src="../../../lib/animsition/animsition.min.js "></script>
    <!-- Main JS-->
    <script type="text/javascript" src="../../../layout/js/main.js "></script>
    <script type="text/javascript" src="../../../layout/js/animation.js"></script>
    <script type="text/javascript" src="../../../layout/js/filieres.js"></script>
    <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
</body>

</html>
<?php
}
?>