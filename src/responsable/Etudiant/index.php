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
            <title>Etudiants</title>

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
            <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" media="all" />

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

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">Vous êtes là:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item">
                                            <a href="../pages/">Dashboard </a><span> /</span>
                                        </li>
                                        <li class="list-inline-item">Etudiants</li>
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

            <!-- MODAL INFORMATION FILL BY AJAX  -->
            <div class="modalInfo">
            </div>

            <!-- LES ETUDIANTS -->
            <section class="statistic statistic2">
                <div class="container shadow-lg bg-white rounded" style="padding: 0%;">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body modules">
                            <div class="table-responsive-sm">
                                <?php
                                $sql = "SELECT Utilisateur.id cin, Etudiant.cne, Utilisateur.nom, Utilisateur.prenom,
                                        Utilisateur.telephone, Utilisateur.email, Utilisateur.date_naissance,
                                        Etudiant.id_filiere, Utilisateur.imagepath
                                        FROM Utilisateur 
                                        join Etudiant ON Etudiant.id = Utilisateur.id
                                        WHERE Etudiant.id_filiere = (select Filiere.id_filiere FROM Filiere WHERE Filiere.id_responsable=?)";
                                $resultat = $db->query($sql, [$id]);
                                ?>
                                <table class="table table-hover table-data mydatatable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>CNE</th>
                                            <th>Nom Complet</th>
                                            <th>Telephone</th>
                                            <th>Inforamtions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($resultat->count() > 0) {
                                            foreach ($resultat->results() as $row) {
                                        ?>
                                                <tr>
                                                    <td style="font-weight: bold;"><?php echo $row->cne ?></td>
                                                    <td><?php echo $row->nom . ' ' . $row->prenom ?></td>
                                                    <td style="text-align: center;"><?php echo $row->telephone ?></td>
                                                    <td>
                                                        <span class="more openModalInformation" id="<?php echo $row->cin ?>" title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="4" style="text-align: center;">Aucun etudiant n'est inscrit à cette filière.</td>
                                            </tr>
                                        <?php
                                        }
                                        echo "<tbody>";
                                        echo "</table>";
                                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END -->

            <!-- SPINNER -->
            <div class="d-flex justify-content-center">
                <div class="spinner-border m-5 spinner" role="status" id="spinner">
                    <span class="sr-only">Loading...</span>
                </div>
            </div><br><br>
            <!-- END SPINNER -->
            

            <!-- Jquery JS-->
            <script src="../../../layout/js/jquery-3.4.1.min.js "></script>
            <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>

            <!-- Bootstrap JS-->
            <script src="../../../layout/js/bootstrap.min.js "></script>

            <!-- lib JS   -->
            <script src="../../../lib/animsition/animsition.min.js "></script>
            <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>

            <!-- Main JS-->
            <script src="../../../layout/js/main.js "></script>
            <script>
                $('.mydatatable').DataTable();
                $(document).ready(function() {
                    $(".spinner").hide();
                    $(document).on('click', '.openModalInformation', function() {
                        var cin = $(this).attr("id");
                        console.log(cin);
                        $.ajax({
                            url: "info.php",
                            method: 'GET',
                            data: {
                                cin: cin
                            },
                            dataType: 'text',
                            beforeSend: function() {
                                $(".spinner").show();
                            },
                            complete: function() {
                                $(".spinner").hide();
                            },
                            success: function(data) {
                                $('.modalInfo').html(data);
                                $('.studentInfo').modal({
                                    backdrop: 'static',
                                    keyboard: false
                                });
                            },
                            error: function() {
                                alert('failure');
                            }
                        });

                    });

                    $(document).on('click', '#closeModal', function() {
                        $('.modal-backdrop').remove();
                        $('.modal-backdrop').remove();
                        $('.studentInfo').delay(400).queue(function() {
                            $(this).remove();
                        });
                    });

                });
            </script>
            <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
        </body>

        </html>
<?php
    }
}
?>
<!-- ========================================================================================================================================== -->