<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
$user = new User_Prof();
$db = DB::getInstance();
if (!$user->isLoggedIn()) {
    header('Location: ../../login');
} else {
    if ($user->data()->role != 'responsable') {
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

            <!-- HEADER DESKTOP-->
            <?php include '../pages/headerDesktop.php' ?>
            <!-- END HEADER DESKTOP-->

            <!-- HEADER MOBILE-->
            <?php include '../pages/headerPhone.php' ?>
            <!-- END HEADER MOBILE -->

            <!-- PAGE CONTENT-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">Vous êtes là:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item ">
                                            <a href="../pages/">Dashboard </a><span>/</span>
                                        </li>
                                        <li class="list-inline-item">
                                            Modules
                                        </li>
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

            <section class="statistic statistic2">
                <div class="container shadow-lg bg-white rounded" style="padding: 0%;">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="semester ">
                                        <select name="semester" id="semester" class="form-control">
                                            <?php
                                            $se = getSemestre()->date_fin;
                                            if (date('yy/m/d', time()) <= $se) {
                                            ?>
                                                <option value='1'>1er Semestre</option>
                                                <option value='2'>2ème Semestre</option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value='2'>2ème Semestre</option>
                                                <option value='1'>1er Semestre</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <input type="hidden" name="idResponsable" id="idResponsable" value="<?php echo $id; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-body modules">

                        </div>

                        <!-- MODAL INFORMATION FILL BY AJAX  -->
                        <div class="modal fade moduleInfo" tabindex="-1" role="dialog" aria-labelledby="moduleInfoLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modalInfo">
                                        <!-- SPINNER -->
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border m-5" role="status" id="spinner">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <!-- END SPINNER -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            
            <!-- Jquery JS-->
            <script src="../../../layout/js/jquery-3.4.1.min.js "></script>

            <!-- Bootstrap JS-->
            <script src="../../../layout/js/bootstrap.min.js "></script>

            <!-- lib JS   -->
            <script src="../../../lib/animsition/animsition.min.js "></script>
            <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>

            <!-- Main JS-->
            <script src="../../../layout/js/main.js"></script>
            <script>
                $(document).ready(function() {
                    $('#semester').prop("selectedIndex", $("#semester").val(affiche));
                    $("#semester").change(affiche);
                    function affiche() {
                        var semester = $("#semester").val();
                        var idResponsable = $("#idResponsable").val();
                        if (semester) {
                            $.ajax({
                                url: "fetch_modules.php",
                                method: "GET",
                                data: {
                                    semester: semester,
                                    idResponsable: idResponsable
                                },
                                dataType: "text",
                                success: function(data) {
                                    $('.modules').html(data);
                                }
                            });
                        }
                    }

                    $(document).on('click', '.openModalInformation', function() {
                        $('.moduleInfo').modal('show');
                        var id = $(this).attr("id");
                        $.ajax({
                            url: "info.php",
                            method: 'GET',
                            data: {
                                id: id
                            },
                            dataType: 'text',
                            beforeSend: function() {
                                $("#spinner").show();
                            },
                            complete: function() {
                                $("#spinner").hide();
                            },
                            success: function(data) {
                                $('.modalInfo').html(data);
                            },
                            error: function() {
                                alert('failure');
                            }
                        });
                    });
                });
            </script>
        </body>

        </html> <?php
            }
        }
                ?>
<!--========================================================-->