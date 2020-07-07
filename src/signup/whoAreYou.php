<?php
include_once '../../core/init.php';
include "../connection.php";
?>
<html>

<head>
    <title>Signup</title>
    <!-- <link rel="stylesheet" type="text/css" href="../../layout/css/login.css"> -->
    <link rel="stylesheet" type="text/css" href="../../layout/css/who_Are_You.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <!-- /*<link href="../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">*/ -->
    <!-- <link href="../../layout/css/theme.css" rel="stylesheet" media="all"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    #x {
        animation: shake_ 1s alternate infinite;
        margin: 5 5;
        width: 35px;
        position: fixed;
    }

    #x:hover {
        animation: xshake 1s alternate;
        transform-origin: center;
        fill: red;
        opacity: 0.8;
    }

    @keyframes xshake {
        from {
            transform: rotateZ(0deg);
        }

        to {
            transform: rotateZ(-180deg);
        }
    }
</style>

<body>
    <a href="../../index.php">
        <span>
            <?php
            include '../../img/login/x.svg'; //todo: back botton to phase 1
            ?>
        </span>
    </a>
    <!-- <div style="padding: 0; border-radius:25px">
        <div class="container" style="border-radius: 25px;">
            <div class="split left">
                <h1>Vous êtes étudiant </h1>
                <a href="./?role=etudiant" class="btn btn-info btn-lg button" role="button" aria-pressed="true">Activer le compte</a>
            </div>
            <div class="split right">
                <h1>Vous êtes personnels </h1>
                <a href="./?role=personnel" class="btn btn-info btn-lg button" role="button" aria-pressed="true">Activer le compte</a>
            </div>
        </div>
    </div> -->
    <div class="container">
        <div class="split left">
            <h1>Vous êtes étudiant </h1>
            <a href="./?role=etudiant" class="button">Activer le compte</a>
        </div>
        <div class="split right">
            <h1>Vous êtes personnels</h1>
            <a href="./?role=personnel" class="button">Activer le compte</a>
        </div>
    </div>
    <script type="text/javascript" src="../../layout/js/Who_you_are.js"></script>
    <script type="text/javascript" src="../../layout/js/login.js"></script>

    <script>

    </script>
</body>

</html>