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
        <title>Messages</title>

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

    <body>
        <?php include '../pages/header.php' ?>
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
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
                                            <?php
                                            $do_i = do_i_have_massages($id);
                                            if ($do_i) {
                                            ?>
                                                <div class="au-message__noti">
                                                    <p>Vous avez
                                                        <span><?php echo $do_i; ?></span>
                                                        nouveaux messages
                                                    </p>
                                                </div>
                                            <?php } ?>
                                            <div class="au-message-list">
                                                <?php

                                                $sql = "SELECT Module.intitule,Utilisateur.id,Utilisateur.nom , Utilisateur.prenom , Utilisateur.imagepath, Utilisateur.email
                                                        from Module 
                                                        join dispose_de on dispose_de.id_module = Module.id_module
                                                        join Utilisateur on module.id_enseignant = Utilisateur.id
                                                        join Semestre on Semestre.id_semestre = Module.id_semestre
                                                        where dispose_de.id_filiere= ? and Semestre.id_semestre=?
                                                        order by Utilisateur.nom ";
                                                $resultat = DB::getInstance()->query($sql, [getStudentsInfo($id)->first()->id_filiere, 2]);
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
                                                                    <p><?php echo $row->intitule ?></p>
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
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

        </div>
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
                $("#spinner").hide();
                // Chatbox
                try {
                    var inbox_wrap = $('.js-inbox');
                    var message = $('.au-message__item');
                    message.each(function() {
                        var that = $(this);

                        that.on('click', function() {
                            console.log($(this).parent().parent().parent());
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
                        },
                        error: function() {
                            alert('failure');
                        }
                    });
                });
                $(document).on('click', '.closeconve', function() {
                    $(".au-inbox-wrap").removeClass('show-chat-box');
                });

                // setInterval(function() {
                //     var my_id = $("#my_id").val();
                //         var id_prof = $("#id_prof").val();
                //     $.ajax({
                //         url: "is_there_new_message.php",
                //         method: 'GET',
                //         data: {
                //             my_id: my_id,
                //             id_prof:id_prof
                //         },
                //         dataType: 'text',
                //         success: function(data) {
                //             if (data == "yes")
                //                 $('.fetchChat').load("fetch_box_chat.php?id_prof=" + id_prof + "&my_id=" + my_id);
                //         },
                //         error: function() {
                //             alert('failure');
                //         }
                //     });
                // }, 5000);


            });
        </script>

    </body>

    </html>
    <!-- end document-->
<?php } ?>