<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$user = new User_Etudiant();
if (!$user->isLoggedIn()) {
    header('Location: ../../login/');
} else {
    $nom = $user->data()->nom;
    $prenom = $user->data()->prenom;
    $email = $user->data()->email;
    $id = $user->data()->id;
    $imagepath = $user->data()->imagepath;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title Page-->
        <title>Calendar des exames finale</title>

        <!-- Fontfaces CSS-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">


        <!-- lib CSS-->
        <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
        <link href='../../../lib/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />
        <!-- Main CSS-->
        <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">
    </head>

    <style>
        .modal-header {
            background-color: #dcdde1;
        }

        /* .modal-body {
            background: #67e6dc;
        } */

        .nov {
            background: #f5f5f5;
        }
    </style>

    <body class="">
        <?php include '../pages/header.php' ?>
        <section class="au-breadcrumb m-t-75">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">Vous êtes là :</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Calender des examens finale</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- relvé de notes -->
        <div class="section__content section__content--p30">
            <div class="alert alert-primary" style="font-weight: bold; text-align: center" role="alert">
                <?php echo $min_Exame_finale . ' To  ' . $max_Exame_finale ?>
            </div>
            <div id="calendar">

            </div>
        </div>
        <!-- un modal pour les information de l'exam -->
        <div class="modal fade" id="ExamInfos" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border m-5" role="status" id="spinner">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="modal-body">

                        <!-- Module / Date du Examen  -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="Module" class="col-form-label">Module</label>
                                    <input type="text" class="form-control-plaintext" id="Module" readonly style="font-weight: bold;">
                                </div>
                                <div class="col">
                                    <label for="date_controle" class="col-form-label">Date du Examen</label>
                                    <input type="date" class="form-control-plaintext" id="date_controle" readonly style="font-weight: bold;">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- heur debut / heur fin -->
                        <div class="row">
                            <div class="col-md-7">
                                <label for="heur_debut" class="col-form-label">Heure Debut</label>
                                <input type="time" class="form-control-plaintext" name="heur_debut" id="heur_debut" readonly style="font-weight: bold;">
                            </div>
                            <div class="col">
                                <label for="heur_fin" class="col-form-label">Heure Fin </label>
                                <input type="time" class="form-control-plaintext" name="heur_fin" id="heur_fin" readonly style="font-weight: bold;">
                            </div>
                        </div>
                        <hr>

                        <!-- Type / Salle -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="type" class="col-form-label">Session</label>
                                    <input type="text" class="form-control-plaintext" id="type" readonly style="font-weight: bold;">
                                </div>
                                <div class="col">
                                    <label for="salle" class="col-form-label">Salle</label>
                                    <input type="text" class="form-control-plaintext" id="salle" readonly style="font-weight: bold;">
                                </div>
                            </div>
                        </div>
                        <!-- fin modale information -->

                    </div>

                    <!-- modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <input type="hidden" id="my_id" value="<?php echo $id; ?>">


        <!-- Jquery JS-->
        <script src="../../../layout/js/jquery-3.4.1.min.js "></script>

        <!-- Bootstrap JS-->
        <script src="../../../layout/js/bootstrap.min.js "></script>

        <!-- lib JS   -->
        <script src="../../../lib/animsition/animsition.min.js "></script>
        <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../../lib/printThis/printThis.js"></script>

        <script src="../../../lib/fullcalendar-3.10.0/lib/moment.min.js"></script>
        <script src="../../../lib/fullcalendar-3.10.0/fullcalendar.js"></script>
        <script src="../../../lib/fullcalendar-3.10.0/locale-all.js"></script>

        <!-- Main JS-->
        <script src="../../../layout/js/main.js "></script>
        <script>
            $(document).ready(function() {
                var my_id = $("#my_id").val();
                var calendar = $('#calendar').fullCalendar({
                    validRange: {
                        start: '<?php echo $min_Exame_finale;  ?>',
                        end: '<?php echo $max_Exame_finale; ?>',
                    },
                    locale: 'fr-ch',
                    height: 600,
                    header: {
                        left: 'prev,today,next, ajouteExame',
                        center: 'title',
                        right: ''
                    },
                    // defaultView: 'listWeek',
                    // aspectRatio: 1.5,
                    events: 'loadExames.php/?id='+my_id,
                    theme: true,
                    themeSystem: 'bootstrap4',
                    eventClick: function(event) {
                        $("#ExamInfos").modal("show");
                        var id = event.id;
                        $.ajax({
                            url: 'fetch_exam_information.php',
                            type: "GET",
                            data: {
                                id_examen: id
                            },
                            contentType: "application/json",
                            dataType: 'json',
                            beforeSend: function() {
                                $("#spinner").show();
                                $(".modal-body").hide();
                            },
                            complete: function() {
                                $("#spinner").hide();
                                $(".modal-body").show();
                            },
                            success: function(data) {
                                $("#Module").val(data.intitule);
                                $("#date_controle").val(data.date);
                                $("#heur_debut").val(data.h_debut);
                                $("#heur_fin").val(data.h_fin);
                                $("#salle").val(data.salle);
                                if (data.type == "exam_finale_normal")
                                    $("#type").val("Session Normal");
                                else
                                    $("#type").val("Session Rattrapage");

                            }
                        })

                    }
                });

            });
        </script>

    </body>

    </html>
<?php
}
?>