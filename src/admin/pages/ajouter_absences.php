<?php
include '../../connection.php';
include_once '../../../core/init.php';
$user = new User_Admin();
if (!$user->isLoggedIn()) {
    header('Location: ./login_page.php');
}else{
    $nom=$user->data()->username;
    $email=$user->data()->email;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../../layout/css/animation.css" rel="stylesheet" type="text/css" />
    <title>..........</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />

    <!-- lib CSS-->
    <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../../lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">
</head>


<style>
    .modal-header {
        background-color: #dcdde1;
    }

    .modal-body {
        background: #f5f5f5;
    }

    .nov {
        background: #f5f5f5;
    }
</style>

<body class="">
    <!--animsition-->
    <div class="page-wrapper">
        <?php include 'header.php' ?>
        <div class="main-content ">
            <?php include '../../DML_Commentator.php';
            DMLCommentator("");
            ?>
            <div class="container mb-3">
                test test test test <br> test test test test
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
    <script type="text/javascript" src="../../../layout/js/animation.js"></script>
    <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
</body>

</html>
<?php
}
?>