<?php
include '../../connection.php';
include_once '../../../core/init.php';
$user = new User_Admin();
if (!$user->isLoggedIn()) {
    header('Location: ../pages/login.php');
} else {
    $nom = $user->data()->nom;
    $prenom = $user->data()->prenom;
    $username =$user->data()->username;
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../../../layout/css/animation.css" rel="stylesheet" type="text/css" />
        <title>Etudiant</title>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="../../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../../../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../../../layout/css/datatables.min.css" rel="stylesheet" type="text/css" />

        <!-- lib CSS-->
        <link href="../../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="../../../lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
        <link href="../../../lib/select2/select2.min.css" rel="stylesheet" media="all">
        <!-- Main CSS-->
        <link href="../../../layout/css/theme.css" rel="stylesheet" media="all">
    </head>


    <style>
        /* .modal-header {
        background-color: #dcdde1;
    }

    .modal-body {
        background: #f5f5f5;
    } */

        .nov {
            background: #f5f5f5;
        }
    </style>

    <body>
        <div class="page-wrapper">
            <?php
            include '../pages/header.php';
            ?>
            <div class="main-content ">
                <?php
                include '../../DML_Commentator.php';
                DMLCommentator("etudiant");
                ?>
                <div class="container mb-3">
                    <nav aria-label="breadcrumb nov">
                        <ol class="breadcrumb nov">
                            <li class="breadcrumb-item"><a href="../pages">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Etudiants</li>
                        </ol>
                    </nav>
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-5" style="padding-top:6px;">
                                        <select name="filiere" id="filiere" class="form-control js-select2">
                                            <option value=''>Choisissez une filière</option>
                                            <?php
                                            $sql = "SELECT id_filiere,nom_filiere FROM filiere";
                                            $resultat = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($resultat)) {
                                            ?>
                                                <option value='<?php echo $row["id_filiere"] ?>'><?php echo $row["nom_filiere"] ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="col-md-0 offset-md-5">
                                        <a href="./"><button type="button" class="btn btn-primary">Afficher Tous</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body etudiants">
                                <?php
                                include 'afficheTableauEtudiants.php';
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- modal medium -->
                    <div class="modal fade" id="StudentInforamtion" tabindex="-1" role="dialog" aria-labelledby="StudentInforamtionLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="StudentInforamtionLabel">Informations</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="image img-cir img-120">
                                                <img src="../../../img/etudiant/profile.svg" alt="ziad" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="le_nom" class="">Nom </label>
                                                        <input type="text" class="form-control" value="ziad" disabled>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="le_prenom" class="">Prenom</label>
                                                        <input type="text" class="form-control" value="ziad" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="cin" class="">Cin</label>
                                                        <input type="text" class="form-control" value="ziad" disabled>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="cen" class="">Cen</label>
                                                        <input type="text" class="form-control" value="ziad" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="date_naissance" class="">Date Naissance</label>
                                                        <input type="date" class="form-control" value="" disabled>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="date_insc" class="">Date Inscription</label>
                                                        <input type="date" class="form-control" value="" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="date" class="col-form-label">test</label>
                                                        <input type="text" class="form-control" name="dateN" id="date" disabled>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="date_ins" class="col-form-label">test</label>
                                                        <input type="text" class="form-control" name="date_ins" id="date_ins" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="le_nom" class="">email</label>
                                                <input type="text" class="form-control" value="ziad" disabled>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="date" class="col-form-label">test</label>
                                                        <input type="text" class="form-control" name="dateN" id="date" disabled>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="date_ins" class="col-form-label">test</label>
                                                        <input type="text" class="form-control" name="date_ins" id="date_ins" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal medium -->
                </div>
            </div>
        </div>
        </div>

        <script type="text/javascript" src="../../../layout/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="../../../layout/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JS-->
        <script type="text/javascript" src="../../../layout/js/bootstrap.min.js "></script>

        <!-- lib JS   -->
        <script type="text/javascript" src="../../../lib/animsition/animsition.min.js "></script>
        <script type="text/javascript" src="../../../lib/select2/select2.min.js"></script>
        <!-- Main JS-->
        <script type="text/javascript" src="../../../layout/js/main.js "></script>
        <script type="text/javascript" src="../../../layout/js/animation.js"></script>
        <script type="text/javascript" src="../../../layout/js/etudiants.js"></script>
        <script type="text/javascript" src="../../../layout/js/DataTableCustomiser.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '.openModalInformation', function() {
                    var cin=$(this).attr("id");
                    // mohime hna dire l ajax bache tjibe les infos li 5asink 
                    $('#StudentInforamtion').modal('show');

                });

            });
        </script>

    </body>

    </html>
<?php
}
?>