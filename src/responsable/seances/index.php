<?php
include_once '../../../core/init.php';
$user = new User_Prof();
$db = DB::getInstance();
if (!$user->isLoggedIn()) {
    header('Location: ../../login');
} else {
    $nom    = $user->data()->nom;
    $prenom = $user->data()->prenom;
    $email  = $user->data()->email;
    $id     = $user->data()->id;
    $imagepath = $user->data()->imagepath;
?>
    <html lang="en">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title Page-->
        <title>Seances</title>

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

        <!-- HEADER DESKTOP-->
        <?php include '../pages/headerDesktop.php' ?>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <?php include '../pages/headerPhone.php' ?>
        <!-- END HEADER MOBILE -->

        <!-- BREADCRUMB-->
        <section class="au-breadcrumb2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="au-breadcrumb-content">
                            <div class="au-breadcrumb-left">
                                <span class="au-breadcrumb-span">You are here:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item seprate">
                                        <a href="../">Dashboard</a> <span>/</span>
                                    </li>
                                    <li class="list-inline-item">Seances</li>
                                </ul>
                            </div>
                            <form class="au-form-icon--sm" action="" method="post">
                                <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports...">
                                <button class="au-btn--submit2" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END BREADCRUMB-->

        <!-- spinner -->
        <div class="d-flex justify-content-center">
            <div class="spinner-border m-5" role="status" id="spinner1">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- Calendar-->
        <section class="statistic statistic2 calendareContainer">
            <div class="container ">
                <div class="container ">
                    <div class="container ">
                        <div class="au-card shadow-lg bg-white rounded">
                            <div id="calendar">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section><br><br>
        <!-- Calendar-->

        <!-- un modal pout ajoute un controle -->
        <div class="modal fade" id="addSeance" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <!-- Module -->
                        <div class="form-group">
                            <label for="module" class="col-form-label">Module</label>
                            <select class="form-control" id="module">
                                <?php
                                $sql = "SELECT Module.intitule, Module.id_module
                                        FROM Module
                                        JOIN dispose_de ON Module.id_module = dispose_de.id_module
                                        JOIN Filiere ON dispose_de.id_filiere = Filiere.id_filiere
                                        WHERE Filiere.id_responsable = ?";
                                $resultat = $db->query($sql, [$id]);
                                foreach ($resultat->results() as $row) {
                                ?>
                                    <option value="<?php echo $row->id_module ?>"><?php echo $row->intitule ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <!-- date controle -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="date_seance" class="col-form-label">Date du Controle</label>
                                    <input type="date" class="form-control" id="date_seance" readonly="readonly">
                                </div>
                            </div>
                            <div class="col">
                                <label for="salle" class="col-form-label">Salle</label>
                                <input type="text" class="form-control" id="salle" required>
                            </div>
                        </div>

                        <!-- heur debut / heur fin -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="heur_debut" class="col-form-label">Heure Debut</label>
                                    <input type="time" class="form-control" id="heur_debut" readonly="readonly">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="heur_fin" class="col-form-label">Heure Fin </label>
                                    <input type="time" class="form-control" id="heur_fin" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" id="ajouterSeance" name="ajouter">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL -->



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
                $('#spinner1').hide();

                var calendar = $('#calendar').fullCalendar({
                    // loading: function(bool) {
                    //     // $('#spinner0').show();
                    //     $('#spinner1').show();
                    //     $('.calendareContainer').hide();
                    // },
                    // eventAfterAllRender: function(view) {
                    //     // $('#spinner0').hide();
                    //     $('#spinner1').hide();
                    //     $('.calendareContainer').show();
                    // },
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
                    selectable: true,
                    selectHelper: true,
                    editable: true,

                    select: function(start, end) {
                        var date = $.fullCalendar.formatDate(start, 'Y-MM-DD');
                        var heure_debut = $.fullCalendar.formatDate(start, 'HH:mm');
                        var heure_fin = $.fullCalendar.formatDate(end, 'HH:mm');

                        // tester la date de seance
                        let dateNow = GetFormattedDate();
                        let d1 = new Date(date);
                        let d2 = new Date(dateNow);
                        if (d1.getTime() <= d2.getTime()) {
                            calendar.fullCalendar("refetchEvents");
                            alert("Imposible d'ajouter une seance dans cette date");

                        } else {
                            $("#date_seance").val(date);
                            $("#heur_debut").val(heure_debut);
                            $("#heur_fin").val(heure_fin);
                            $("#addSeance").modal('show');
                        }
                    },

                    eventResize: function(e) {
                        var date = $.fullCalendar.formatDate(e.start, 'Y-MM-DD');
                        var heure_debut = $.fullCalendar.formatDate(e.start, 'HH:mm');
                        var heure_fin = $.fullCalendar.formatDate(e.end, 'HH:mm');
                        var id = e.id;
                        //test de la durée du seance
                        var d1 = new Date(date + ' ' + heure_debut);
                        var d2 = new Date(date + ' ' + heure_fin);
                        var diff = ((d2.getHours() * 60 + d2.getMinutes()) - (d1.getHours() * 60 + d1.getMinutes())) / 60;
                        console.log(diff);
                        //test de la date du seance
                        let dateNow = GetFormattedDate();
                        let d01 = new Date(date);
                        let d02 = new Date(dateNow);

                        if (d01.getTime() <= d02.getTime()) {
                            alert("impossible d'modifier cette seance dans cetter date");
                            calendar.fullCalendar("refetchEvents");
                        } else {
                            if (diff < 1) {
                                alert("La durée du controle doit être égale à une heure au minimum!");
                                calendar.fullCalendar("refetchEvents");
                            } else {
                                $.ajax({
                                    url: 'modifierSeance.php',
                                    type: 'GET',
                                    data: {
                                        date: date,
                                        heure_debut: heure_debut,
                                        heure_fin: heure_fin,
                                        id: id
                                    },
                                    success: function() {
                                        alert("seance modifier");
                                        calendar.fullCalendar("refetchEvents");
                                    },
                                    error: function() {
                                        alert('failure');
                                    }
                                })
                            }
                        }
                    },

                    eventDrop: function(e) {
                        var date = $.fullCalendar.formatDate(e.start, 'Y-MM-DD');
                        var heure_debut = $.fullCalendar.formatDate(e.start, 'HH:mm');
                        var heure_fin = $.fullCalendar.formatDate(e.end, 'HH:mm');
                        var id = e.id;

                        // pour test la date de seance
                        let dateNow = GetFormattedDate();
                        let d1 = new Date(date);
                        let d2 = new Date(dateNow);

                        if (d1.getTime() <= d2.getTime()) {
                            alert("Imposible de modifier cette Controle");
                            calendar.fullCalendar("refetchEvents");
                        } else {
                            $.ajax({
                                url: 'modifierSeance.php',
                                type: 'GET',
                                data: {
                                    date: date,
                                    heure_debut: heure_debut,
                                    heure_fin: heure_fin,
                                    id: id

                                },
                                success: function() {
                                    alert("tmodifat");
                                    calendar.fullCalendar("refetchEvents");
                                },
                                error: function() {
                                    alert('failure');
                                }

                            });
                        }
                    },

                    eventClick: function(event) {
                        var date = $.fullCalendar.formatDate(event.start, 'Y-MM-DD');
                        var dateNow = GetFormattedDate();
                        var d1 = new Date(date);
                        var d2 = new Date(dateNow);

                        if (d1.getTime() <= d2.getTime()) {
                            alert("Impossible de supprimer cette séance");
                            return false;
                        } else {
                            if (confirm("Vous êtes sure de supprimer cet seance?")) {
                                var id = event.id;
                                $.ajax({
                                    url: 'supprimerSeance.php',
                                    type: "GET",
                                    data: {
                                        id: id
                                    },
                                    success: function() {
                                        alert("la séance a ete suprimer avec secu");
                                        calendar.fullCalendar("refetchEvents");
                                    }
                                })
                            }
                        }
                    }
                });
                // End FULL CALENDAR

                function GetFormattedDate() {
                    var todayTime = new Date();
                    var month = todayTime.getMonth() + 1;
                    var day = todayTime.getDate();
                    var year = todayTime.getFullYear();
                    return year + "-" + month + "-" + day;

                }

                $(document).on('click', '#ajouterSeance', function() {
                    var module = $("#module").val();
                    var date = $("#date_seance").val();
                    var salle = $("#salle").val();
                    var heure_debut = $("#heur_debut").val();
                    var heure_fin = $("#heur_fin").val();

                    // tester la date de seance
                    let dateNow = GetFormattedDate();
                    let d01 = new Date(date);
                    let d02 = new Date(dateNow);

                    //test de la durée du seance
                    var d1 = new Date(date + ' ' + heure_debut);
                    var d2 = new Date(date + ' ' + heure_fin);
                    var diff = ((d2.getHours() * 60 + d2.getMinutes()) - (d1.getHours() * 60 + d1.getMinutes())) / 60;
                    console.log(diff);
                    if (d01.getTime() <= d02.getTime()) {
                        alert("impossible d'ajouter cette seance dans cetter date");
                        return false;
                    } else {
                        if (diff < 1) {
                            alert("La durée du controle doit être égale à une heure au minimum!");
                        } else {
                            $.ajax({
                                url: "ajoute_seance.php",
                                method: 'GET',
                                data: {
                                    module: module,
                                    date: date,
                                    salle: salle,
                                    heure_debut: heure_debut,
                                    heure_fin: heure_fin
                                },
                                contentType: "application/json",
                                dataType: 'json',
                                success: function(data) {
                                    if (data.error) {
                                        alert(data.error);
                                    } else {
                                        calendar.fullCalendar("refetchEvents");
                                        $("#addSeance").modal('hide');
                                    }
                                },
                                error: function() {
                                    alert('failure');
                                }
                            });
                        }
                    }

                });

                $(".fc-next-button").attr("title", "Semaine suivante");
                $(".fc-prev-button").attr("title", "Semaine précédente");
                $(".fc-today-button").attr("title", "Aujourd'hui");
                $(".fc-today-button").text("Semaine courante");
                $(".fc-next-button").on('click', function() {
                    $(".fc-next-button").attr("disabled", "disabled");
                    $(".fc-next-button").css("cursor", "default");
                });
            });
        </script>
    </body>

    </html>
<?php
}
?>
