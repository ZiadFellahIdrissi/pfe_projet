<?php
include_once '../../core/init.php';
$user = new User_Etudiant();
if (!$user->isLoggedIn()) {
    header('Location: ../login.php');
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
        <link href="../../lib/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../../lib/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="../../layout/css/bootstrap.min.css" rel="stylesheet" media="all">
        

        <!-- lib CSS-->
        <link href="../../lib/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="../../lib/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="../../lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
        <link href='../../lib/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />
        <!-- Main CSS-->
        <link href="../../layout/css/theme.css" rel="stylesheet" media="all">

    </head>

    <body>
        <?php include 'header.php' ?>
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
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br>
        <div class="au-card">
            <div id="Notes">
                <?php 
                    $sql="SELECT * FROM passe
                        join Controle on passe.id_controle=Controle.id_constrol
                        join Module on Controle.id_module=Module.id_module
                        join semester on semester.id_semester=Module.id_semester
                        where passe.id_etudiant=? and semester=?";
                            
                ?>
            </div>
        </div>

        <!-- Jquery JS-->
        <script src="../../layout/js/jquery-3.4.1.min.js "></script>

        <!-- Bootstrap JS-->
        <script src="../../layout/js/bootstrap.min.js "></script>

        <!-- lib JS   -->
        <script src="../../lib/animsition/animsition.min.js "></script>
        <script src="../../lib/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../lib/fullcalendar-3.10.0/lib/moment.min.js"></script>
        <script src="../../lib/fullcalendar-3.10.0/fullcalendar.js"></script>


        <!-- Main JS-->
        <script src="../../layout/js/main.js "></script>
        <!-- <script>
            $(document).ready(function(){
                var calendar= $('#calendar').fullCalendar({
                    editable: true,
                    header: {
                        left: 'prev,next,today',
                        center: 'title',
                        right: 'month,agendaWeek,list'
                    },
                    events: 'loadSeance.php?id=<?php echo $id?>'
                });
            });
        </script> -->


    </body>

    </html>
<?php } ?>