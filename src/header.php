<html lang="en">

<style type="text/css">
  .span{
    float: right;
  }
</style>

<body>
    <header>
        <nav class="navbar navbar-dark fixed-top bg-primary">
            <a class="navbar-brand" href="dashboard.php">Gestion des filieres</a>
                <ul class="navbar-nav px-0">
                    <li class="nav-item text-nowrap ">
                        <a class="btn btn btn-outline-light" href="../index.php">Log out</a>
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
                            <a class="nav-link active" href="dashboard.php">
                                <span></span>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="Etudiants.php">
                                <span><i class="fas fa-user-graduate"></i></span>
                                Etudiant
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

                                Filiere
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
                                <span><i class="fab fa-stack-overflow"></i></span>
                                Modules
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span><i class="far fa-clock"></i></span>
                                Présence <span> <i class="fas fa-angle-down"></i></span>
                            </a>
                            <ul>
                                <li class="MyNonActive"><a class="nav-link" href="consulte_abssence.php"> <span></span>Consulte Absences</a></li>
                                <li class="MyNonActive"><a class="nav-link" href="#"> <span></span>Ajouter Absences</a>
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
        </div>
    </div>
</body>
</html>