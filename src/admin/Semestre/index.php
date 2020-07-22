<?php
include '../../connection.php';
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$user = new User_Admin();
if (!$user->isLoggedIn()) {
    header('Location: ../pages/login.php');
} else {
    $username = $user->data()->username;
    $nom = $user->data()->nom;
    $prenom = $user->data()->prenom;
    $email = $user->data()->email;
    $imagepath = $user->data()->imagepath;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Notes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../../../layout/css/animation.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />

        <!-- lib CSS-->
        <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
        <link href="../../../lib/select2/select2.min.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">
    </head>
    <style>
        .nov {
            background: #f5f5f5;
        }
    </style>

    <body>
        <div class="page-wrapper">
            <?php
            include '../pages/header.php';
            ?>
            <div class="main-content ">
                <?php //include 'DML_Commentator.php'; 
                ?>
                <div class="container mb-3">
                    <nav aria-label="breadcrumb nov">
                        <ol class="breadcrumb nov">
                            <li class="breadcrumb-item"><a href="../pages">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Notes</li>
                        </ol>
                    </nav>
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-body semestre" style="padding: 0;">
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border m-5" role="status" id="spinner">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="modal fade" id="modifierSemester" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body semesterChange">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border m-5" role="status" id="spinner1">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="alert alert-warning" role="alert" style="text-align: center;">
                            <strong>Attesntion !</strong> Les examens finaux ne sont pas inclus au niveau des semestres
                        </div>

                        <form action="modifier_semester.php" method="POST" id="myform">
                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control-plaintext" value="1ere Semester :" style="font-weight: bold;" readonly="readonly">
                                    </div>

                                    <div class="col">
                                        <label for="date_debut_premier_semestre" class="col-form-label">Date debut</label>
                                        <input type="date" class="form-control" name="date_debut_premier_semestre" id="date_debut_premier_semestre" required>
                                    </div>

                                    <div class="col">
                                        <label for="date_fin_premier_semestre" class="col-form-label">Date Fin</label>
                                        <input type="date" class="form-control" name="date_fin_premier_semestre" id="date_fin_premier_semestre" required>
                                    </div>
                                </div><br>
                                <hr>

                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control-plaintext" value="2eme Semester :" style="font-weight: bold;" readonly="readonly">
                                    </div>

                                    <div class="col">
                                        <label for="date_debut_dexieme_semestre" class="col-form-label">Date debut</label>
                                        <input type="date" class="form-control" name="date_debut_dexieme_semestre" id="date_debut_dexieme_semestre" required>
                                    </div>
                                    <div class="col">
                                        <label for="date_fin_dexieme_semestre" class="col-form-label">Date Fin</label>
                                        <input type="date" class="form-control" name="date_fin_dexieme_semestre" id="date_fin_dexieme_semestre" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" id="Modifier" class="btn btn-primary" value="Modifier" name="Modifier">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script type="text/javascript" src="../../../layout/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>

        <!-- Bootstrap JS-->
        <script type="text/javascript" src="../../../layout/js/bootstrap.min.js "></script>

        <!-- lib JS   -->
        <script type="text/javascript" src="../../../lib/animsition/animsition.min.js "></script>
        <script type="text/javascript" src="../../../lib/select2/select2.min.js"></script>

        <!-- Main JS-->
        <script type="text/javascript" src="../../../layout/js/main.js "></script>
        <script type="text/javascript" src="../../../layout/js/admin/notes.js"></script>
        <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
        <script>
            $(document).ready(function() {
                $("#spinner").hide();
                $("#spinner1").hide();
                $.ajax({
                    url: "affiche_tabe_semestres.php",
                    method: "GET",
                    data: {},
                    dataType: "text",
                    beforeSend: function() {
                        $("#spinner").show();
                    },
                    complete: function() {
                        $("#spinner").hide();
                    },
                    success: function(data) {
                        $('.semestre').html(data);
                    }
                });

                $(document).on('click', '#ModifierButton', function() {
                    $("#modifierSemester").modal("show");

                });
                $("#myform").submit(function(event) {
                    $('#myform').hide();
                    $('#spinner1').show();
                });
            });
        </script>
    </body>

    </html>
<?php
}
?>