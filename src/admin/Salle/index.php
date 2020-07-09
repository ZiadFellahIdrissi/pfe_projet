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
        <title>Salles</title>
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

        .item {
            padding-left: 10%;
        }
    </style>

    <body>
        <div class="page-wrapper">
            <?php
            include '../pages/header.php';
            ?>
            <div class="main-content ">
                <?php include 'DML_Commentator.php';
                ?>
                <div class="container mb-3">
                    <nav aria-label="breadcrumb nov">
                        <ol class="breadcrumb nov">
                            <li class="breadcrumb-item"><a href="../pages">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Salles</li>
                        </ol>
                    </nav>
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-body salles" style="padding: 0;">
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
        <div class="modal fade" id="AjouteSalleModale" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body semesterChange">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border m-5" role="status" id="spinner1">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <form action="ajoute_salle.php" method="POST" id="myform">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="Nom_Salle" class="col-form-label">salle</label>
                                        <input type="text" class="form-control" name="Nom_Salle" id="Nom_Salle" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" id="Modifier" class="btn btn-primary" value="Ajouter" name="Modifier">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ModifierSalle" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body semesterChange">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border m-5" role="status" id="spinner2">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <form action="Modifier_salle.php" method="POST" id="myform1">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="Nom_SalleModifier" class="col-form-label">salle</label>
                                        <input type="text" class="form-control" name="Nom_SalleModifier" id="Nom_SalleModifier" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="id_salle" name="id_salle">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" id="Modifier" class="btn btn-primary" value="Modifier" name="Modifier" title="Modifier">
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
                // var url = window.location.toString();
                // if (url.indexOf("?") > 0) {
                //     var clean_uri = uri.substring(0, url.indexOf("?"));
                //     window.history.replaceState({}, document.title, clean_url);
                // }
                $('.toast').toast({
                    delay: 5000
                });
                $('.toast').toast('show');

                $("#spinner").hide();
                $("#spinner1").hide();
                $("#spinner2").hide();

                $.ajax({
                    url: "affiche_tabe_Salle.php",
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
                        $('.salles').html(data);
                    }
                });

                $(document).on('click', '#ajouteSalleButton', function() {
                    $("#AjouteSalleModale").modal("show");
                });
                $(document).on('click', '.Open_modifierSalle', function() {
                    let id_salle = $(this).attr("id");
                    $("#ModifierSalle").modal("show");
                    $.ajax({
                        url: "fetch_salle_info.php",
                        method: "GET",
                        data: {
                            id_salle: id_salle
                        },
                        contentType: "application/json",
                        dataType: 'json',
                        beforeSend: function() {
                            $("#spinner2").show();
                            $("#myform1").hide();
                        },
                        complete: function() {
                            $("#spinner2").hide();
                            $("#myform1").show();
                        },
                        success: function(data) {
                            $("#id_salle").val(data.id_salle);
                            $("#Nom_SalleModifier").val(data.salle);


                        }
                    });
                });

                $(document).on('click', '.supprimier_salle', function() {
                    let id_salle = $(this).attr("id");
                    $.ajax({
                        url: "Supprimier_Salle.php",
                        method: "GET",
                        data: {
                            id_salle: id_salle
                        },
                        dataType: "text",
                        beforeSend: function() {
                            $(".salletable").hide();
                            // $("#spinner2").show();
                        },
                        complete: function() {
                            // $("#spinner2").hide();
                        },
                        success: function(data) {
                            // history.pushState({}, '', '?'+data);
                            // $('.salles').load("./affiche_tabe_Salle.php");

                            location.href = "./?" + data;

                        }
                    });
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