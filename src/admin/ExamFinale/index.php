<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';

$user = new User_Admin();
$db = DB::getInstance();
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../../../layout/css/animation.css" rel="stylesheet" type="text/css" />
        <title>Responsables</title>
        <!-- fonts -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <!-- Bootstrap CSS-->
        <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">
        <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" media="all" />
        <!-- lib CSS-->
        <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href='../../../lib/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />
        <link href="../../../lib/fullcalendar-3.10.0/fullcalendar.print.css" rel="stylesheet" media="print">
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
        <div class="page-wrapper">
            <?php
            include '../pages/header.php';
            ?>
            <div class="main-content">
                <div class="container mb-3" style="padding-top: 0;">
                    <nav aria-label="breadcrumb nov">
                        <ol class="breadcrumb nov">
                            <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Exames Finale</li>
                        </ol>
                    </nav>
                    <div class="deru" style="font-weight: bold; text-align: center">
                        <?php echo $min_Exame_finale . ' To  ' . $max_Exame_finale ?>
                    </div>
                    <div class="modal-content ">
                        <div class="container" style="padding: 2%;">
                            <div id="calendar">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- un modal pout ajoute un Exame -->
        <div class="modal fade" id="addExame" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <!-- Filiere -->
                        <div class="form-group">
                            <label for="filiere" class="col-form-label">Module</label>
                            <select class="form-control" id="filiere" name="filiere">
                                <option value=''>Choisissez Filiere</option>
                                <?php
                                $sql = "SELECT nom_filiere, id_filiere FROM Filiere where Filiere.etat=?";
                                $resultat = $db->query($sql, [1]);
                                foreach ($resultat->results() as $row) {
                                ?>
                                    <option value=<?php echo $row->id_filiere ?>><?php echo $row->nom_filiere ?>
                                    </option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>

                        <!-- Module -->
                        <div class="form-group">
                            <label for="module" class="col-form-label">Module</label>
                            <select class="form-control" id="modules" name="module">
                                <option value='0' style="display: none;">
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-border m-5" role="status" id="spinner">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </option>
                            </select>
                        </div>

                        <!-- date controle -->
                        <div class="form-group">
                            <label for="date_controle" class="col-form-label">Date du Controle</label>
                            <input type="date" class="form-control" name="date_controle" id="date_controle" required>
                        </div>
                        <div class="form-group">
                            <label for="salle" class="col-form-label">Salle</label>
                            <select class="form-control" id="salle">
                                <?php
                                $sql = "SELECT *
                                        FROM salle";
                                $resultat = $db->query($sql, []);
                                foreach ($resultat->results() as $row) {
                                ?>
                                    <option value="<?php echo $row->id_salle ?>"><?php echo $row->salle ?></option>
                                <?php
                                }
                                ?>
                            </select>
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
                        <button type="button" class="btn btn-primary" id="ajouterExame" name="ajouter">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL -->




        <script type="text/javascript" src="../../../layout/js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script type="text/javascript" src="../../../layout/js/bootstrap.min.js "></script>
        <!-- lib JS   -->
        <script type="text/javascript" src="../../../lib/animsition/animsition.min.js "></script>
        <!-- Main JS-->
        <script type="text/javascript" src="../../../layout/js/main.js "></script>
        <!-- <script type="text/javascript" src="../../../layout/js/animation.js"></script> -->
        <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../../layout/js/admin/responsable.js"></script>
        <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
        <script src="../../../lib/fullcalendar-3.10.0/lib/moment.min.js"></script>
        <script src="../../../lib/fullcalendar-3.10.0/fullcalendar.js"></script>
        <script src="../../../lib/fullcalendar-3.10.0/locale-all.js"></script>
        <script>
            $("#spinner").hide();
            $(document).ready(function() {
                $('#filiere').change(affiche);

                function affiche() {
                    var id_filiere = $("#filiere").val();
                    if (id_filiere) {
                        $.ajax({
                            url: "fetchModules.php",
                            method: "GET",
                            data: {
                                id_filiere: id_filiere
                            },
                            beforeSend: function() {
                                $("#spinner").show();
                            },
                            complete: function() {
                                $("#spinner").hide();
                            },
                            dataType: "text",
                            success: function(data) {
                                $('#modules').html(data);
                            }
                        });
                    }
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                var calendar = $('#calendar').fullCalendar({
                    validRange: {
                        start: '<?php echo $min_Exame_finale;  ?>',
                        end: '<?php echo $max_Exame_finale; ?>',
                    },
                    locale: 'fr-ch',
                    height: 600,
                    editable: true,
                    customButtons: {
                        ajouteExame: {
                            text: 'Ajoute un Exame',
                            click: function() {
                                $("#addExame").modal('show');
                            }
                        }
                    },
                    header: {
                        left: 'prev,today,next, ajouteExame',
                        center: 'title',
                        right: ''
                    },
                    events: 'loadExames.php',
                    selectable: true,
                    selectHelper: true,
                    editable: true,
                    theme: true,
                    themeSystem: 'bootstrap4',

                    select: function(start, end) {
                        var dateExame = $.fullCalendar.formatDate(start, 'Y-MM-DD');
                        var heur_debut = $.fullCalendar.formatDate(start, 'HH:mm');
                        var heur_fin = $.fullCalendar.formatDate(end, 'HH:mm');

                        $("#date_controle").val(dateExame);
                        $("#heur_debut").val(heur_debut);
                        $("#heur_fin").val(heur_fin);
                        $("#addExame").modal('show');

                    },
                    eventDrop: function(e) {
                        var dateExamen = $.fullCalendar.formatDate(e.start, 'Y-MM-DD');
                        var heur_debut = $.fullCalendar.formatDate(e.start, 'HH:mm');
                        var heur_fin = $.fullCalendar.formatDate(e.end, 'HH:mm');
                        var id_Examen = e.id;


                        $.ajax({
                            url: 'modifierExamens.php',
                            type: 'GET',
                            data: {
                                dateExamen: dateExamen,
                                heur_debut: heur_debut,
                                heur_fin: heur_fin,
                                id_Examen: id_Examen

                            },
                            success: function() {
                                alert("Examen modifié");
                                calendar.fullCalendar("refetchEvents");
                            },
                            error: function() {
                                alert('failure');
                            }

                        });

                    },
                    eventClick: function(event) {
                        var dateControle = $.fullCalendar.formatDate(event.start, 'Y-MM-DD');
                        if (confirm("Vous êtes sure de supprimer cet examen !!")) {
                            var id = event.id;
                            $.ajax({
                                url: 'supprimerExamen.php',
                                type: "GET",
                                data: {
                                    id_examen: id
                                },
                                success: function() {
                                    alert("le controle ete suprimer avec secu");
                                    calendar.fullCalendar("refetchEvents");
                                }
                            })
                        }
                    }
                });

                $(document).on('click', '#ajouterExame', function() {
                    var module = $("#modules").val();
                    var dateExames = $("#date_controle").val();
                    var heur_debut = $("#heur_debut").val();
                    var heur_fin = $("#heur_fin").val();
                    var salle = $("#salle").val();

                    var d1 = new Date(dateExames + ' ' + heur_debut);
                    var d2 = new Date(dateExames + ' ' + heur_fin);
                    var diff = (d2.getHours() * 60 + d2.getMinutes() - d1.getHours() * 60 + d1.getMinutes()) / 60;
                    if (diff < 1) {
                        alert("La durée du Exame doit être égale à une heure au minimum!");
                    } else {
                        $.ajax({
                            url: "ajoute_exames.php",
                            method: 'GET',
                            data: {
                                module: module,
                                dateExames: dateExames,
                                heur_debut: heur_debut,
                                heur_fin: heur_fin,
                                salle: salle
                            },
                            contentType: "application/json",
                            dataType: 'json',
                            success: function(data) {
                                if (data.error) {
                                    alert(data.error);
                                } else {
                                    calendar.fullCalendar("refetchEvents");
                                    $("#addExame").modal('hide');
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