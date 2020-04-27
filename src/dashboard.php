<?php include 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../layout/css/dashboard.css" rel="stylesheet">
    <title>Gestion des filieres</title>
</head>

<body>
    <?php include 'header.php' ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <!-- <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">hiiii</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">hiiii</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            for now
                        </button>
                    </div> -->
                </div>

                <div class="container home-stats text-center">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="stat ">
                                <a type="button" class="btn btn-primary" href="Etudiants.php">
                                    <i class="fas fa-user-graduate"></i>
                                Etudiants
                                    <span class="badge badge-light">
                                        <?php
                                        $sql = "SELECT * FROM etudiant";
                                        echo mysqli_num_rows(mysqli_query($conn, $sql));
                                        ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat ">
                                <a type="button" class="btn btn-primary" href="Enseignant.php">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                Enseignants
                                    <span class="badge badge-light">
                                        <?php
                                        $sql = "SELECT * FROM enseignant";
                                        echo mysqli_num_rows(mysqli_query($conn, $sql));
                                        ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat ">
                                <a type="button" class="btn btn-primary" href="Filiere.php">
                                    <i class="fas fa-university"></i>
                                Filieres
                                    <span class="badge badge-light">
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
                                <a type="button" class="btn btn-primary" href="Modules.php">
                                    <i class="fab fa-stack-overflow"></i>
                                Modules
                                    <span class="badge badge-light">
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


            </main>
        </div>
    </div>
    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
</body>

</html>