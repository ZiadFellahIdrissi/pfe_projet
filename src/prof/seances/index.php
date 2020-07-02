<?php
include_once '../../../core/init.php';
$user = new User_Prof();
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

        <!-- Emploi de temp-->
        <!-- <section class="statistic statistic2 calendareContainer"> -->
        <div class="container">
            <div class="container">
                <div class="au-card shadow-lg bg-white rounded">
                    <div id="calendarEns">
                    </div>
                </div>
            </div>
        </div>
        <!-- </section> -->
        <!-- Emploi de temp -->

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
                // $('#spinner1').hide();
                var calendar = $('#calendarEns').fullCalendar({
                    locale: 'fr-ch',
                    minTime: "07:00:00",
                    maxTime: "23:00:00",
                    header: {
                        left: 'title',
                        center: '',
                        right: 'next,today'
                    },
                    defaultView: 'listWeek',
                    aspectRatio: 1.5,
                    theme: true,
                    themeSystem: 'bootstrap4',
                    events: 'loadSeances.php?id=<?php echo $id ?>',
                });
                $(".fc-next-button").attr("title", "Semaine suivante");
                $(".fc-today-button").attr("title", "Semaine courante");
                $(".fc-today-button").text("Semaine courante");
                $(".fc-next-button").text("Semaine Suivante");

                $(".fc-next-button").on('click', function() {
                    $(".fc-next-button").attr("disabled", "disabled");
                    $(".fc-next-button").css("cursor", "default");
                });
            });
        </script>

    </body>

    </html>
<?php } ?>