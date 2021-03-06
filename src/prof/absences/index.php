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
        <title>Absences</title>

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
        <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" media="all" />

        <!-- Main CSS-->
        <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">
    </head>

    <body>
        <!-- DML -->
        <?php include 'DML_Commentator.php' ?>
        <!-- END DML-->

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
                                <span class="au-breadcrumb-span">vous êtes ici:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item seprate">
                                        <a href="../">Dashboard</a><span> /</span>
                                    </li>
                                    <li class="list-inline-item">Abscences</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END BREADCRUMB-->

        <!-- TABLEAU DE GESTION DES ABSENCES -->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <select id="module" class="form-control">
                        <option value=''>Choisissez le module</option>
                        <?php
                        $sql = "SELECT intitule, id_module
                                            FROM Module
                                            WHERE id_enseignant = ? AND id_module In(SELECT id_module from Seance where
                                            date_seance between ? and ?)";
                        $startWeek =  date("Y-m-d", strtotime('monday this week'));
                        $endWeek =  date("Y-m-d", strtotime('sunday this week'));
                        $resultat = $db->query($sql, [$id, $startWeek, $endWeek]);
                        foreach ($resultat->results() as $row) {
                        ?>
                            <option value=<?php echo $row->id_module ?>><?php echo $row->intitule ?>
                            </option>
                        <?php
                        }

                        ?>
                    </select>
                </div>
                <div class="card-body absences shadow-lg bg-white rounded">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border m-5" role="status" id="spinner">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="containar infosWait" style="text-align: center;">
                        <img src="../../../img/Dashboard/infoEtudiant.svg" width="500px">
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN TABLEAU DE GESTION DES ABSENCES-->

        <!-- Jquery JS-->
        <script src="../../../layout/js/jquery-3.4.1.min.js "></script>

        <!-- Bootstrap JS-->
        <script src="../../../layout/js/bootstrap.min.js "></script>

        <!-- lib JS   -->
        <script src="../../../lib/animsition/animsition.min.js "></script>
        <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../../lib/tabledit/jquery.tabledit.js"></script>
        <script src="../../../lib/tabledit/jquery.tabledit.min.js"></script>

        <!-- Main JS-->
        <script src="../../../layout/js/main.js "></script>
        <script>
        $(document).ready(function() {
            $('.toast').toast({
                delay: 5000
            });
            $('.toast').toast('show');

            $('#spinner').hide();
            $('#module').change(fetchAbsences);

            function fetchAbsences() {
                $('.infosWait').hide();
                var module = $("#module").val();
                if (module) {
                    $.ajax({
                        url: 'fetchabsence.php',
                        method: "GET",
                        data: {
                            module: module
                        },
                        dataType: "text",
                        beforeSend: function() {
                            $("#spinner").show();
                        },
                        complete: function() {
                            $("#spinner").hide();
                        },
                        success: function(data) {
                            $('.absences').html(data);
                        }
                    });
                }
            }

            var id = new URL(window.location.href).searchParams.get("mod");
            if (id) {
                $("#module").val(id);
                fetchAbsences();
            }
        });
        </script>
    </body>

    </html>
<?php } ?>
