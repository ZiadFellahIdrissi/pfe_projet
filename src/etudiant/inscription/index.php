<?php
include_once '../../../core/init.php';
include_once '../../../fonctions/tools.function.php';
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
        <title>Inscription</title>

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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Inscription</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      <div class="mb-4">
        <div class="section__content section__content--p30">
            <div class="modal-content">
              <div class="modal-header">

                <b>
                  <img src="https://i.imgur.com/BjPrzqZ.png" width=40>
                  UNIVERSITE HASSAN II DE CASABLANCA
                </b>
                <p>
                  Faculté des Sciences Aïn Chock
                </p>
              </div>
              <div class="modal-body">
              Vous êtes inscrit à:
              <br>
              Filiere: <b><?php echo getStudentFiliere($id)->nom_filiere ?></b>
              <br>
              <div class="float-right">
              <?php
                $tarif = getStudentFiliere($id)->prix_formation;
                $somme = getStudentFiliere($id)->somme;
                if($somme < $tarif){
              ?>
                  <b style="color: red">Vous devez payer <?php echo $tarif-$somme ?> MAD de plus.</b>
              <?php
                } else {
                    if (!demandeCheck($id, 'attestation', -1) && !demandeCheck($id, 'attestation', 1)) {
                        if (demandeCheck($id, 'attestation', 0)) {
                        ?>
                            <span style="color: red">Votre demande précédent a été refusé.</span>
                        <?php
                        }
                        ?>
                      <button type="button" class="btn btn-outline-dark" onclick="location.href='../demander.php?type=attestation&id=<?php echo $id ?>'">
                          <i class="far fa-sticky-note" aria-hidden="true"></i> Demander l'attestation de scolarité
                      </button>
                    <?php
                    }
                    if (demandeCheck($id, 'attestation', -1) && !demandeCheck($id, 'attestation', 1)) {
                    ?>
                        <div>
                            Demande envoyé.
                        </div>
                    <?php
                    }
                    if (demandeCheck($id, 'attestation', 1)) {
                    ?>
                        <div>
                            <button type="button" class="btn btn-outline-dark" onclick="location.href=''">
                                <span><i class="fa fa-download"></i></span> Télécharger l'attestation de scolarité
                            </button>
                        </div>
                    <?php
                    }
                }
              ?>
              </div>
              <br>
              Modules:
              <table class="table table-hover">
                  <th style="background: rgba(0, 0, 0, 0.16); font-weight: bold; font-size:large;">1ére semestre</th>
                  <?php
                      $results = getModulesByFiliere(getStudentFiliere($id)->id_filiere, 1);
                      foreach($results->results() as $row){
                  ?>
                      <tr>
                          <td><?php echo $row->intitule ?></td>
                      </tr>
                  <?php
                      }
                  ?>
              </table>
              <table class="table table-hover">
                  <th style="background: rgba(0, 0, 0, 0.16); font-weight: bold; font-size:large;">2ème semestre</th>
                  <?php
                      $results = getModulesByFiliere(getStudentFiliere($id)->id_filiere, 2);
                      foreach($results->results() as $row){
                  ?>
                      <tr>
                          <td><?php echo $row->intitule ?></td>
                      </tr>
                  <?php
                      }
                  ?>
              </table>
            </div>
          </div>
        </div>
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
