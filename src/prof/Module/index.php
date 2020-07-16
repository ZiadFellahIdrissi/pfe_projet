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
        <title>Modules</title>

        <!-- Fontfaces CSS-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">

        <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- lib CSS-->
        <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
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
                                    <li class="list-inline-item">Modules</li>
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
        <div class="container shadow-lg bg-white rounded" style="padding: 0%;">
            <div class="card">
                <div class="card-header">
                    Liste des Modules vous êtes responsable.
                </div>
            </div>
            <div class="card-body modules_Table">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border m-5" role="status" id="spinner">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour Ajoute un support de cour -->
        <div class="modal fade" id="ajoute_support_de_cour" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 10%;">
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
                                    <input type="url" id="lien" id="lien_Url" placeholder="Lien du support de cour" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-dark mb-3 show_code_input">Ajoute code d'accès </button>


                        <div class="row code_Acce">
                            <div class="col-md-12">
                                <div class="md-form mb-3">
                                    <input type="text" id="code" value="" placeholder="Code accès" class="form-control" required> </div>
                            </div>
                            <br>
                        </div>


                        <div class="modal-footer">
                            <input type="hidden" id="set_id_module">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary" id="ajouteCour"><span><i class="zmdi zmdi-plus-circle"></i></span> Ajoute</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" id="my_id" value="<?php echo $id; ?>">
        <!-- Jquery JS-->
        <script src="../../../layout/js/jquery-3.4.1.min.js "></script>
        <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>

        <!-- Bootstrap JS-->
        <script src="../../../layout/js/bootstrap.min.js "></script>

        <!-- lib JS   -->
        <script src="../../../lib/animsition/animsition.min.js "></script>
        <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>

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
                    // processData: false,
                    // // contentType: false,
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

                $(document).on('click', '.open_Ajoute_support', function() {
                    $("#ajoute_support_de_cour").modal('show');
                    $("#set_id_module").val($(this).attr("id"))
                });
                $(".show_code_input").click(function() {
                    $(".code_Acce").show();
                    $(".show_code_input").hide();
                });
                $("#ajouteCour").click(function() {
                    var lien = $("#lien").val();
                    var code = $("#code").val();
                    var id_module = $("#set_id_module").val();
                    // console.log(lien+''+code+''+id_module);
                    $.ajax({
                        url: 'ajoute_support_cour.php',
                        method: 'GET',
                        data: {
                            lien: lien,
                            code: code,
                            id_module: id_module,
                            my_id: my_id
                        },
                        beforeSend: function() {
                            $("#spinner0").show();
                        },
                        complete: function() {
                            $("#spinner0").hide();
                        },
                        success: function() {
                            $("#ajoute_support_de_cour").modal('hide');
                            $(".modules_Table").load("affiche_modules.php?my_id=" + my_id);
                        },
                    });
                });
            });
            $('.mydatatable').DataTable();
        </script>
        <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>

    </body>

    </html>
<?php } ?>