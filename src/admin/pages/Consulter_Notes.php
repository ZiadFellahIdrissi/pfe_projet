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
        <title>Notes</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />

        <!-- lib CSS-->
        <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
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

    <body>
        <div class="page-wrapper">
            <?php include 'header.php' ?>
            <div class="main-content ">
                <?php
                    include '../../DML_Commentator.php';
                    DMLCommentator("");
                ?>
                <div class="container mb-3">
                    <nav aria-label="breadcrumb nov">
                        <ol class="breadcrumb nov">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="dashboard.php">Examens</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des Exames</li>
                        </ol>
                    </nav>
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-md-3 semester">
                                <select name="semester" id="semester" class="form-control">
                                    <option value="">Choiser in semster</option>
                                    <option value=100>1er Semestre</option>
                                    <option value=200>2ème Semestre</option>
                                </select>
                            </div>
                            <div class="col-md-5 select">
                                <select name="module" id="module" class="form-control">

                                </select>
                            </div>

                            <div class="col-md-4 offset-md-2">
                                <a href="Consulter_Notes.php"><button type="button" class="btn btn-primary">Afficher Tous</button></a>
                            </div>
                        </div>
                        <div class="modal-body notes">
                            <?php
                                include '../Notes/Tableau_consulter_Notes.php'
                            ?>
                        </div>
                    </div>
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

        <!-- Main JS-->
        <script type="text/javascript" src="../../../layout/js/main.js "></script>
        <script type="text/javascript" src="../../../layout/js/animation.js"></script>
        <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
        <script>
            $('.mydatatable').DataTable();

            $(document).ready(function() {
                $('#module').hide();
                $('#semester').change(affiche);

                function affiche() {
                    // if (isNaN($('#affiche').val()))
                    $('#module').show();
                }
            });
            var id_f = $("#semester").val();

            $(document).ready(function() {
                $('#semester').change(affiche);

                function affiche() {
                    if (id_f != $('#semester').val()) {
                        $('#module').prop('selectedIndex', 0);
                    }
                }
            });
            $(document).ready(function() {
                $('#semester').change(function() {
                    id_semester = $(this).val();
                    console.log(id_semester);
                    $.ajax({
                        url: "../Notes/fetch_module_parSemester.php",
                        method: "GET",
                        data: {
                            id_semester: id_semester
                        },
                        dataType: "text",
                        success: function(data) {
                            $('#module').html(data);
                        }

                    });

                });
            });
            $(document).ready(function() {
                $("#module").change(function affiche() {
                    var id_module = $(this).val();
                    if (id_module) {
                        $.ajax({
                            url: "../Notes/affichierNoteParfiliers.php",
                            method: "GET",
                            data: {
                                id_module: id_module,
                            },
                            dataType: "text",
                            success: function(data) {
                                $('.notes').html(data);
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