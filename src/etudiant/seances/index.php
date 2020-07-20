<?php
include_once '../../../core/init.php';
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
    <html lang="fr">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title Page-->
        <title>Emploi de temp</title>

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
        <link href="../../../lib/fullcalendar-3.10.0/fullcalendar.print.css" rel="stylesheet" media="print">


        <!-- Main CSS-->
        <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">

    </head>

    <body>
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
                                        <li class="list-inline-item">Seances</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section__content section__content--p30">
            <div class="bg-white rounded" style="padding: 0;">
                <div id="calendar">

                </div>
            </div>
        </div>
        <div class="modal fade" id="SeanceInfos" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border m-5" role="status" id="spinner00">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="modal-body">

                        <!-- Module / Date du Seance  -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="Module" class="col-form-label">Module</label>
                                    <input type="text" class="form-control-plaintext" id="Module" readonly style="font-weight: bold;">
                                </div>
                                <div class="col">
                                    <label for="date_seance" class="col-form-label">Date Seance</label>
                                    <input type="date" class="form-control-plaintext" id="date_seance" readonly style="font-weight: bold;">
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

        <!-- Jquery JS-->
        <script src="../../../layout/js/jquery-3.4.1.min.js "></script>

        <!-- Bootstrap JS-->
        <script src="../../../layout/js/bootstrap.min.js "></script>

        <!-- lib JS   -->
        <script src="../../../lib/animsition/animsition.min.js "></script>
        <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../../lib/fullcalendar-3.10.0/lib/moment.min.js"></script>
        <script src="../../../lib/fullcalendar-3.10.0/fullcalendar.js"></script>
        <script src="../../../lib/fullcalendar-3.10.0/locale-all.js"></script>

        <!-- Main JS-->
        <script src="../../../layout/js/main.js "></script>
        <script>
            $(document).ready(function() {
                $('#spinner00').hide();
                var calendar = $('#calendar').fullCalendar({
                    locale: 'fr-ch',
                    minTime: "07:00:00",
                    maxTime: "23:00:00",
                    header: {
                        left: 'prev,next,today',
                        center: 'title',
                        right: ''
                    },
                    defaultView: 'agendaWeek',
                    theme: true,
                    themeSystem: 'bootstrap4',
                    events: 'loadSeances.php?id=<?php echo $id ?>',
                    eventClick: function(event) {
                        $("#SeanceInfos").modal("show");
                        var id = event.id;
                        $.ajax({
                            url: 'fetch_seance_information.php',
                            type: "GET",
                            data: {
                                id_seance: id
                            },
                            contentType: "application/json",
                            dataType: 'json',
                            beforeSend: function() {
                                $("#spinner00").show();
                                $(".modal-body").hide();
                            },
                            complete: function() {
                                $("#spinner00").hide();
                                $(".modal-body").show();
                            },
                            success: function(data) {
                                $("#Module").val(data.intitule);
                                $("#date_seance").val(data.date_seance);
                                $("#heur_debut").val(data.h_debut);
                                $("#heur_fin").val(data.h_fin);
                                $("#salle").val(data.salle);
                            }
                        })

                    }
                });
                $(".fc-next-button").attr("title", "Semaine suivante");
                $(".fc-prev-button").attr("title", "Semaine précédente");
                $(".fc-today-button").attr("title", "Aujourd'hui");
                $(".fc-today-button").text("Semaine courante");
                $(".fc-prev-button").hide();

                $(".fc-next-button").on('click', function() {
                    $(".fc-next-button").attr("disabled", "disabled");
                    $(".fc-next-button").css("cursor", "default");
                });
            });
        </script>


    </body>

    </html>
<?php } ?>
