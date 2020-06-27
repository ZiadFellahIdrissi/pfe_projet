<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
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
        <title>Compte</title>

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

    <style>
        #bold {
            font-weight: bold;
            text-align: center;
        }

        /* .header-desktop2 {
            left: 0px;
        } */

        #changePicture {
            position: absolute;
            margin-right: 70px;
            margin-top: 20px;
            width: 20px;
            color: white;
        }
    </style>

    <body>
        <!-- HEADER DESKTOP-->
        <?php include '../pages/headerDesktop.php' ?>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <?php include '../pages/headerPhone.php' ?>
        <!-- END HEADER MOBILE -->
        <div class="container" style="margin-top: 2.5%; margin-left:2.5%">
            <br>
            <div class="container rounded text-white" style="background-color: #393939; width: 70%">
                <br>
                <form id="myform" method="POST" action="modifierProfile.php" enctype="multipart/form-data">
                    <div class="progress" style="display:none">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><br>
                    <div class="account d-flex justify-content-center">
                        <div class="image img-cir img-120">
                            <img src="../../../img/profiles/<?php echo $imagepath ?>" id="profileDisplay" />
                            <img type="button" src="../../../img/signup/modify.png" id="changePicture" onclick="chooseMyPicture()" title="Changer Votre photo de profile">
                            <input type="file" name="file" id="profileImage" onchange="displayImage(this)" style="display: none">
                        </div>
                    </div>
                    <br>
                    <?php
                    $info = getPersonInfo($id);
                    ?>

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    Nom: <input type="text" class="form-control" value="<?php echo strtoupper($nom) . ' ' . $prenom ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    Username: <input type="text" class="form-control" value="<?php echo strtoupper($info->username); ?>" readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    Email: <input type="text" class="form-control" name="email" id="email" value="<?php echo $info->email ?>">
                                </div>
                            </div>
                            <div class="col">
                                Password:
                                <div class="form-group input-group">
                                    <input type="password" class="form-control" name="password" value="gha tmchi t9awde la ?" readonly="readonly">
                                    <div class="input-group-prepend" id="changePasword">
                                        <div class="input-group-text">
                                            <a class="text-dark">
                                                <span style="cursor: pointer"><b>Changer</b></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="cin" value="<?php echo $id ?>">
                        <div class="saveChanging float-right">
                            <button type="submit" id="submit" class="btn btn-outline-success" style="display:none">Enregistre</button>
                        </div>
                        <br> <br>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal changer le mot de passe -->
        <div class="modal fade changermdp" id="changermdp" tabindex="-1" role="dialog" aria-labelledby="changermdpLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container" style="padding: 1%; text-align:center; margin-left: 10.5%">
                            <input type="password" class="form-control" id="currentPassword" placeholder="Mot de passe courant" style="width: 80%;"><br>
                            <!-- <div class="form-group input-group" style="width: 80%;"> -->
                            <input type="password" class="form-control" id="newPassword" style="width: 80%;" placeholder="Mot de passe">
                            <!-- <div class="input-group-prepend" id="icon-click">
                                    <div class="input-group-text">
                                        <a class="text-dark">
                                            <i class="fa fa-eye" id="icon"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> --><br>
                            <input type="password" class="form-control" id="0password" placeholder="Répéter le mot de passe" style="width: 80%;">
                        </div>
                        <div class="checkpassowrdError" style="text-align: center;" role="alert">

                        </div>
                        <div class="return">
                            <!-- spinner -->
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border m-5" role="status" id="spinner">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="cin" id="cin" value="<?php echo $id; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="buttonsubmit" class="btn btn-primary">Save changes</button>
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
        <script src="http://malsup.github.com/jquery.form.js"></script>

        <script type="text/javascript">
            // $(document).ready(function() {
            //     $("#icon-click").click(function() {
            //         $("#icon").toggleClass('fa-eye-slash');
            //         let input0 = $("#newPassword");
            //         // let input1 = $("#0password");
            //         if (input0.attr("type") === "password") {
            //             input0.attr("type", "text");
            //             // input1.attr("type", "text");
            //         } else
            //             input0.attr("type", "password");
            //         // input1.attr("type", "password");

            //     });
            // });
            $(document).ready(function() {
                $("#spinner").hide();
                $("#buttonsubmit").click(function() {
                    $('.checkpassowrdError').hide();
                    var currentPassword = $("#currentPassword").val();
                    var newPassword = $("#newPassword").val();
                    var checkPassword = $("#0password").val();
                    let cin = $("#cin").val();
                    // console.log(currentPassword+' '+newPassword+' '+cin );
                    if (newPassword === checkPassword) {
                        if (currentPassword != "") {
                            $.ajax({
                                url: "changerMdp.php",
                                method: "GET",
                                data: {
                                    newPassword: newPassword,
                                    currentPassword: currentPassword,
                                    cin: cin
                                },
                                dataType: "text",
                                beforeSend: function() {
                                    $("#spinner").show();
                                    $("#buttonsubmit").hide();
                                },
                                complete: function() {
                                    $("#spinner").hide();
                                    $("#buttonsubmit").show();
                                    $('.errorr').show();
                                },
                                success: function(data) {
                                    $('.return').html(data);
                                }
                            });
                        } else {
                            $('.checkpassowrdError').show();
                            $('.checkpassowrdError').addClass('alert alert-danger');
                            $('.checkpassowrdError').html("Veuillez remplir tout les champ ");
                        }
                    } else {
                        $('.checkpassowrdError').show();
                        $('.checkpassowrdError').addClass('alert alert-danger');
                        $('.checkpassowrdError').html("Les mots de passe ne sont pas identiques.");
                    }
                });
            });

            $(document).ready(function() {
                $("#changePasword").click(function() {
                    $("#changermdp").modal("show");
                });
                $("#email").on('input', function(e) {
                    $("#submit").show();
                });

            });

            const submit = document.querySelector("#submit");
            $(document).ready(function() {
                $("#myform").submit(function(event) {
                    if ($("#profileImage").val()) {
                        $(".progress").show();
                        event.preventDefault();
                        $(this).ajaxSubmit({
                            target: "#profileDisplay",
                            beforeSubmit: function() {
                                $(".progress-bar").width('0%');
                            },
                            uploadProgress: function(event, position, total, percentageComplete) {
                                $(".progress-bar").width(percentageComplete + '%');
                                $("#submit").hide();
                            },
                            dataType: "text",
                            success: function(data) {
                                $(".progress").hide();
                                if (data != 'good') {
                                    if (!confirm(data))
                                        location.reload();
                                } else
                                    location.reload();

                            },
                            error: function() {
                                alert("wait a min there is an error");
                            },
                            resetForm: true
                        });
                    } else
                        $(this).ajaxSubmit({
                            resetForm: true
                        });
                });
            });

            function chooseMyPicture() {
                document.querySelector("#profileImage").click();
            }

            function displayImage(event) {
                if (event.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        document.querySelector("#profileDisplay").setAttribute('src', event.target.result);
                        let submit = document.querySelector("#submit");
                        submit.style.display = "block";
                    }
                    reader.readAsDataURL(event.files[0]);
                }
            }
        </script>
    </body>

    </html>
<?php
}
?>