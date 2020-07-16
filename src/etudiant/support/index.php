<?php
include_once '../../../core/init.php';
require_once '../../../fonctions/tools.function.php';
$user = new User_Etudiant();
$db = DB::getInstance();
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
        <title>Notes et resultats</title>

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
        #bold {
            font-weight: bold;
            text-align: center;

        }
    </style>

    <body>
        <?php include '../pages/header.php' ?>
        <section class="au-breadcrumb m-t-75">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Notes et resultats</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade code_Acce" id="" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 10%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border m-5" role="status" id="spinner0">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="modal-body my_modal-body">
                        <!-- =======================bloc de le nom et le prenom======================= -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-3">
                                    <input type="text" id="set_code" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="c" style="text-align: center;">
                        <a class="btn btn-outline-success set_lien mb-3" role="button"  aria-pressed="true">Telecharger</a>
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" id="set_id_module">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- relvé de notes -->
        <div class="section__content section__content--p30">
            <div class="au-card notes shadow-lg bg-white rounded modules_Table" style="padding: 0;">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border m-5" role="status" id="spinner">
                        <span class="sr-only">Loading...</span>
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

        <!-- Main JS-->
        <script src="../../../layout/js/main.js "></script>
        <script>
            $(document).ready(function() {
                var my_id = $("#my_id").val();
                $("#spinner0").hide();
                $("#spinner").hide();
                $(".code_Acce").hide();
                $.ajax({
                    url: "affiche_modules.php",
                    method: 'GET',
                    data: {
                        my_id: my_id
                    },
                    dataType: "text",
                    beforeSend: function() {
                        $("#spinner").show();
                    },
                    complete: function() {
                        $("#spinner").hide();
                    },
                    success: function(data) {
                        $('.modules_Table').html(data);
                    }
                });

            });
        </script>

    </body>

    </html>
<?php
}
?>