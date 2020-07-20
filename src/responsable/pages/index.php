<?php
include_once '../../../core/init.php';
$user = new User_Prof();
$db = DB::getInstance();
if (!$user->isLoggedIn()) {
    header('Location: ../../login');
} else {
    if ($user->data()->role != 'responsable') {
        header('Location: ../../login');
    } else {
        $nom    = $user->data()->nom;
        $prenom = $user->data()->prenom;
        $email  = $user->data()->email;
        $id     = $user->data()->id;
        $imagepath = $user->data()->imagepath;
?>
        <html lang="en">

        <head>
            <!-- Required meta tags-->
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Title Page-->
            <title>Dashboard</title>

            <!-- Fontfaces CSS-->
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
            <!-- HEADER DESKTOP-->
            <?php include 'headerDesktop.php' ?>
            <!-- END HEADER DESKTOP-->

            <!-- HEADER MOBILE-->
            <?php include 'headerPhone.php' ?>
            <!-- END HEADER MOBILE -->

            <!-- PAGE CONTENT-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">Vous êtes là:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="../pages/">Dashboard</a>
                                        </li>
                                    </ul>
                                </div>
                                <form class="au-form-icon--sm" action="" method="post">
                                    <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports...">
                                    <button class="au-btn--submit2" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->



            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <h1 class="title-4">Bienvenue
                                        <span><?php echo strtoupper($nom) . ' ' . $prenom; ?></span>
                                    </h1>
                                    <hr class="line-seprate">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number">
                                    <?php
                                    $sql = "SELECT DISTINCT Module.id_enseignant from Module 
                                            JOIN dispose_de on Module.id_module=dispose_de.id_module
                                            where dispose_de.id_filiere=(select Filiere.id_filiere 
                                                                            from Filiere
                                                                                where Filiere.id_responsable=?)
                                            AND Module.id_enseignant !=?
                                            and module.etat=?";

                                    echo $db->query($sql, [$id, $id,1])->count();

                                    ?>
                                </h2>
                                <span class="desc">Enseignants</span>
                                <div class="icon">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number">
                                    <?php
                                    $sql = "SELECT Utilisateur.id cin, Etudiant.cne, Utilisateur.nom, Utilisateur.prenom,
                                        Utilisateur.telephone, Utilisateur.email, Utilisateur.date_naissance,
                                        Etudiant.id_filiere, Utilisateur.imagepath
                                        FROM Utilisateur 
                                        join Etudiant ON Etudiant.id = Utilisateur.id
                                        WHERE Etudiant.id_filiere = (select Filiere.id_filiere FROM Filiere WHERE Filiere.id_responsable=?)";
                                    echo $db->query($sql, [$id])->count();
                                    ?>

                                </h2>
                                <span class="desc">Etudiants</span>
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number">
                                    <?php
                                    $sql = "SELECT *
                                     FROM Module
                                     JOIN Personnel ON Module.id_enseignant = Personnel.id
                                     JOIN Utilisateur ON Personnel.id = Utilisateur.id
                                     JOIN dispose_de ON Module.id_module = dispose_de.id_module
                                     WHERE dispose_de.id_filiere = (SELECT id_filiere from Filiere where id_responsable=?)
                                     AND Module.etat = ?";

                                    echo  $db->query($sql, [$id, 1])->count();
                                    ?>
                                </h2>
                                <span class="desc">Modules</span>
                                <div class="icon">
                                    <i class="fab fa-stack-overflow"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">17</h2>
                                <span class="desc">test</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <br><br>
            <!-- </div> -->


            <!-- Jquery JS-->
            <script src="../../../layout/js/jquery-3.4.1.min.js "></script>

            <!-- Bootstrap JS-->
            <script src="../../../layout/js/bootstrap.min.js "></script>

            <!-- lib JS   -->
            <script src="../../../lib/animsition/animsition.min.js "></script>
            <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>

            <!-- Main JS-->
            <script src="../../../layout/js/main.js "></script>

        </body>

        </html>
<?php
    }
}
?>