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
                    <h1 class="h2">Etudiant</h1>
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

                    <!-- ======================================================================== -->
                    <!-- ===============un button pour ajoute un etudiant======================= -->
                    <div class="col-6 col-md-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">ajoute un etudiant</button>
                        <br>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form action="Etudiant/ajoute_etudiant.php" method="POST">
                                            <!-- =======================bloc de le nom et le prenom======================= -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="le_nom" class="col-form-label">Nom </label>
                                                        <input type="text" class="form-control" name="Nom" id="le_nom" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="le_prenom" class="col-form-label">Prenom </label>
                                                        <input type="text" class="form-control" name="prenom" id="le_prenom" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ===================fin bloc de le nom et le prenom======================= -->

                                            <!-- =====================bloc code apuge et le cne======================= -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="codeapo" class="col-form-label">Code apouge</label>
                                                        <input type="text" class="form-control" name="codeapoge" id="codeapo" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="cin" class="col-form-label">Cin</label>
                                                        <input type="text" class="form-control" name="cin" id="cin" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ===================fin bloc de code apuge et le cne================== -->

                                            <div class="form-group">
                                                <label for="date" class="col-form-label">Date Naissance</label>
                                                <input type="date" class="form-control" name="dateN" id="date" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="email" class="col-form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="date" required>
                                            </div>

                                            <!-- les options de filier -->
                                            <div class="form-group">
                                                <label for="filier">Filiere</label>
                                                <select name="filier" id="filier" class="form-control">
                                                    <?php
                                                    $sqlOptions = "SELECT * from filiere";
                                                    $resultat = mysqli_query($conn, $sqlOptions);
                                                    $resultatcheck = mysqli_num_rows($resultat);
                                                    if ($resultatcheck > 0) {
                                                        while ($row = mysqli_fetch_assoc($resultat)) {
                                                    ?>
                                                            <option value="<?php echo $row["id_filiere"] ?>">
                                                                <strong><?php echo $row["nom_filiere"] ?></strong>
                                                            </option>
                                                    <?php

                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!-- fin options de filiere -->

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ====================================================================================================================================================== -->
                    <!-- =============================le bloc de botton pour ajoute un etudiant terminer======================================================================= -->

                    <!-- =====================================formilar poir modifier un etudiant========================================== -->
                    <div class="modal fade" id="modifierUnEtudiant" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-body">

                                    <form action="Etudiant/modifier_etudiant.php" method="POST">
                                        <!-- =======================bloc de le nom et le prenom======================= -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="le_nom_modifier" class="col-form-label">Nom </label>
                                                    <input type="text" class="form-control" name="Nom" value="" id="le_nom_modifier" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="le_prenom_modifier" class="col-form-label">Prenom </label>
                                                    <input type="text" class="form-control" name="prenom" value="" id="le_prenom_modifier" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ===================fin bloc de le nom et le prenom======================= -->

                                        <!-- =====================bloc code apuge et le cne======================= -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="codeapoge_modifier" class="col-form-label">Code apogee</label>
                                                    <input type="text" class="form-control" name="codeapoge" value="" id="codeapoge_modifier" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="cin_modifier" class="col-form-label">Cin</label>
                                                    <input type="text" class="form-control" name="cin" value="" id="cin_modifier" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ===================fin bloc de code apuge et le cne================== -->

                                        <div class="form-group">
                                            <label for="date_modifier" class="col-form-label">Date Naissance</label>
                                            <input type="date" class="form-control" name="dateN" value="" id="date_modifier" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email_modifier" class="col-form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="email_modifier" value="" required>
                                        </div>

                                        <!-- les options de filier -->
                                        <div class="form-group">
                                            <label for="fil">Filiere</label>
                                            <select name="fil" id="fil" class="form-control">
                                                <?php
                                                $sqlOptions = "SELECT * from filiere";
                                                $resultat = mysqli_query($conn, $sqlOptions);
                                                $resultatcheck = mysqli_num_rows($resultat);
                                                if ($resultatcheck > 0) {
                                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                                ?>
                                                        <option value="<?php echo $row["id_filiere"] ?>">
                                                            <strong><?php echo $row["nom_filiere"] ?></strong>
                                                        </option>
                                                <?php

                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- fin options de filiere -->

                                        <div class="modal-footer">
                                            <input type="hidden" id="codeapoger" name="codeapoger" value="">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="ajouter">Modifier</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- =====================================end formilar poir modifier un etudiant====================================== -->

                    <br>


                    <!-- =========feetcheing all data into a table ================= -->
                    <?php
                    include 'Etudiant/AffichetableauEtudiants.php';
                    ?>
                    <!-- =================end=================================== -->

                    <!-- ==================================================================== -->
                    <!-- hadi dhiya les msgs li kital3o dyal ajoute supprimie ou modifier -->
                    <?php
                    $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos($fullurl, "insert=failed")) {
                    ?>
                        <div class="alert alert-danger col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Invalid</strong> code apogee ou Cin!
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "etudiant=inserted")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Etudiant</strong> ajouté avec succes :)
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "etudiant=deleted")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Etudiant</strong> supprimé avec succes :)
                        </div>
                    <?php
                    }
                    if (strpos($fullurl, "etudiant=updated")) {
                    ?>
                        <div class="alert alert-success col-lg-4 col-lg-push-3 " style="text-align:center;">
                            <strong>Etudiant</strong> modifié avec succes :)
                        </div>
                    <?php
                    }
                    ?>
                    <!-- ==================================================================== -->
                    <!-- ==================================================================== -->

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
    <script>
        $(document).ready(function() {
            $(document).on('click', '.Open_modifierUnEtudiant', function() {
                var code = $(this).attr("id");
                $('#codeapoger').val(code);

                console.log(code);
                $.ajax({
                    url: "Etudiant/fetching_students_for_editing.php",
                    method: 'GET',
                    data: {
                        code: code
                    },
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(data) {

                        $('#le_nom_modifier').val(data.nom);
                        $('#le_prenom_modifier').val(data.prenom);
                        $('#codeapoge_modifier').val(data.code_apoge);
                        $('#cin_modifier').val(data.cin);
                        $('#date_modifier').val(data.date_naissance);
                        $('#email_modifier').val(data.email);
                        $('#fil').val(data.id_filiere);
                        $('#modifierUnEtudiant').modal('show');
                        console.log(data.email);
                    },
                    error: function() {
                        alert('failure');
                    }
                });

            });
        });
       
    </script>
</body>

</html>