<?php
include_once '../../core/init.php';
include "../connection.php";
?>
<html>

<head>
    <title>Activation du compte</title>
    <link rel="stylesheet" type="text/css" href="../../layout/css/who_Are_You.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
    <a href="../../index.php">
        <span>
            <?php
            include '../../img/login/x.svg';
            ?>
        </span>
    </a>
    <div class="container">
        <a href="./?role=etudiant">
            <div class="split left">
                <h1>Etudiant</h1>
            </div>
        </a>
        <a href="./?role=personnel">
            <div class="split right">
                <h1>Personnel</h1>
            </div>
        </a>    
    </div>
    <script type="text/javascript" src="../../layout/js/Who_you_are.js"></script>
    <script type="text/javascript" src="../../layout/js/login.js"></script>

    <script>

    </script>
</body>

</html>