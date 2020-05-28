<?php
include '../../connection.php';
include_once '../../../core/init.php';
$user = new User_Admin();
if (!$user->isLoggedIn()) {
    header('Location: ./login_page.php');
} else {
    $nom = $user->data()->username;
    $email = $user->data()->email;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../../../layout/css/animation.css" rel="stylesheet" type="text/css" />
        <title>Examens</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />

        <!-- lib CSS-->
        <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href='../../../lib/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />
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

    <body class="">
        <!--animsition-->
        <div class="page-wrapper">
            <?php include 'header.php' ?>
            <div class="main-content ">
                <?php include '../../DML_Commentator.php';
                DMLCommentator("");
                ?>
                <div class="container mb-3">
                    <nav aria-label="breadcrumb nov ">
                        <ol class="breadcrumb nov ">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="dashboard.php">Examens</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Calendrier des Exames</li>
                        </ol>
                    </nav>

                    <div class="row">
                        <div class="col">
                            <div class="au-card">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div> <!-- hade div daroori tb9a hitache dyal wahde dive ma7loola fl header   -->
        <div class="modal fade" id="addExame" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="../Examens/ajoute_examen.php" method="POST">
                            <!-- ================================================================================== -->
                            <div class="form-group">
                                <label for="module" class="col-form-label">module</label>
                                <select class="form-control" id="module" name="module">
                                    <?php
                                    $sqlModule = "SELECT * FROM module order by intitule";
                                    $res = mysqli_query($conn, $sqlModule);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <option value=<?php echo $row["id_module"]; ?>><?php echo $row["intitule"]; ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <!-- =======================la salle et type======================= -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="salle" class="col-form-label">salle</label>
                                        <select class="form-control" id="salle" name="salle" required>
                                            <option value="salle_A">salle_A</option>
                                            <option value="salle_B">salle_B</option>
                                            <option value="salle_C">salle_C</option>
                                            <option value="salle_D">salle_D</option>
                                            <option value="salle_E">salle_E</option>
                                            <option value="salle_Ex1">salle_EX1</option>
                                            <option value="salle_Ex2">salle_Ex2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="type" class="col-form-label">Type</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="Controle">Controle</option>
                                        <option value="Exam Final">Exam Final</option>
                                    </select>
                                </div>
                            </div>
                            <!-- =======================dates======================= -->
                            <div class="form-group">
                                <label for="date_examen" class="col-form-label">Date Examen</label>
                                <input type="date" class="form-control" name="date_examen" id="date_examen" required>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="heur_debut" class="col-form-label">heur debut</label>
                                        <input type="time" class="form-control" name="heur_debut" id="heur_debut" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="heur_fin" class="col-form-label">heur Fin </label>
                                        <input type="time" class="form-control" name="heur_fin" id="heur_fin" required>
                                    </div>
                                </div>
                            </div>
                            <!-- ==================================================== -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                            </div>
                        </form>
                        <!-- ===================================================================== -->
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
        <script src="../../../lib/fullcalendar-3.10.0/lib/moment.min.js"></script>
        <script src="../../../lib/fullcalendar-3.10.0/fullcalendar.js"></script>

        <!-- Main JS-->
        <script type="text/javascript" src="../../../layout/js/main.js "></script>
        <script>
            $(document).ready(function() {
                var calendar = $('#calendar').fullCalendar({
                    editable: true,

                    customButtons: {
                        myCustomButton: {
                            text: 'ajoute un examen',
                            click: function() {
                                $("#addExame").modal('show');
                            }
                        }
                    },
                    header: {
                        left: 'prev,next today myCustomButton',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,list'
                    },
                    events: '../Examens/loadExames.php',
                    selectable: true,
                    selectHelper: true,
                    editable: true,

                    select: function(start, end, allDay) {
                        var dateExam = $.fullCalendar.formatDate(start, "Y-MM-DD");
                        var heur_debut = $.fullCalendar.formatDate(start, "HH:mm");
                        var heur_fin = $.fullCalendar.formatDate(end, "HH:mm");
                        $("#addExame").modal('show');
                        $("#date_examen").val(dateExam);
                        $("#heur_fin").val(heur_fin);
                        $("#heur_debut").val(heur_debut);

                    },

                    eventResize: function(event) {
                        var dateExam = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var heur_debut = $.fullCalendar.formatDate(event.start, "HH:mm");
                        var heur_fin = $.fullCalendar.formatDate(event.end, "HH:mm");
                        var id = event.id;
                        console.log(dateExam+' '+heur_debut+' '+heur_fin);
                        $.ajax({
                            url: '../Examens/ModifierExamen.php',
                            type: "GET",
                            data: {
                                dateExam: dateExam,
                                heur_debut: heur_debut,
                                heur_fin: heur_fin,
                                id: id
                            },
                            success: function() {
                                alert("Examen Modifier");
                                calendar.fullCalendar('refetchEvents');

                            },

                        })
                    },
                    eventDrop: function(event) {
                        var dateExam = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var heur_debut = $.fullCalendar.formatDate(event.start, "HH:mm");
                        var heur_fin = $.fullCalendar.formatDate(event.end, "HH:mm");
                        var id = event.id;
                        $.ajax({
                            url: '../Examens/ModifierExamen.php',
                            type: "GET",
                            data: {
                                dateExam: dateExam,
                                heur_debut: heur_debut,
                                heur_fin: heur_fin,
                                id: id
                            },
                            success: function() {
                                alert("Examen Modifier");
                                calendar.fullCalendar('refetchEvents');

                            },

                        })
                    },
                    eventClick: function(event) {
                        if (confirm("T'es sure tu veux supprimier cette examen !!")) {
                            var id = event.id;
                            $.ajax({
                                url: '../Examens/supprimerExamen.php',
                                type: "GET",
                                data: {
                                    id: id
                                },
                                success: function() {
                                    alert("Examen supprimer");
                                    calendar.fullCalendar('refetchEvents');
                                }
                            })
                        }
                    }

                });
            });
        </script>
    </body>

    </html>
<?php
}
?>