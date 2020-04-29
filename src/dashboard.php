<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layout/css/animation.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../layout/css/dashboard.css" rel="stylesheet">
    <title>Gestion des filieres</title>
</head>
<style type="text/css">
    .dash {
        width: 75%;
    }

    .col-md-3 {
        margin-bottom: 5%;
    }

    .color {
        background: rgb(226, 231, 238);
        background: linear-gradient(232deg, rgba(226, 231, 238, 1) 33%, rgba(35, 151, 199, 1) 87%);
    }
</style>

<body>
    <?php include 'header.php' ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="titleH">Dashboard</h1>
        </div>

        <div class="container home-stats text-center">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat">
                        <a type="button" class="btn color dash" href="Etudiants.php">
                            <i class="fas fa-user-graduate"></i>
                            <h6>Etudiants</h6>
                            <span class="badge badge-light text-center">
                                <?php
                                $sql = "SELECT * FROM etudiant";
                                echo mysqli_num_rows(mysqli_query($conn, $sql));
                                ?>
                            </span>
                        </a>
                    </div>
                </div><br>
                <div class="col-md-3">
                    <div class="stat ">
                        <a type="button" class="btn color dash" href="Enseignant.php">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <h6>Enseignants</h6>
                            <span class="badge badge-light text-center">
                                <?php
                                $sql = "SELECT * FROM enseignant";
                                echo mysqli_num_rows(mysqli_query($conn, $sql));
                                ?>
                            </span>
                        </a>
                    </div>
                </div><br>
                <div class="col-md-3">
                    <div class="stat ">
                        <a type="button" class="btn color dash" href="Filiere.php">
                            <i class="fas fa-university"></i>
                            <h6>Filieres</h6>
                            <span class="badge badge-light text-center">
                                <?php
                                $sql = "SELECT * FROM filiere";
                                echo mysqli_num_rows(mysqli_query($conn, $sql));
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat ">
                        <a type="button" class="btn color dash" href="Modules.php">
                            <i class="fab fa-stack-overflow"></i>
                            <h6>Modules</h6>
                            <span class="badge badge-light text-center">
                                <?php
                                $sql = "SELECT *
                                                    FROM module";
                                echo mysqli_num_rows(mysqli_query($conn, $sql));
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="container">
            <div class="row">

                <div class="col">
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="../img/Dashboard/10.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php include "cal.html" ?>
                </div>
            </div>
        </div>
        <br> <br> <br>
    </main>
    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../layout/js/animation.js"></script>
</body>

</html>