<?php
include 'connectionDB.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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
        <!-- ===================================enseignant bloc======================================= -->
        <div class="tab-pane fade show active">
            <!--  the main of student bloc -->
            <div class="container mt-3 mb-3">

                <!-- ======================================================================== -->
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
                <!-- =============================le bloc de botton pour ajoute un enseignant terminer======================================================================= -->

                <!-- =====================================formilar poir modifier un enseignant========================================== -->
                <div class="modal fade" id="modifierUnEnseignant"  tabindex="-1" role="dialog"  aria-hidden="true">
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
                                        <input type="email" class="form-control" name="email"  id="email_modifier" value="" required>
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
                <!-- =====================================end formilar poir modifier un enseignant====================================== -->

                <br>
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
                        cet <strong>Enseignant</strong> existe deja.
                    </div>
                <?php
                }
                if (strpos($fullurl, "insert=mailerr")) {
                ?>
                    <div class="alert alert-danger col-lg-4 col-lg-push-3 " style="text-align:center;">
                        cet <strong>Email</strong> est deja utilisé.
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
      
        <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(document).on('click', '.Open_modifierEnseignant', function() {
                    var code = $(this).attr("id");
                    $.ajax({
                        url: "Enseignant/fetching_teachers_for_editing.php",
                        method: 'GET',
                        data: {
                            code: code
                        },
                        contentType : "application/json",
                        dataType: 'json',
                        success: function(data) {
                            $('#le_nom_modifier').val(data.nom_enseignant);
                            $('#le_prenom_modifier').val(data.prenom_enseignant);
                            $('#date_modifier').val(data.date_naissance_enseignant);
                            $('#email_modifier').val(data.email_enseignant);
                            $('#id_enseignant').val(data.id_enseignant);
                            $('#modifierUnEnseignant').modal('show');
                        },
                        error: function() {
                            alert('failure');
                        }
                    });
            
                });

                $(document).ready(function() {
                    $(".open-confirmation").click(function() {
                        var filiere = $(this).attr('id');
                        $('#fil').html(filiere);
                        $('#confermationAle').modal('show');
                    });
                });
            });
        </script>
</body>

</html>
