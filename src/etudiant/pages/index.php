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
    <html lang="fr">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title Page-->
        <title>Dashboard</title>

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

        <?php include 'header.php' ?>

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
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <div class="au-card m-b-30">
                        <div class="au-card-inner">
                            <h3 class="title-2 m-b-40">Statistique de votre absence</h3>
                            <canvas id="absence-chart">
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border m-5" role="status" id="spinner0">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </canvas><br>
                            <div class="alert alert-info" role="alert" style="margin-bottom:0%; text-align:center; display:none">
                                Vous avez en totale <b><span id="nbabsence"></span></b> abscences au moment
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="au-card m-b-30">
                        <div class="au-card-inner">
                            <h3 class="title-2 m-b-40">les dates </h3>
                            <div id="absences-table">
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
        <input type='hidden' id="my_id" value="<?php echo $id; ?>">

        <!-- Jquery JS-->
        <script src="../../../layout/js/jquery-3.4.1.min.js "></script>

        <!-- Bootstrap JS-->
        <script src="../../../layout/js/bootstrap.min.js "></script>

        <!-- lib JS   -->
        <script src="../../../lib/animsition/animsition.min.js "></script>
        <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../../lib/chartjs/Chart.bundle.min.js"></script>

        <!-- Main JS-->
        <script src="../../../layout/js/main.js "></script>
        <script>
            $(document).ready(function() {
                var id = $("#my_id").val();
                var ctx = $('#absences-table');
                ctx.height = 200;
                $("#spinner").hide();

                $.ajax({
                    url: "absence/fetch_absence_table.php",
                    method: 'GET',
                    data: {
                        id: id
                    },
                    dataType: "text",
                    beforeSend: function() {
                        $("#spinner").show();
                    },
                    complete: function() {
                        $("#spinner").hide();
                    },
                    success: function(data) {
                        $('#absences-table').html(data);
                    }
                });

            });
        </script>
        <script>
            $(document).ready(function() {
                $("#spinner0").hide();
                // $(".alert-info").hide();
                var id = $("#my_id").val();
                $.ajax({
                    url: "absence/count_absence.php",
                    method: "GET",
                    data: {
                        id,
                        id
                    },
                    contentType: "application/json",
                    dataType: 'json',
                    beforeSend: function() {
                        $("#spinner0").show();
                    },
                    complete: function() {
                        $("#spinner0").hide();
                    },
                    success: function(data0) {
                        let nbSeance = [];
                        let module = [];
                        let sumabsence = 0
                        // let data0 = JSON.parse(data);
                        for (var i in data0) {
                            nbSeance.push(data0[i].nbabsence);
                            module.push(data0[i].module);
                            sumabsence += Number(data0[i].nbabsence);
                        }
                        $("#nbabsence").html(sumabsence);
                        $(".alert-info").show();



                        var ctx = $("#absence-chart");
                        if (ctx) {
                            ctx.height = 200;
                            var myChart = new Chart(ctx, {
                                type: 'polarArea',
                                data: {
                                    datasets: [{
                                        data: nbSeance,
                                        backgroundColor: [
                                            "rgba(0, 123, 255,0.9)",
                                            "rgba(0,0,0,0.2)",
                                            "rgba(0, 123, 255,0.8)",
                                            "rgba(0, 123, 255,0.6)",
                                            "rgba(0, 123, 255,0.5)"
                                        ]

                                    }],
                                    labels: module
                                },
                                options: {
                                    legend: {
                                        position: 'top',
                                        labels: {
                                            fontFamily: 'Poppins'
                                        }

                                    },
                                    responsive: true
                                }
                            });
                        }
                    }
                });
            });
        </script>

    </body>

    </html>
<?php } ?>