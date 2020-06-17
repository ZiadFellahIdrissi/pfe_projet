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
?>
    <html lang="en">


    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title Page-->
        <title>Controles</title>

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

        <!-- PAGE CONTENT-->
        <!-- <div class="page-content--bgf7"> -->
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
                                    <li class="list-inline-item">Controles</li>
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

        <!-- MODULES-->
        <section class="statistic statistic2">
            <div class="container">
                <div class="container">
                    <div class="au-card" style="background: rgba(0, 0, 0, 0.03)">
                        <div id="calendar">

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="addControle" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <!-- Module -->
                        <div class="form-group">
                            <label for="module" class="col-form-label">Module</label>
                            <select class="form-control" id="module" name="module">
                                <?php
                                $sql = "SELECT Module.intitule, Module.id_module
                                        FROM Module
                                        WHERE Module.id_enseignant = ?";
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
                        <div class="form-group">
                            <label for="date_controle" class="col-form-label">Date du Controle</label>
                            <input type="date" class="form-control" name="date_controle" id="date_controle" required>
                        </div>

                        <!-- heur debut / heur fin -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="heur_debut" class="col-form-label">Heure Debut</label>
                                    <input type="time" class="form-control" name="heur_debut" id="heur_debut" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="heur_fin" class="col-form-label">Heure Fin </label>
                                    <input type="time" class="form-control" name="heur_fin" id="heur_fin" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" id="ajouterControle" name="ajouter">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modules -->

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
                var calendar = $('#calendar').fullCalendar({
                    locale: 'fr-ch',
                    editable: true,
                    customButtons: {
                        ajouteControle: {
                            text: 'ajoute un Controle',
                            click: function() {
                                $("#addControle").modal('show');
                            }
                        }
                    },
                    header: {
                        left: 'prev,next,today ajouteControle',
                        center: 'title',
                        right: 'month,agendaWeek,list'
                    },
                    theme: true,
                    themeSystem: 'bootstrap4',
                    themeName: 'Lux',
                    events: 'loadControles.php?id=<?php echo $id ?>',
                    selectable: true,
                    selectHelper: true,
                    editable: true,

                    select: function(start, end) {
                        var dateControle = $.fullCalendar.formatDate(start, 'Y-MM-DD');
                        var heur_debut = $.fullCalendar.formatDate(start, 'HH:mm');
                        var heur_fin = $.fullCalendar.formatDate(end, 'HH:mm');
                        $("#date_controle").val(dateControle);
                        $("#heur_debut").val(heur_debut);
                        $("#heur_fin").val(heur_fin);
                        $("#addControle").modal('show');
                    },
                    eventResize: function(e) {
                        var dateControle = $.fullCalendar.formatDate(e.start, 'Y-MM-DD');
                        var heur_debut = $.fullCalendar.formatDate(e.start, 'HH:mm');
                        var heur_fin = $.fullCalendar.formatDate(e.end, 'HH:mm');
                        var id_controle = e.id;
                        //test de la durée du controle
                        var d1 = new Date(dateControle+' '+heur_debut);
                        var d2 = new Date(dateControle+' '+heur_fin);
                        var diff = (d2.getHours()*60 + d2.getMinutes() - d1.getHours()*60 + d1.getMinutes())/60;
                        console.log(diff);
                        if (diff < 1) {
                            alert("La durée du controle doit être égale à une heure au minimum!");
                            calendar.fullCalendar("refetchEvents");
                        } else {
                            $.ajax({
                                url: 'modifierControles.php',
                                type: 'GET',
                                data: {
                                    dateControle: dateControle,
                                    heur_debut: heur_debut,
                                    heur_fin: heur_fin,
                                    id_controle: id_controle

                                },
                                success: function() {
                                    alert("tmodifat");
                                    calendar.fullCalendar("refetchEvents");
                                },
                                error: function() {
                                    alert('failure');
                                }
                            })
                        }
                    },
                    eventDrop: function(e) {
                        var dateControle = $.fullCalendar.formatDate(e.start, 'Y-MM-DD');
                        var heur_debut = $.fullCalendar.formatDate(e.start, 'HH:mm');
                        var heur_fin = $.fullCalendar.formatDate(e.end, 'HH:mm');
                        var id_controle = e.id;
                        $.ajax({
                            url: 'modifierControles.php',
                            type: 'GET',
                            data: {
                                dateControle: dateControle,
                                heur_debut: heur_debut,
                                heur_fin: heur_fin,
                                id_controle: id_controle

                            },
                            success: function() {
                                alert("tmodifat");
                                calendar.fullCalendar("refetchEvents");
                            },
                            error: function() {
                                alert('failure');
                            }

                        })
                    },
                    eventClick: function(event) {
                        if (confirm("Vous êtes sure de supprimer cet examen !!")) {
                            var id = event.id;
                            $.ajax({
                                url: 'supprimerExamen.php',
                                type: "GET",
                                data: {
                                    id_controle: id
                                },
                                success: function() {
                                    //modal
                                    calendar.fullCalendar("refetchEvents");
                                }
                            })
                        }
                    }
                            

                });
                $(document).on('click', '#ajouterControle', function() {
                    var module = $("#module").val();
                    var dateControle = $("#date_controle").val();
                    var heur_debut = $("#heur_debut").val();
                    var heur_fin = $("#heur_fin").val();
                    //test de la durée du controle
                    var d1 = new Date(dateControle+' '+heur_debut);
                    var d2 = new Date(dateControle+' '+heur_fin);
                    var diff = (d2.getHours()*60 + d2.getMinutes() - d1.getHours()*60 + d1.getMinutes())/60;
                    console.log(diff);
                    if (diff < 1) {
                        alert("La durée du controle doit être égale à une heure au minimum!");
                    } else {
                        $.ajax({
                            url: "ajoute_controle.php",
                            method: 'GET',
                            data: {
                                module: module,
                                dateControle: dateControle,
                                heur_debut: heur_debut,
                                heur_fin: heur_fin
                            },
                            contentType: "application/json",
                            dataType: 'json',
                            success: function(data) {
                                if (data.error) {
                                    alert(data.error);
                                } else {
                                    calendar.fullCalendar("refetchEvents");
                                    $("#addControle").modal('hide');
                                }
                            },
                            error: function() {
                                alert('failure');
                            }
                        });
                    }
                });

            });
        </script>

    </body>

    </html>
<?php
}
?>