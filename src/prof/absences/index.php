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
                                <span class="au-breadcrumb-span">vous ete la:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item seprate">
                                        <a href="../">Dashboard</a> <span>/</span>
                                    </li>
                                    <li class="list-inline-item">Abscences</li>
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

                </div>

                <!--   // date('Y-m-d', strtotime('monday this week')) . ' to' . date('Y-m-d', strtotime('sunday this week')) ; -->

            </div>
        </div>
        <!-- FIN TABLEAU DE GESTION DES ABSENCES

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
            $('#module').change(fetchabsences);

            function fetchabsences() {
                // $('.notes').hide();
                var module = $("#module").val();
                $.ajax({
                    url: 'fetchabsence.php',
                    method: "GET",
                    data: {
                        module: module
                    },
                    dataType: "text",
                    // beforeSend: function() {
                    //     $("#spinner2").show();
                    // },
                    // complete: function() {
                    //     $("#spinner2").hide();
                    // },
                    success: function(data) {
                        $('.absences').html(data);
                    }
                });
            }
        </script>

    </body>

    </html>
<?php } ?>