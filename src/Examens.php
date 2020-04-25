<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../layout/css/dashboard.css" rel="stylesheet">
    <title>test5</title>
</head>

<style>
    .modal-header {
        background-color: #dcdde1;
    }
</style>

<!-- Custom styles for this template -->

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

            <a class="navbar-brand" href="#">Gestion des filiers</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="dashboard.php">Dashboard </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="Enseignant.php">Enseignant</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Etudiant.php">Etudiant <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Filiere.php">Filiere</a>
                    </li>
                </ul>
                <!-- <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2 " type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
                <ul class="navbar-nav px-0">
                    <li class="nav-item text-nowrap">
                        <a class="nav-link" href="#">Sign out</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="dashboard.php">
                                <span></span>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="Etudiant.php">
                                <span><i class="fas fa-user-graduate"></i></span>
                                Etudiant<span>
                            </a>
                            <!-- <ul>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Gestion Class</a>
                                </li>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Gestion Serie</a>
                                </li>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Gestion Matiére</a>
                                </li>
                            </ul> -->
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="Filiere.php">
                                <span><i class="fas fa-university"></i></span>

                                Filiere <span>
                            </a>
                            <!-- <ul>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Ajouter Eleve</a>
                                </li>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Ajouter Groupe</a>
                                </li>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Gestion d'Eleve</a>
                                </li>
                            </ul> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Enseignant.php">
                                <span><i class="fas fa-chalkboard-teacher"></i></span>
                                Enseignant
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span><i class="fas fa-chalkboard-teacher"></i></span>
                                Modules
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span><i class="far fa-clock"></i></span>
                                Présence <span> <i class="fas fa-angle-down"></i></span>
                            </a>
                            <ul>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Prendre la
                                        Presence</a></li>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Liste de presence</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span><i class="fas fa-file"></i></span>
                                Examen <span> <i class="fas fa-angle-down"></i></span>
                            </a>
                            <ul>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Examen</a></li>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Gestion des Notes</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Etudiants</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">hiiii</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">hiiii</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            for now
                        </button>
                    </div>
                </div>

                <div class="container mt-3 mb-3">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-md-6">
                                <select name="groupe" id="groupe" class="form-control">
                                    <option value=''>Choise un groupe</option>
                                    <?php
                                    $sql = "SELECT id_groupe,groupe_nom FROM groupe";
                                    $resultat = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                    ?>
                                        <option value='<?php echo $row["id_groupe"] ?>'><?php echo $row["groupe_nom"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <a href="Etudiants.php"><button type="button" class="btn btn-primary">Affiche tout</button></a>
                            </div>
                        </div>

                        <div class="modal-body etudiants">
                            <?php include "" ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
    <script>
        $('.mydatatable').DataTable();
    </script>


</body>

</html>