<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
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
            <title>Enseignants</title>

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

            <!-- LES ENSEIGNANT -->
                <div class="container shadow-lg bg-white rounded" style="padding: 0%;">
                    <div class="card">
                        <div class="card-header">
                            Liste des Enseignants des modules de la filière dont vous êtes responsable.
                        </div>
                        <div class="card-body modules">
                            <div class="table-responsive-sm">
                                <?php
                                $sql = "SELECT DISTINCT Module.id_enseignant
                                        from Module
                                        join dispose_de on Module.id_module = dispose_de.id_module
                                        where dispose_de.id_filiere=(select Filiere.id_filiere
                                                                        from Filiere
                                                                            where Filiere.id_responsable = ?)
                                        and id_enseignant != ?
                                        and Module.etat = ?";
                                $query = $db->query($sql, [$id, $id, 1]);
                                ?>
                                <table class="table table-hover table-data mydatatable">
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
                                            $sql2 = "SELECT Personnel.som , Personnel.id ,Utilisateur.nom, Utilisateur.prenom
                                                from Personnel join Utilisateur on Personnel.id= Utilisateur.id
                                                    where Personnel.id=?";
                                            $queryINfo = $db->query($sql2, [$row->id_enseignant]);

                                        ?>
                                            <tr style="cursor: pointer" class="openModalInformation" id="<?php echo $queryINfo->first()->id ?>" title="Plus d'informations">
                                                <td style="font-weight: bold;"><?php echo $queryINfo->first()->som; ?></td>
                                                <td><?php echo $queryINfo->first()->id; ?></td>
                                                <td><?php echo $queryINfo->first()->nom . ' ' . $queryINfo->first()->prenom; ?></td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4" style="text-align: center;">Aucun Enseignant n'est inscrit à cette filière.</td>
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
            <!-- END -->




            <!-- MODAL INFORMATION FILL BY AJAX  -->
            <div class="modal fade teacherInfo" tabindex="-1" role="dialog" aria-labelledby="teacherInfoLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modalInfo">
                            <!-- SPINNER -->
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border m-5" role="status" id="spinner">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <!-- END SPINNER -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jquery JS-->
            <script src="../../../layout/js/jquery-3.4.1.min.js "></script>
            <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>

            <!-- <script type="text/javascript" src="../../../layout/js/datatables.bootstrap4.min.js"></script> -->
            <!-- hade script kibdal theme dyal datatable kiraj3o bootstrap -->

            <!-- Bootstrap JS-->
            <script src="../../../layout/js/bootstrap.min.js "></script>

            <!-- lib JS   -->
            <script src="../../../lib/animsition/animsition.min.js "></script>
            <script src="../../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>

            <!-- Main JS-->
            <script src="../../../layout/js/main.js "></script>
            <script>
                $(document).ready(function() {
                    $(document).on('click', '.openModalInformation', function() {
                        $('.teacherInfo').modal('show');
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
                                $("#spinner").show();
                            },
                            complete: function() {
                                $("#spinner").hide();
                            },
                            success: function(data) {
                                $('.modalInfo').html(data);
                                    // {
                                //     backdrop: 'static',
                                //     keyboard: false
                                // });
                            },
                            error: function() {
                                alert('failure');
                            }
                        });
                    });

                    // $(document).on('click', '#closeModal', function() {
                    //     $('.modal-backdrop').remove();
                    //     $('.modal-backdrop').remove();
                    //     $('.teacherInfo').delay(400).queue(function() {
                    //         $(this).remove();
                    //     });
                    // });
                });
                $('.mydatatable').DataTable();
            </script>
            <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
        </body>
        </html>
<?php
    }
}
?>
<!-- ======================================================================================================================= -->
