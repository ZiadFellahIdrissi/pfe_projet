<?php
    include '../../connection.php';
    include_once '../../../core/init.php';
    $user = new User_Admin();
    if (!$user->isLoggedIn()) {
        header('Location: ./login.php');
    }else{
        $username = $user->data()->username;
?>
<!DOCTYPE html>
<html lang="fr">

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

<body>
    <div class="page-wrapper">
        <?php
            include './header.php'
        ?>
        <div class="main-content">
            <section class="statistic statistic2" style=" padding-top: 0%;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <a href="../Enseignants" title="Enseignants">
                                    <div class="statistic__item" style="border-radius: 10px; cursor:pointer;" >
                                            <h2>
                                                <?php
                                                    $sql = "SELECT *
                                                            FROM Personnel
                                                            WHERE role = 'enseignant'";
                                                    echo mysqli_num_rows(mysqli_query($conn, $sql));
                                                ?>
                                            </h2>
                                        <br>
                                        <span class="desc">Enseignants</span>
                                        <div class="icon">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                        </div>
                                </a>
                                    </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <a href="../Responsables" title="Responsables">
                                    <div class="statistic__item" style="border-radius: 10px; cursor:pointer;" >
                                            <h2>
                                                <?php
                                                    $sql = "SELECT *
                                                            FROM Personnel
                                                            WHERE role = 'responsable'";
                                                    echo mysqli_num_rows(mysqli_query($conn, $sql));
                                                ?>
                                            </h2>
                                        <br>
                                        <span class="desc">Responsables</span>
                                        <div class="icon">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                </a>
                                    </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <a href="../Etudiants" title="Etudiants">
                                    <div class="statistic__item" style="border-radius: 10px; cursor:pointer;" >
                                            <h2>
                                                <?php
                                                    $sql = "SELECT *
                                                            FROM Etudiant";
                                                    echo mysqli_num_rows(mysqli_query($conn, $sql));
                                                ?>
                                            </h2>
                                        <br>
                                        <span class="desc">Etudiants</span>
                                        <div class="icon">
                                            <i class="fas fa-user-graduate"></i>
                                        </div>
                                </a>
                                    </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <a href="../Filieres"  title="Filières">
                                    <div class="statistic__item" style="border-radius: 10px; cursor:pointer;">
                                            <h2>
                                                <?php
                                                    $sql = "SELECT *
                                                            FROM Filiere";
                                                    echo mysqli_num_rows(mysqli_query($conn, $sql));
                                                ?>
                                            </h2>
                                        <br>
                                        <span class="desc">Filieres</span>
                                        <div class="icon">
                                            <i class="fas fa-university"></i>
                                        </div>
                                </a>
                                    </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <a href="../Modules" title="Modules">
                                    <div class="statistic__item" style="border-radius: 10px; cursor:pointer;">
                                            <h2 class="number">
                                                <?php
                                                    $sql = "SELECT *
                                                            FROM Module";
                                                    echo mysqli_num_rows(mysqli_query($conn, $sql));
                                                ?>
                                            </h2>
                                        <br>
                                        <span class="desc">Modules</span>
                                        <div class="icon">
                                            <i class="fab fa-stack-overflow"></i>
                                        </div>
                                </a>
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