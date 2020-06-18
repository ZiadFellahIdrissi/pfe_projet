<?php include "../connection.php";
include_once '../../core/init.php';
ob_start();
if (isset($_GET["cin"])) {
    $cin=$_GET["cin"];
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
        $sql = "SELECT username,`password`,nom,prenom from Utilisateur where id='$cin'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $username=$row["username"];
        $password=$row["password"];
        ?>
        <div class="page-wrapper">
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <form id="myform" method="POST" action="changePicture.php" enctype="multipart/form-data">
                                <div class="login-logo">
                                    <div class="progress" style="display: none;">
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
                                        <input id="user" class="form-control" type="text" value="<?php if (isset($_GET["cin"])) echo $username; ?>" name="user" placeholder="Username" readonly="redonly">
                                    </div>
                                    <div class="form-group input-group">
                                        <input name="pass" class="form-control " id="pass" type="password" value="<?php if (isset($_GET["cin"])) echo $password; ?>" placeholder="Password" readonly="redonly">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <a class="text-dark" id="icon-click">
                                                    <i class="fa fa-eye" id="icon"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="cin" value="<?php if (isset($_GET["cin"])) echo $_GET["cin"]; ?>">
                                    <input class="au-btn au-btn--block au-btn--green m-b-20" name="logindirect" type="submit" id="submit" value="Ok pour cette Photo" style="font-weight: bold; display:none;">
                                    <input class="au-btn au-btn--block au-btn--blue m-b-20" id="login" type="button" value="Cliquer ici pour acceder a votre compte " style="font-weight: bold;">
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
                                submit.style.display = "none";
                            },
                            success: function() {
                                let login = document.querySelector("#login");
                                login.style.display = "block";
                                submit.style.display = "none";
                            },
                            error: function() {
                                alert("wait a min there is an error");
                            },
                            resetForm: true
                        });
                    } else
                    return false;
                });
            });

            // const form=document.getElementById("myform");
            // const inptPict= document.getElementById("profileImage");
            // const progresse=document.querySelector(".progress-bar");

            // form.addEventListener("submit",uploadPictuter);

            // function uploadPictuter(e){
            //     e.preventDefault();
            //     const xhr = new XMLHttpRequest();
            //     xhr.open("POST","changePicture.php");
            //     xhr.upload.addEventListener("progress" , e => {
            //         const percent = e.lengthComputable ? (e.loaded / e.total)*100 : 0;
            //         progresse.style.width = percent.toFixed(2)+'%';
            //         progresse.textContent = percent.toFixed(2)+'%';
            //     });
            //     xhr.setRequestHeader("Content-Type", "multipart/form-data");
            //     xhr.send(new FormData(form));
            //     // alert("done");
            // }

            function chooseMyPicture() {
                document.querySelector("#profileImage").click();
            }

            function displayImage(event) {
                if (event.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        document.querySelector("#profileDisplay").setAttribute('src', event.target.result);
                        let submit = document.querySelector("#submit");
                        let login = document.querySelector("#login");
                        submit.style.display = "block";
                        login.style.display = "none";

                    }
                    reader.readAsDataURL(event.files[0]);
                }
            }
            const login = document.querySelector("#login");
            const profileImagee=document.querySelector("#profileDisplay");
            login.addEventListener("click", () => {
                if (profileImagee.src.includes('avatar')) {
                    if (confirm("Voulez-vous vraiment garder l'image par défaut !!!!")) {
                        <?php
                        $User_Etudiant = new User_Etudiant();
                        $loginEtudiant = $User_Etudiant->login($username, $password);
                        $sql = "UPDATE Utilisateur
                                SET `imagepath` = 'avatar.svg'
                                WHERE id='$cin'";
                        mysqli_query($conn, $sql);
                        ?>
                        location.href = "../login/";
                    }
                } else {
                    location.href = "../login/";
                }

            });
        </script>

    </html>
<?php } else
    header("Location: ../../");
ob_end_flush();
?>