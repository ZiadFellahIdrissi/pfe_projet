<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../layout/css/animation.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../layout/css/dashboard.css" rel="stylesheet">
    <title>Enseignants</title>
</head>

<style>
    .modal-header {
        background-color: #dcdde1;
    }
</style>

<body>
    <?php include 'header.php' ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        include 'DML_Commentator.php';
        DMLCommentator("enseignant");
        ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="titleH">Enseignants</h1>
        </div>
        <div class="container mt-3 mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Enseignants</li>
                </ol>
            </nav>

            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-6">
                        <h6 style="color:red;">work in progress...</h6> 
                    </div>
                </div>
                <br>
                 <!-- ===============un button pour ajoute un enseignant======================= -->
            <div class="col-6 col-md-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Ajouter un Enseignant</button>
                <br>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="Enseignant/ajoute_enseignant.php" method="POST">
                                    <!-- =======================bloc de le nom et le prenom======================= -->
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
                                    <!-- ===================fin bloc de le nom et le prenom======================= -->

                                    <div class="form-group">
                                        <label for="date" class="col-form-label">Date Naissance</label>
                                        <input type="date" class="form-control" name="dateN" id="date" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="date" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                     <!-- =========feetcheing all data into a table ================= -->
            <?php include 'Enseignant/afficheTableauEnseignants.php'; ?>

            
           

            <!-- =====================================formilar poir modifier un enseignant========================================== -->
            <div class="modal fade" id="modifierUnEnseignant" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body">

                            <form action="Enseignant/modifier_enseignant.php" method="POST">
                                <!-- =======================bloc de le nom et le prenom======================= -->
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="le_nom_modifier" class="col-form-label">Nom </label>
                                            <input type="text" class="form-control" name="Nom" value="" id="le_nom_modifier" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="le_prenom_modifier" class="col-form-label">Prenom </label>
                                            <input type="text" class="form-control" name="prenom" value="" id="le_prenom_modifier" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- ===================fin bloc de le nom et le prenom======================= -->

                                <div class="form-group">
                                    <label for="date_modifier" class="col-form-label">Date Naissance</label>
                                    <input type="date" class="form-control" name="dateN" value="" id="date_modifier" required>
                                </div>

                                <div class="form-group">
                                    <label for="email_modifier" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email_modifier" value="" required>
                                </div>

                                <div class="modal-footer">
                                    <input type=hidden value="" name="id_enseignant" id="id_enseignant">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="Modifier">Modifier</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- =====================================end modifier un enseignant====================================== -->

            <br>
            <!-- confirmation de la suppression du responsable -->
            <div class="modal fade" id="confermationAle" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="Filiere/supprimer_filiere.php" method="POST">
                            <div class="modal-body">
                                <p style="color:#c0392b;">cet <strong>Enseignant</strong> est le responsable du filiere <strong id="fil"></strong></p>
                                <p>Veuillez d'abord l'omettre de la responsabilité avant le supprimer.</p>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="confirmation" id="confirmation" value="" />
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end confirmation de la suppression du responsable -->
        </div>

    </main>
    </div>
    </div>
    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../layout/js/animation.js"></script>
    <script type="text/javascript" src="../layout/js/enseignant.js"></script>
</body>

</html>