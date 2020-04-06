<?php
include 'connectionDB.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <title>test</title>
    <!-- rahe deja telechargiite bootstarp 5aliw dakchi f blasto ou rahe i5dame likom -->
</head>

<body>
    <!--hadi container jam3a kooooooooolckii-->
    <div class="container mt-3 mb-3" style="width:100%;">
        <!-- bloc de menu -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link " href="index_filiere.php" aria-selected="false"><b>Filiere</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index_enseignant.php" aria-selected="true"><b>Enseignant</b></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="index_etudiant.php" aria-selected="false"><b>Etudiant</b></a>
            </li>
        </ul>
        <!-- end bloc de menu -->
        <!-- ===================================etudiant bloc======================================= -->
        <div class="tab-pane fade show active">
            <!--  the main of student bloc -->
            <div class="container mt-3 mb-3">

                <!-- ======================================================================== -->
                <!-- ===============un button pour ajoute un etudiant======================= -->
                <div class="col-6 col-md-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">ajoute un etudiant</button>
                    <br>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="ajoute_etudiant.php" method="POST">
                                        <!-- =======================bloc de le nom et le prenom======================= -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="le_nom" class="col-form-label">Nom </label>
                                                    <input type="text" class="form-control" name="Nom" id="le_nom">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="le_prenom" class="col-form-label">Prenom </label>
                                                    <input type="text" class="form-control" name="prenom" id="le_prenom">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ===================fin bloc de le nom et le prenom======================= -->

                                        <!-- =====================bloc code apuge et le cne======================= -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="codeapo" class="col-form-label">Code apouge</label>
                                                    <input type="text" class="form-control" name="codeapoge" id="codeapo">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="cin" class="col-form-label">Cin</label>
                                                    <input type="text" class="form-control" name="cin" id="cin">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ===================fin bloc de code apuge et le cne================== -->

                                        <div class="form-group">
                                            <label for="date" class="col-form-label">Date Naissance</label>
                                            <input type="date" class="form-control" name="dateN" id="date">
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="date">
                                        </div>

                                        <!-- les options de filier -->
                                        <div class="form-group">
                                            <label for="filier">Filiere</label>
                                            <select name="filier" id="filier" class="form-control">
                                                
                                            </select>
                                        </div>
                                        <!-- fin options de filiere -->

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
                <!-- ====================================================================================================================================================== -->
                <!-- =============================le bloc de botton pour ajoute un etudiant terminer======================================================================= -->

                <!-- =====================================formilar poir modifier un etudiant========================================== -->
                <div class="modal fade" id="modifierUnEtudiant"  tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-body">

                                <form action="modifier_etudiant.php" method="POST">
                                    <!-- =======================bloc de le nom et le prenom======================= -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="le_nom_modifier" class="col-form-label">Nom </label>
                                                <input type="text" class="form-control" name="Nom" value="" id="le_nom_modifier">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="le_prenom_modifier" class="col-form-label">Prenom </label>
                                                <input type="text" class="form-control" name="prenom" value="" id="le_prenom_modifier">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ===================fin bloc de le nom et le prenom======================= -->

                                    <!-- =====================bloc code apuge et le cne======================= -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="codeapoge_modifier" class="col-form-label">Code apogee</label>
                                                <input type="text" class="form-control" name="codeapoge" value="" id="codeapoge_modifier">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="cin_modifier" class="col-form-label">Cin</label>
                                                <input type="text" class="form-control" name="cin" value="" id="cin_modifier">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ===================fin bloc de code apuge et le cne================== -->

                                    <div class="form-group">
                                        <label for="date_modifier" class="col-form-label">Date Naissance</label>
                                        <input type="date" class="form-control" name="dateN" value="" id="date_modifier">
                                    </div>

                                    <div class="form-group">
                                        <label for="email_modifier" class="col-form-label">Email</label>
                                        <input type="email" class="form-control" name="email"  id="email_modifier" value="">
                                    </div>

                                    <!-- les options de filier -->
                                    <div class="form-group">
                                        <label for="fil">Filiere</label>
                                        <select name="fil" id="fil" class="form-control">
                                            
                                        </select>
                                    </div>
                                    <!-- fin options de filiere -->

                                    <div class="modal-footer">
                                        <input type="hidden" id="codeapoger" name="codeapoger" value="">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="ajouter">Modifier</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- =====================================end formilar poir modifier un etudiant====================================== -->

                <br>


                <!-- =========feetcheing all data into a table ================= -->
                <?php
                    include 'Enseignant/AffichetableauEnseignant.php';
                ?>
                <!-- =================end=================================== -->

                <!-- ==================================================================== -->
                <!-- hadi dhiya les msgs li kital3o dyal ajoute supprimie ou modifier -->
                <?php
                $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($fullurl, "insert=failed")) {
                ?>
                    <div class="alert alert-danger col-lg-4 col-lg-push-3 " style="text-align:center;">
                        ce <strong>Enseignant</strong> deja existe.
                    </div>
                <?php
                }
                if (strpos($fullurl, "enseignant=inserted")) {
                ?>
                    <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                        <strong>Enseignant</strong> ajouté avec succes :)
                    </div>
                <?php
                }
                if (strpos($fullurl, "enseignant=deleted")) {
                ?>
                    <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                        <strong>Enseignant</strong> supprimé avec succes :)
                    </div>
                <?php
                }
                if (strpos($fullurl, "enseignant=updated")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Enseignant</strong> modifié avec succes :)
                        </div>
                    <?php
                }
                ?>
                <!-- ==================================================================== -->
                <!-- ==================================================================== -->

            </div>


        </div>

        <script type="text/javascript" src="./layout/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="./layout/js/bootstrap.min.js"></script>
</body>

</html>
