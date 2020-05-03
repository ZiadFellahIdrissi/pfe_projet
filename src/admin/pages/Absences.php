<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../../layout/css/animation.css" rel="stylesheet" type="text/css" />
    <title>Enseignant</title>

    <!-- fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" media="all" />

    <!-- lib CSS-->
    <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../../lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">
</head>
<style type="text/css">
    .img:hover {
        width: 240px;
        height: 160px;
    }
</style>

<body class="">
    <div class="page-wrapper">
        <?php include './header.php' ?>
        <div class="main-content ">
            <div class="container mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Absences</li>
                    </ol>
                </nav>
                <div class="text-center">
                    <div class="row">
                        <div class="col">
                            <a href="ajouter_absences.php">
                                <!-- <img class="img" src="../img/Absences/1.png" onmouseover="this.src='../img/Absences/2.png';" onmouseout="this.src='../img/Absences/1.png'"class="rounded" title="Ajouter Absences"> -->
                                <img style="border-style: solid; border-color:red;" src="../../../img/Absences/1.png" class="rounded" title="Ajouter Absences">
                            </a>
                        </div>
                        <div class="col">
                            <a href="consulter_absences.php">
                                <img class="img" src="../../../img/Absences/3.png" onmouseover="this.src='../../../img/Absences/4.png';" onmouseout="this.src='../../../img/Absences/3.png'" class="rounded" title="Consulter Absences">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- hade div daroori tb9a hitache dyal wahde dive ma7loola fl header   -->

    <script type="text/javascript" src="../../../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap JS-->
    <script type="text/javascript" src="../../../layout/js/bootstrap.min.js "></script>


    <!-- lib JS   -->
    <script type="text/javascript" src="../../../lib/animsition/animsition.min.js "></script>
    <script type="text/javascript" src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Main JS-->
    <script type="text/javascript" src="../../../layout/js/main.js "></script>
    <!-- <script type="text/javascript" src="../../../layout/js/animation.js"></script> -->
 
</body>

</html>