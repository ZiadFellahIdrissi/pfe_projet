<?php
include_once '../../../core/init.php';
$user = new User_Etudiant();
if (!$user->isLoggedIn()) {
    header('Location: ../../login/');
} else {
    $nom = $user->data()->nom;
    $prenom = $user->data()->prenom;
    $email = $user->data()->email;
    $id = $user->data()->id;
    $imagepath = $user->data()->imagepath;
?>
    <html lang="fr">

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
        <link href='../../../lib/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />
        <!-- Main CSS-->
        <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">
    </head>
    <style>
        #bold {
            font-weight: bold;
            text-align: center;

        }
    </style>

    <body>
        <?php include '../pages/header.php' ?>
        <section class="au-breadcrumb m-t-75">
            <div class="section__content section__content--p30">
                <nav aria-label="breadcrumb nov">
                    <ol class="breadcrumb nov">
                        <li class="breadcrumb-item"><a href="../pages">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Examens</li>
                    </ol>
                </nav>
            </div>
        </section><br>

        <!-- les examens -->
        <div class="section__content section__content--p30">
            <div class="au-card notes shadow-lg bg-white rounded" style="padding: 0;">
                <?php
                include_once '../../../fonctions/tools.function.php';
                $resultat = controles($id);
                if (!$resultat->count()) {
                    echo '<div class="alert alert-warning" role="alert">
                            Acun controles pour le moment!
                            </div>';
                } else {
                ?>
                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Module</th>
                                    <th>Date</th>
                                    <th>Heure début</th>
                                    <th>Dureé</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($resultat->results() as $row) {
                                ?>

                                    <tr>
                                        <td><?php echo $row->intitule; ?></td>
                                        <td><?php echo $row->date; ?></td>
                                        <td><?php echo $row->h_debut; ?></td>
                                        <td><?php echo date_format(date_create($row->duree), "H\Hi"); ?></td>
                                    </tr>

                            <?php
                                }
                                echo '
                                </tbody>
                                </table>
                            </div>';
                            }
                            ?>
                    </div>
            </div>
            <br><br>
        </div>


        <!-- Jquery JS-->
        <script src="../../../layout/js/jquery-3.4.1.min.js "></script>

        <!-- Bootstrap JS-->
        <script src="../../../layout/js/bootstrap.min.js "></script>

        <!-- lib JS   -->
        <script src="../../../lib/animsition/animsition.min.js "></script>
        <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../../lib/printThis/printThis.js"></script>

        <!-- Main JS-->
        <script src="../../../layout/js/main.js "></script>
        <script>

        </script>
    </body>

    </html>
<?php
}
?>
