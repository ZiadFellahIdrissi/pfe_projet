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
            <?php include '../pages/headerDesktop.php' ?>
            <!-- END HEADER DESKTOP-->

            <!-- HEADER MOBILE-->
            <?php include '../pages/headerPhone.php' ?>
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
                                        <li class="list-inline-item ">
                                            <a href="../pages/">Dashboard </a><span>/</span>
                                        </li>
                                        <li class="list-inline-item">
                                            Enseignants
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

            <section class="statistic statistic2">
                <div class="container shadow-lg bg-white rounded" style="padding: 0%;">
                    <div class="table-responsive-sm">
                        <?php
                        $sql = "SELECT DISTINCT Module.id_enseignant from Module 
                                        join dispose_de on Module.id_module=dispose_de.id_module
                                        where dispose_de.id_filiere=(select Filiere.id_filiere 
                                                                        from Filiere
                                                                            where Filiere.id_responsable=?)
                                        and id_enseignant !=?
                                        and module.etat=?";
                        $query = $db->query($sql, [$id, $id,1]);
                        ?>
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>SOM</th>
                                    <th>CIN</th>
                                    <th>Nom complet</th>
                                </tr>
                            </thead>
                            <?php
                            if ($query->count()) {
                            ?>
                                <tbody>
                                    <?php
                                    foreach ($query->results() as $row) {
                                        $sql2 = "SELECT personnel.som , personnel.id ,utilisateur.nom, utilisateur.prenom
                                                    from personnel join utilisateur on personnel.id= utilisateur.id
                                                        where personnel.id=?";
                                        $queryINfo = $db->query($sql2, [$row->id_enseignant]);

                                    ?>
                                        <tr>
                                            <td style="font-weight: bold;"><?php
                                                                            echo $queryINfo->first()->som;
                                                                            ?></td>
                                            <td><?php
                                                echo $queryINfo->first()->id;
                                                ?></td>
                                            <td><?php
                                                echo $queryINfo->first()->nom . ' ' . $queryINfo->first()->prenom;
                                                ?></td>
                                        </tr>
                                <?php
                                    }
                                    echo "<tbody>";
                                    echo "</table>";
                                }
                                ?>
                    </div>
                </div>
            </section>

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
<!-- ======================================================== -->