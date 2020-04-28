<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../layout/css/dashboard.css" rel="stylesheet">
    <title>Gestion des filieres</title>
</head>
<style type="text/css">
    img:hover {
        width: 240px; 
        height: 160px;
    }
</style>
<body>
    <?php include 'header.php' ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Absences</h1>
                    <!-- <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">hiiii</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">hiiii</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            for now
                        </button>
                    </div> -->
                </div>
                <div class="container mt-3 mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Absences</li>
                        </ol>
                    </nav>
                    <div class="text-center">
                        <div class="row">
                            <div class="col">
                                <a href="ajouter_absences.php" >
                                    <img class="img" src="../img/Absences/1.png" onmouseover="this.src='../img/Absences/2.png';" onmouseout="this.src='../img/Absences/1.png'"class="rounded" title="Ajouter Absences">
                                </a>
                            </div>
                            <div class="col">
                                <a href="consulter_absences.php" >
                                    <img src="../img/Absences/3.png" onmouseover="this.src='../img/Absences/4.png';" onmouseout="this.src='../img/Absences/3.png'"class="rounded" title="Consulter Absences">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
    <script type="text/javascript" src="../layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap.min.js"></script>
</body>

</html>