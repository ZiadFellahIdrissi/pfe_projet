<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
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
        <div class="page-wrapper">
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


            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="au-card au-card--no-shadow au-card--no-pad m-b-30">
                                <div class="au-card-title">
                                    <div class="bg-overlay bg-overlay--blue"></div>
                                    <h3>
                                        <i class="zmdi zmdi-comment-text"></i>Envoier Un message</h3>
                                    <button class="au-btn-plus closeconve">
                                        <i class="zmdi zmdi-close"></i>
                                    </button>
                                </div>
                                <div class="au-inbox-wrap js-inbox-wrap">
                                    <div class="au-message js-list-load">
                                        <div class="au-message__noti">
                                            <div class="row">
                                                <div class="col">
                                                    <select id="filiere" class="form-control" style="width: 100%;">
                                                        <option value=''>Choisissez un Module</option>
                                                        <?php
                                                        $date_debut_dexieme_Semester = getDatesSemestre(2)->first()->date_debut;
                                                        if (date('yy-m-d', time()) > $date_debut_dexieme_Semester)
                                                            $semster = 2;
                                                        else
                                                            $semster = 1;

                                                        $sql = "SELECT Filiere.nom_filiere,Filiere.id_filiere
                                                                from Module
                                                                join dispose_de on Module.id_module = dispose_de.id_module
                                                                join Filiere on Filiere.id_filiere = dispose_de.id_filiere
                                                                where Module.id_enseignant = ? 
                                                                and Filiere.etat=?
                                                                and module.id_semestre=?
                                                                GROUP by Filiere.id_filiere";
                                                        $query = DB::getInstance()->query($sql, array($id, 1, $semster));
                                                        foreach ($query->results() as $row) {
                                                        ?>
                                                            <option value=<?php echo $row->id_filiere  ?>><?php echo "les etudinats de " . $row->nom_filiere ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <button type="button" class="btn btn-outline-dark allstudents">send msg to all students</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-message-list">
                                            <?php
                                            $sql = "SELECT filiere.nom_filiere,Filiere.id_responsable,utilisateur.id,
                                            utilisateur.nom,utilisateur.prenom,utilisateur.imagepath
                                            from filiere
                                            join utilisateur on filiere.id_responsable = utilisateur.id
                                            join dispose_de on Filiere.id_filiere = dispose_de.id_filiere
                                            join module on Module.id_module = dispose_de.id_module
                                            where Module.id_enseignant = ?
                                            and Filiere.etat= ?
                                            and Filiere.id_responsable!=?
                                            GROUP by Filiere.id_filiere";
                                            $resultat = DB::getInstance()->query($sql, [$id, 1, $id]);
                                            foreach ($resultat->results() as $row) {
                                            ?>
                                                <div class="au-message__item <?php if (isRead($row->id, $id)) echo 'unread'; ?> " id="<?php echo $row->id ?>">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap online">
                                                                <div class="avatar">
                                                                    <img src="../../../img/profiles/<?php echo $row->imagepath ?>" alt="<?php echo $row->nom . ' ' . $row->prenom; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name"><?php echo strtoupper($row->nom . ' ' . $row->prenom);  ?></h5>
                                                                <p><?php echo $row->nom_filiere ?></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="au-chat fetchChat">
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
            </div>
            <!-- END PAGE CONTAINER-->
        </div>
        <input type="hidden" id="my_id" value="<?php echo $id; ?>">

        <div class="modal fade" id="send_message_to_all_students" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <div class="md-form mb-4">
                                    <input type="text" id="subject" id="subject" placeholder="Subject" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <textarea type="text" id="message" rows="7" placeholder="Your message" class="form-control md-textarea"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" id="set_id_filiere">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary" id="envoiEmail" name="Modifier">Envoi <i class="fa fa-angle-up"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                $('.allstudents').hide();
                $("#spinner").hide();
                $("#spinner0").hide();
                $(".closeconve").hide();
                $('#filiere').change(affiche2);

                function affiche2() {
                    var id_filiere = $("#filiere").val();
                    var my_id = $("#my_id").val();
                    if (id_filiere) {
                        $.ajax({
                            url: "fetch_students_messages.php",
                            method: "GET",
                            data: {
                                id_filiere: id_filiere,
                                my_id: my_id
                            },
                            dataType: "text",
                            success: function(data) {
                                $('.allstudents').show();
                                $('.au-message-list').html(data);
                                $("#set_id_filiere").val(id_filiere);
                            }
                        });
                    }
                }
                $(document).on('click', '.allstudents', function() {
                    $("#send_message_to_all_students").modal('show');

                });
                $(document).on('click', '#envoiEmail', function() {
                    var subject = $("#subject").val();
                    var message = $("#message").val();
                    var my_id = $("#my_id").val();
                    var id_filiere = $("#set_id_filiere").val();
                    $.ajax({
                        url: "send_message_toAllStudents.php",
                        method: 'GET',
                        data: {
                            my_id: my_id,
                            subject: subject,
                            message: message,
                            id_filiere: id_filiere
                        },
                        dataType: 'text',
                        beforeSend: function() {
                            $("#spinner0").show();
                            $(".my_modal-body").hide();
                        },
                        complete: function() {
                            $(".my_modal-body").show();
                            $("#spinner0").hide();
                        },
                        success: function(data) {
                            $("#send_message_to_all_students").modal('hide');
                        },
                        error: function() {
                            alert('failure');
                        }
                    });
                });
                // Chatbox
                try {
                    var inbox_wrap = $('.js-inbox');
                    var message = $('.au-message__item');
                    message.each(function() {
                        var that = $(this);

                        that.on('click', function() {
                            $(this).parent().parent().parent().toggleClass('show-chat-box');
                            var id_prof = $(this).attr("id");
                            var my_id = $("#my_id").val();
                            $.ajax({
                                url: "fetch_box_chat.php",
                                method: 'GET',
                                data: {
                                    id_prof: id_prof,
                                    my_id: my_id
                                },
                                dataType: 'text',
                                beforeSend: function() {
                                    $("#spinner").show();
                                },
                                complete: function() {
                                    $("#spinner").hide();
                                },
                                success: function(data) {
                                    $('.fetchChat').html(data);
                                    $(".closeconve").show();

                                },
                                error: function() {
                                    alert('failure');
                                }
                            });
                        });
                    });
                } catch (error) {
                    console.log(error);
                }
                $(document).on('click', '#messageSend', function() {
                    var id_prof = $("#id_prof").val();
                    var message = $("#messagewritten").val();
                    var my_id = $("#my_id").val();
                    $.ajax({
                        url: "send_message.php",
                        method: 'GET',
                        data: {
                            id_prof: id_prof,
                            message: message,
                            my_id: my_id
                        },
                        dataType: 'text',
                        // beforeSend: function() {
                        //     $("#spinner").show();
                        // },
                        // complete: function() {
                        //     $("#spinner").hide();
                        // },
                        success: function(data) {
                            $('.fetchChat').load("fetch_box_chat.php?id_prof=" + id_prof + "&my_id=" + my_id);
                            // setInterval(function() {
                            //     $('.fetchChat').load("fetch_box_chat.php?id_prof=" + id_prof + "&my_id=" + my_id);
                            // }, 5000);

                        },
                        error: function() {
                            alert('failure');
                        }
                    });
                });
                $(document).on('click', '.closeconve', function() {
                    $(".au-inbox-wrap").removeClass('show-chat-box');
                    // $(".closeconve").hide();
                });




            });
        </script>

    </body>

    </html>
    <!-- end document-->
<?php } ?>