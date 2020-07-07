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
        <title>Notes</title>

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
        <?php include 'DML_Commentator.php'; ?>
        <!-- END DML-->

        <!-- HEADER DESKTOP-->
        <?php include '../pages/headerDesktop.php'; ?>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <?php include '../pages/headerPhone.php'; ?>
        <!-- END HEADER MOBILE -->

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
                                    <li class="list-inline-item">Notes</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END BREADCRUMB-->

        <!-- TABLEAU DE GESTION DES NOTES -->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                        <!-- MODULES-->
                        <div class="col-md-5">
                            <select id="module" class="form-control">
                                <option value=''>Choisissez un Module</option>
                                <?php
                                $sql = "SELECT intitule, id_module
                                            FROM Module
                                            WHERE id_enseignant = '$id'";
                                $resultat = $db->query($sql, [$id]);
                                foreach ($resultat->results() as $row) {
                                ?>
                                    <option value=<?php echo $row->id_module ?>><?php echo $row->intitule ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <!-- TYEPE D'EXAMENS -->
                        <div class="col-md-5">
                            <select id="id_controle" class="form-control">
                                <option>
                                    <span class="sr-only" id="spinner2">Loading...</span>
                                </option>
                            </select>
                        </div>

                    </div>
                </div>

                <!-- SPINNER -->
                <div class="d-flex justify-content-center">
                    <div class="spinner-border m-5" role="status" id="spinner">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <!-- NOTES -->
                <div class="card-body notes shadow-lg bg-white rounded">

                </div>

            </div>
        </div>
        <!-- FIN TABLEAU DE GESTION DES NOTES -->


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
        <!-- <script scr="../../../layout/js/espace_enseignant/gestionDesNotes.js"></script> -->

        <script>
            $(document).ready(function() {
                $('.toast').toast({
                    delay: 5000
                });
                $('.toast').toast('show');

                $('#id_controle').hide();
                $(".notes").hide();
                $("#spinner").hide();
                $("#spinner2").hide();

                $('#module').change(fetchNotes);

                function fetchNotes() {
                    $('.notes').hide();
                    var module = $("#module").val();
                    if(module){
                      $.ajax({
                          url: 'fetchControleType.php',
                          method: "GET",
                          data: {
                              module: module
                          },
                          dataType: "text",
                          beforeSend: function() {
                              $("#spinner2").show();
                          },
                          complete: function() {
                              $("#spinner2").hide();
                          },
                          success: function(data) {
                              $('#id_controle').html(data);
                              $("#id_controle").show();
                          }
                      });
                    }
                }

                $('#id_controle').change(afficheNotes);

                function afficheNotes() {
                    var module = $("#module").val();
                    var id_controle = $("#id_controle").val();
                    if(id_controle){
                      $.ajax({
                          url: 'fetch_notes.php',
                          method: "GET",
                          data: {
                              module: module,
                              id_controle: id_controle
                          },
                          dataType: "text",
                          beforeSend: function() {
                              $("#spinner").show();
                          },
                          complete: function() {
                              $("#spinner").hide();
                          },
                          success: function(data) {
                              $('.notes').html(data);
                              $(".notes").show();
                          }
                      });
                    }
                }

                $('#module').change(function(){
                  if ($('#module').val()!="")
                      $('#id_controle').show();
                  else
                      $('#id_controle').hide();
                });

                $('#id_controle').change(function(){
                  if ($('#id_controle').val()!="")
                      $('.notes').show();
                  else
                      $('.notes').hide();
                });

                var id = new URL(window.location.href).searchParams.get("mod");
                if (id) {
                    $("#module").val(id);
                    fetchNotes();
                }

            });
        </script>

    </body>
    </html>
<?php } ?>
