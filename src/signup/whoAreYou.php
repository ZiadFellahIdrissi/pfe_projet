<?php
include_once '../../core/init.php';
include "../connection.php";
?>
<html>

<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="../../layout/css/login.css">
    <link rel="stylesheet" type="text/css" href="../../layout/css/Who_you_are.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <a href="../../index.php">
        <span>
            <?php
            include '../../img/login/x.svg'; //todo: back botton to phase 1
            ?>
        </span>
    </a>
    <div class="container">
        <div class="split left">
            <h1>Vous êtes étudiant </h1>
            <a href="./" class="button" role="button">Activer le compte</a>
        </div>
        <div class="split right">
            <h1>Vous êtes personnels </h1>
            <a href="#" class="button">Activer le compte</a>
        </div>
    </div>
    <script type="text/javascript" src="../../layout/js/Who_you_are.js"></script>
    <script type="text/javascript" src="../../layout/js/login.js"></script>

    <script>

    </script>
</body>

</html>