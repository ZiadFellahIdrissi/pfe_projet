<?php
include '../../connection.php';
include_once '../../../core/init.php';
$user = new User_Admin();
if (!$user->isLoggedIn()) {
    header('Location: ./login.php');
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
    <title>Dashboard</title>

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
<style type="text/css">
    .number{
        color: lightgrey; 
    }
</style>

<body>
    <div class="page-wrapper">
        <?php
            include './header.php'
        ?>
        <div class="main-content ">
            <section class="statistic statistic2" style=" padding-top: 0%;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item" style="border-radius: 10px; cursor:pointer;" >
                                    <a href="./Enseignant.php">
                                        <h2 class="number">
                                            <?php
                                                $sql = "SELECT * FROM enseignant";
                                                echo mysqli_num_rows(mysqli_query($conn, $sql));
                                            ?>
                                        </h2>
                                    </a><br>
                                    <span class="desc">Enseignants</span>
                                    <div class="icon">
                                        <i class="fas fa-chalkboard-teacher"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item" style="border-radius: 10px; cursor:pointer;">
                                    <a href="./Etudiants.php">
                                        <h2 class="number">
                                            <?php
                                                $sql = "SELECT * FROM etudiant";
                                                echo mysqli_num_rows(mysqli_query($conn, $sql));
                                            ?>
                                        </h2>
                                    </a><br>
                                    <span class="desc">Etudiants</span>
                                    <div class="icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item" style="border-radius: 10px; cursor:pointer;">
                                    <a href="./Filiere.php">
                                        <h2 class="number">
                                            <?php
                                                $sql = "SELECT * FROM filiere";
                                                echo mysqli_num_rows(mysqli_query($conn, $sql));
                                            ?>
                                        </h2>
                                    </a><br>
                                    <span class="desc">Filieres</span>
                                    <div class="icon">
                                        <i class="fas fa-university"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item" style="border-radius: 10px; cursor:pointer;">
                                    <a href="./Modules.php">
                                        <h2 class="number">
                                            <?php
                                                $sql = "SELECT * FROM module";
                                                echo mysqli_num_rows(mysqli_query($conn, $sql));
                                            ?>
                                        </h2>
                                    </a><br>
                                    <span class="desc">Modules</span>
                                    <div class="icon">
                                        <i class="fab fa-stack-overflow"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>

    <script src="../../../layout/js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap JS-->
    <script src="../../../layout/js/bootstrap.min.js "></script>

    <!-- lib JS   -->
    <script src="../../../lib/animsition/animsition.min.js "></script>
    <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Main JS-->
    <script src="../../../layout/js/main.js "></script>
    <script type="text/javascript" src="../../../layout/js/animation.js"></script>
</body>

</html>
<?php
}
?>