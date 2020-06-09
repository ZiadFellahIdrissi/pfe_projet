<?php include "../connection.php";
include_once '../../core/init.php';
ob_start();
if (isset($_GET["cin"])) {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="./../layout/css/animation.css" rel="stylesheet" type="text/css" />
        <title>bienvenue</title>
        <!-- fonts -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <!-- Bootstrap CSS-->
        <link href="../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">
        <link href="../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" media="all" />
        <!-- lib CSS-->
        <link href="../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <!-- Main CSS-->
        <link href="../../layout/css/theme.css" rel="stylesheet" media="all">
    </head>


    <body class="">
        <?php
        $sql = "SELECT username,`password`,nom,prenom from Utilisateur where id=" . $_GET["cin"];
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        ?>
        <div class="page-wrapper">
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <form action="changePicture.php" method="POST" id="myform" enctype="multipart/form-data">
                                <div class="login-logo">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <a>
                                        <img type="submit" src="../../img/login/avatar.svg" onclick="chooseMyPicture();" id="profileDisplay" alt="etudiant" style="border-radius: 50%; width:230px; height:220px;">
                                    </a>
                                    <input type="file" name="file" id="profileImage" onchange="displayImage(this)" style="display: none;">
                                    <br>
                                    <br>
                                    <h2 class="title">Bienvenue, <?php echo strtoupper($row["nom"]) . ' ' . $row["prenom"]; ?></h2>
                                </div>
                                <div class="login-form">
                                    <div class="form-group">
                                        <input id="user" class="form-control" type="text" value="<?php if (isset($_GET["cin"])) echo $row["username"]; ?>" name="user" placeholder="Username" readonly="redonly">
                                    </div>
                                    <div class="form-group input-group">
                                        <input name="pass" class="form-control " id="pass" type="password" value="<?php if (isset($_GET["cin"])) echo $row["password"]; ?>" placeholder="Password" readonly="redonly">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <a class="text-dark" id="icon-click">
                                                    <i class="fa fa-eye" id="icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="cin" value="<?php if (isset($_GET["cin"])) echo $_GET["cin"]; ?>">
                                    <input class="au-btn au-btn--block au-btn--green m-b-20" name="logindirect" type="submit" value="Cliquez ici pour acceder à votre compte" style="font-weight: bold;">
                                    <a class="au-btn au-btn--block au-btn--blue m-b-20" href="./" type="button" style="font-weight: bold;">Cliquer ici pour retourner à l'accueil </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script type="text/javascript" src="../../layout/js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script type="text/javascript" src="../../layout/js/bootstrap.min.js "></script>
        <!-- lib JS   -->
        <script type="text/javascript" src="../../lib/animsition/animsition.min.js "></script>
        <!-- Main JS-->
        <script type="text/javascript" src="../../layout/js/main.js "></script>
        <script type="text/javascript" src="../../layout/js/animation.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#icon-click").click(function() {
                    $("#icon").toggleClass('fa-eye-slash');
                    let input = $("#pass");
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else
                        input.attr("type", "password");
                });
            });
            // $(document).ready(function() {
            //     $("#myform").submit(function(event) {
            //         if ($("#profileImage").val()) {
            //             event.preventDefault();
            //             console.log(this);
            //             $(this).ajaxSubmit({
            //                 target: "#profileDisplay",
            //                 beforeSubmit:function() {
            //                     $(".progress-bar").width('0%');
            //                 },
            //                 uploadProgress:function(event, position, total, percentageComplete) {
            //                     $(".progress-bar").animate({
            //                         width: percentageComplete + '%'
            //                     }, {
            //                         duration: 1000
            //                     });
            //                 },
            //                 success:function() {
            //                     alert("your profile picture has been uploadod");
            //                     event.preventDefault = false;
            //                 },
            //                 error:function() {
            //                     alert("wait a min there is an error");
            //                 },
                            
            //             });
            //         } else
            //             return false;
            //     });
            // });

            function chooseMyPicture() {
                document.querySelector("#profileImage").click();
            }

            function displayImage(event) {
                if (event.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        document.querySelector("#profileDisplay").setAttribute('src', event.target.result);
                    }
                    reader.readAsDataURL(event.files[0]);
                }
            }
        </script>

    </html>
<?php } else
    header("Location: ../../");
ob_end_flush();
?>