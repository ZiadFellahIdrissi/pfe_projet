<?php
include_once '../../../core/init.php';
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
        <title>Demandes</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Demandes</li>
                        </ol>
                    </nav>
                    <div class="modal-content">
                        <div class="modal-body">
                            <?php
                                include "afficheTableauDemandes.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal pour avoir le relvet et deja utilise ou pas  -->
        <div class="modal fade" id="is_download" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 10%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border m-5" role="status" id="spinner0">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="modal-body my_modal-body">


                    </div>
                    <div>
                        <div class="modal-footer">
                            <input type="hidden" id="set_id_module">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../../../layout/js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script type="text/javascript" src="../../../layout/js/bootstrap.min.js"></script>
        <!-- lib JS   -->
        <script type="text/javascript" src="../../../lib/animsition/animsition.min.js"></script>
        <!-- Main JS-->
        <script type="text/javascript" src="../../../layout/js/main.js"></script>
        <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>
        <script>
            $('.mydatatable').DataTable();
        </script>
        <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
        <script>
            $(document).ready(function() {
                $("#spinner0").hide();
                $(".openModalInformation").click(function() {
                    $('#is_download').modal('show');
                    var type = $(this).data('id');
                    var cin = $(this).attr("id");
                    $.ajax({
                        url: 'is_download.php',
                        method: 'GET',
                        data: {
                            type: type,
                            cin: cin
                        },
                        dataType: 'text',
                        beforeSend: function() {
                            $("#spinner0").show();
                        },
                        complete: function() {
                            $("#spinner0").hide();

                        },
                        success: function(data) {
                            $('.my_modal-body').html(data);
                        },
                        error: function() {
                            alert("there is some problem ");
                        }

                    })

                });
            });
            $('.mydatatable').DataTable();
        </script>
        <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
    </body>

    </html>
<?php
}
?>